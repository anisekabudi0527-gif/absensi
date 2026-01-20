<?php

namespace App\Http\Controllers;

use App\Models\AbsensiHarian;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $today = now()->toDateString();

        $date = $user->role === 'sekretaris'
            ? $today
            : ($request->get('date') ?: $today);

        $siswa = Siswa::query()
            ->where('is_active', true)
            ->orderBy('nama')
            ->get();

        $existing = AbsensiHarian::query()
            ->where('tanggal', $date)
            ->whereIn('siswa_id', $siswa->pluck('id'))
            ->get()
            ->keyBy('siswa_id');

        $isFinalized = AbsensiHarian::where('tanggal', $date)->whereNotNull('finalized_at')->exists();
        $isClosed    = AbsensiHarian::where('tanggal', $date)->whereNotNull('closed_at')->exists();

        return view('absensi.index', compact(
            'today',
            'date',
            'siswa',
            'existing',
            'isFinalized',
            'isClosed'
        ));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $today = now()->toDateString();

        $date = $user->role === 'sekretaris'
            ? $today
            : $request->validate(['date' => ['required', 'date']])['date'];

        // intent: save | finalize | close
        $intent = $request->input('intent', 'save');
        if (!in_array($intent, ['save', 'finalize', 'close'], true)) $intent = 'save';

        // finalize/close hanya wali
        if (in_array($intent, ['finalize', 'close'], true) && $user->role !== 'wali_kelas') {
            abort(403, 'Tidak berhak.');
        }

        // lock harian
        $isClosed = AbsensiHarian::where('tanggal', $date)->whereNotNull('closed_at')->exists();
        if ($isClosed) abort(403, 'Absensi tanggal ini sudah ditutup (closed).');

        $isFinalized = AbsensiHarian::where('tanggal', $date)->whereNotNull('finalized_at')->exists();

        // sekretaris tidak boleh input jika sudah finalized
        if ($user->role === 'sekretaris' && $isFinalized) {
            abort(403, 'Absensi tanggal ini sudah difinalisasi wali kelas.');
        }

        $payload = $request->validate([
            'items' => ['required', 'array', 'min:1'],
            'items.*.siswa_id' => ['required', 'integer', 'exists:siswa,id'],
            'items.*.status' => ['required', 'in:H,I,S,A'],

            // terima HH:MM atau HH:MM:SS
            'items.*.jam_masuk'  => ['nullable', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],
            'items.*.jam_keluar' => ['nullable', 'regex:/^\d{2}:\d{2}(:\d{2})?$/'],

            'items.*.catatan' => ['nullable', 'string', 'max:500'],
        ]);

        DB::transaction(function () use ($payload, $date, $user, $isFinalized, $intent) {

            foreach ($payload['items'] as $it) {
                $row = AbsensiHarian::firstOrNew([
                    'siswa_id' => $it['siswa_id'],
                    'tanggal'  => $date,
                ]);

                $status = $it['status'];
                $jamMasuk  = $this->normalizeTime($it['jam_masuk'] ?? null);   // HH:MM
                $jamKeluar = $this->normalizeTime($it['jam_keluar'] ?? null);  // HH:MM
                $catatan   = isset($it['catatan']) ? trim((string)$it['catatan']) : null;

                if ($isFinalized) {
                    // status terkunci (wali masih boleh isi jam/catatan)
                    if ($status !== 'H') {
                        $row->jam_masuk = null;
                        $row->jam_keluar = null;
                    } else {
                        if ($jamMasuk !== null)  $row->jam_masuk  = $jamMasuk;
                        if ($jamKeluar !== null) $row->jam_keluar = $jamKeluar;
                    }
                    if ($catatan !== '') {
                        $row->catatan = $catatan ?: $row->catatan;
                    }
                } else {
                    // belum finalized: boleh update semua
                    $row->status = $status;

                    if ($status !== 'H') {
                        $row->jam_masuk = null;
                        $row->jam_keluar = null;
                    } else {
                        $row->jam_masuk  = $jamMasuk;
                        $row->jam_keluar = $jamKeluar;
                    }

                    $row->catatan = ($catatan === '' ? null : $catatan);
                }

                $row->dicatat_oleh = $user->id;
                $row->save();
            }

            // intent finalize/close: pastikan row lengkap
            if (in_array($intent, ['finalize', 'close'], true)) {
                $this->ensureRowsForDate($date, $user->id);
            }

            // finalize
            if ($intent === 'finalize') {
                AbsensiHarian::where('tanggal', $date)->update([
                    'finalized_at' => now(),
                    'finalized_by' => $user->id,
                ]);
            }

            // close: auto-finalize kalau belum finalized
            if ($intent === 'close') {
                $alreadyFinalized = AbsensiHarian::where('tanggal', $date)->whereNotNull('finalized_at')->exists();
                if (!$alreadyFinalized) {
                    AbsensiHarian::where('tanggal', $date)->update([
                        'finalized_at' => now(),
                        'finalized_by' => $user->id,
                    ]);
                }

                AbsensiHarian::where('tanggal', $date)->update([
                    'closed_at' => now(),
                    'closed_by' => $user->id,
                ]);
            }
        });

        if ($intent === 'finalize') return back()->with('success', 'Data tersimpan & status difinalisasi.');
        if ($intent === 'close') return back()->with('success', 'Data tersimpan & absensi ditutup.');
        return back()->with('success', 'Absensi berhasil disimpan.');
    }


    public function finalize(Request $request)
    {
        $user = $request->user();
        if ($user->role !== 'wali_kelas') abort(403);

        $date = $request->validate(['date' => ['required', 'date']])['date'];

        $isClosed = AbsensiHarian::where('tanggal', $date)->whereNotNull('closed_at')->exists();
        if ($isClosed) return back()->with('error', 'Hari sudah ditutup, tidak bisa finalisasi.');

        $this->ensureRowsForDate($date, $user->id);

        AbsensiHarian::where('tanggal', $date)->update([
            'finalized_at' => now(),
            'finalized_by' => $user->id,
        ]);

        return back()->with('success', 'Status absensi berhasil difinalisasi (STATUS terkunci).');
    }

    public function closeDay(Request $request)
    {
        $user = $request->user();
        if ($user->role !== 'wali_kelas') abort(403);

        $date = $request->validate(['date' => ['required', 'date']])['date'];

        $this->ensureRowsForDate($date, $user->id);

        AbsensiHarian::where('tanggal', $date)->update([
            'closed_at' => now(),
            'closed_by' => $user->id,
        ]);

        return back()->with('success', 'Absensi berhasil ditutup (semua terkunci).');
    }

    private function ensureRowsForDate(string $date, int $actorUserId): void
    {
        $siswaIds = Siswa::where('is_active', true)->pluck('id');

        $existingIds = AbsensiHarian::where('tanggal', $date)
            ->whereIn('siswa_id', $siswaIds)
            ->pluck('siswa_id');

        $missing = $siswaIds->diff($existingIds);

        foreach ($missing as $sid) {
            AbsensiHarian::create([
                'siswa_id' => $sid,
                'tanggal' => $date,
                'status' => 'H',
                'dicatat_oleh' => $actorUserId,
            ]);
        }
    }

    private function normalizeTime(?string $time): ?string
    {
        if ($time === null) return null;
        $time = trim($time);
        if ($time === '') return null;

        if (preg_match('/^\d{2}:\d{2}:\d{2}$/', $time)) {
            return substr($time, 0, 5);
        }
        if (preg_match('/^\d{2}:\d{2}$/', $time)) {
            return $time;
        }
        return null;
    }
}
