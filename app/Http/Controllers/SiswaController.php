<?php

namespace App\Http\Controllers;

use App\Models\Wali;
use App\Models\Siswa;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q'));

        $items = Siswa::query()
            ->with('wali')
            ->when($q, fn($w) => $w->where('nama', 'like', "%$q%")->orWhere('nis', 'like', "%$q%"))
            ->orderBy('nama')
            ->paginate(15)
            ->withQueryString();

        return view('siswa.index', compact('items', 'q'));
    }

    public function create()
    {
        $waliList = Wali::orderBy('nama')->get();
        return view('siswa.create', compact('waliList'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // siswa
            'nis' => ['required', 'string', 'max:30', 'unique:siswa,nis'],
            'nama' => ['required', 'string', 'max:150'],
            'jenis_kelamin' => ['nullable', 'in:L,P'],
            'tempat_lahir' => ['nullable', 'string', 'max:80'],
            'tgl_lahir' => ['nullable', 'date'],
            'alamat' => ['nullable', 'string'],
            'telepon' => ['nullable', 'string', 'max:30'],
            'is_active' => ['nullable', 'boolean'],

            // wali (opsional)
            'wali_id' => ['nullable', 'integer', 'exists:wali,id'],
            'wali_nama' => ['nullable', 'string', 'max:120'],
            'wali_telepon' => ['nullable', 'string', 'max:30'],
            'wali_email' => ['nullable', 'email', 'max:120'],
            'wali_alamat' => ['nullable', 'string'],
        ]);

        $waliId = $data['wali_id'] ?? null;

        // Kalau tidak pilih wali_id, tapi mengisi nama wali -> buat wali baru
        if (!$waliId && !empty($data['wali_nama'])) {
            $wali = Wali::create([
                'nama' => $data['wali_nama'],
                'telepon' => $data['wali_telepon'] ?? null,
                'email' => $data['wali_email'] ?? null,
                'alamat' => $data['wali_alamat'] ?? null,
            ]);
            $waliId = $wali->id;
        }

        $siswaData = Arr::only($data, [
            'nis',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tgl_lahir',
            'alamat',
            'telepon'
        ]);
        $siswaData['is_active'] = $request->boolean('is_active', true);
        $siswaData['wali_id'] = $waliId;

        Siswa::create($siswaData);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }


    public function edit(Siswa $siswa)
    {
        $waliList = Wali::orderBy('nama')->get();
        return view('siswa.edit', compact('siswa', 'waliList'));
    }

    public function update(Request $request, Siswa $siswa)
{
    // 1. Validasi Data
    $data = $request->validate([
        // Validasi Siswa
        'nis'           => ['required', 'string', 'max:30', 'unique:siswa,nis,' . $siswa->id],
        'nama'          => ['required', 'string', 'max:150'],
        'jenis_kelamin' => ['nullable', 'in:L,P'],
        'tempat_lahir'  => ['nullable', 'string', 'max:80'],
        'tgl_lahir'     => ['nullable', 'date'],
        'alamat'        => ['nullable', 'string'],
        'telepon'       => ['nullable', 'string', 'max:30'],
        'is_active'     => ['nullable', 'boolean'],

        // Validasi Wali
        'wali_id'       => ['nullable', 'integer', 'exists:wali,id'],
        'wali_nama'     => ['nullable', 'string', 'max:120'],
        'wali_telepon'  => ['nullable', 'string', 'max:30'],
        'wali_email'    => ['nullable', 'email', 'max:120'],
        'wali_alamat'   => ['nullable', 'string'],
        'update_wali'   => ['nullable', 'boolean'],
    ]);

    // 2. Logika Update/Tambah Wali
    $waliId = $data['wali_id'] ?? null;

    if ($waliId) {
        // Jika pilih wali dari daftar yang sudah ada
        $siswa->wali_id = $waliId;
    } elseif (!empty($data['wali_nama'])) {
        // Jika input nama wali manual
        if ($request->boolean('update_wali') && $siswa->wali_id) {
            // Update data wali yang sudah tersambung sebelumnya
            $siswa->wali->update([
                'nama'    => $data['wali_nama'],
                'telepon' => $data['wali_telepon'] ?? null,
                'email'   => $data['wali_email'] ?? null,
                'alamat'  => $data['wali_alamat'] ?? null,
            ]);
        } else {
            // Buat wali baru
            $wali = Wali::create([
                'nama'    => $data['wali_nama'],
                'telepon' => $data['wali_telepon'] ?? null,
                'email'   => $data['wali_email'] ?? null,
                'alamat'  => $data['wali_alamat'] ?? null,
            ]);
            $siswa->wali_id = $wali->id;
        }
    }

    // 3. Update Data Siswa
    // Mengisi data yang diizinkan saja
    $siswa->fill(Arr::only($data, [
        'nis',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'telepon'
    ]));

    // Update status aktif (checkbox biasanya tidak terkirim jika tidak dicentang)
    $siswa->is_active = $request->has('is_active');

    // Simpan perubahan ke database
    $siswa->save();

    // 4. Redirect dengan pesan sukses
    return redirect()
        ->route('siswa.index')
        ->with('success', 'Data siswa ' . $siswa->nama . ' berhasil diperbarui.');
}


    public function destroy(Siswa $siswa)
    {
        // lebih aman soft-delete style: nonaktifkan agar histori absensi tetap aman
        $siswa->update(['is_active' => !$siswa->is_active]);
        return back()->with('success', 'Siswa dinonaktifkan.');
    }
}
