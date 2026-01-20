@extends('layouts.app')
@php $pageTitle = 'Absensi Harian'; @endphp

@section('content')
    @php
        $role = auth()->user()->role ?? '';
        $isWali = $role === 'wali_kelas';
        $isSekre = $role === 'sekretaris';

        // lock:
        // - closed: semua terkunci
        // - sekretaris + finalized: terkunci semua (sekretaris tidak boleh input setelah finalisasi)
        $lockAll = $isClosed || ($isSekre && $isFinalized);
        $lockStatus = $isFinalized || $isClosed;

        $fmtTime = function ($v) {
            if (!$v) {
                return '';
            }
            $v = (string) $v;
            return strlen($v) >= 5 ? substr($v, 0, 5) : $v; // HH:MM
        };
    @endphp

    <div class="max-w-7xl space-y-4">

        @if ($isClosed)
            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-700">
                Absensi tanggal <b>{{ $date }}</b> sudah <b>DITUTUP</b>. Semua data terkunci.
            </div>
        @elseif($isFinalized)
            <div class="rounded-2xl border border-amber-200 bg-amber-50 px-4 py-3 text-amber-900">
                Absensi tanggal <b>{{ $date }}</b> sudah <b>DIFINALISASI</b> (STATUS terkunci).
                @if ($isWali)
                    Anda masih bisa mengisi <b>jam masuk/keluar</b> dan catatan.
                @else
                    Sekretaris tidak bisa mengubah data setelah finalisasi.
                @endif
            </div>
        @endif

        <div class="rounded-3xl border border-slate-200 bg-white p-6">
            <div class="flex flex-wrap items-end justify-between gap-3">
                <div>
                    <div class="text-sm text-slate-500">Absensi per hari (1 kelas)</div>
                    <div class="text-2xl font-bold text-slate-900">Absensi Harian</div>
                </div>

                @if ($isWali)
                    <form method="GET" class="flex items-end gap-2">
                        <div>
                            <div class="text-xs text-slate-500 mb-1">Tanggal</div>
                            <input type="date" name="date" value="{{ $date }}"
                                class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2.5">
                        </div>
                        <button class="rounded-2xl border border-slate-200 bg-white px-4 py-2.5 hover:bg-slate-50">
                            Tampilkan
                        </button>
                        <a href="{{ route('absensi.index') }}"
                            class="rounded-2xl border border-slate-200 bg-white px-4 py-2.5 hover:bg-slate-50">
                            Hari ini
                        </a>
                    </form>
                @else
                    <div class="text-sm text-slate-600">
                        Tanggal: <b>{{ $date }}</b>
                        <span class="text-xs text-slate-400">(sekretaris hanya hari ini)</span>
                    </div>
                @endif
            </div>

            <div class="mt-5 flex flex-wrap items-center gap-2 text-xs">
                <span class="rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1">H:
                    Hadir</span>
                <span class="rounded-full bg-amber-50 text-amber-800 border border-amber-200 px-3 py-1">I: Izin</span>
                <span class="rounded-full bg-sky-50 text-sky-800 border border-sky-200 px-3 py-1">S: Sakit</span>
                <span class="rounded-full bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1">A: Alfa</span>
                <span class="ml-auto text-slate-500">
                    Total siswa aktif: <b class="text-slate-700">{{ $siswa->count() }}</b>
                </span>
            </div>

            {{-- FORM STORE --}}
            <form id="absensiStoreForm" method="POST" action="{{ route('absensi.store') }}" class="mt-5"
                data-lock-all="{{ $lockAll ? 1 : 0 }}">
                @csrf
                <input type="hidden" name="date" value="{{ $date }}">

                <div class="overflow-x-auto rounded-2xl border border-slate-200">
                    <table class="min-w-full text-sm">
                        <thead class="bg-slate-100 text-slate-700">
                            <tr>
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">NIS</th>
                                <th class="px-4 py-3 text-left">Nama</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Jam Masuk</th>
                                <th class="px-4 py-3 text-left">Jam Keluar</th>
                                <th class="px-4 py-3 text-left">Catatan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($siswa as $i => $s)
                                @php
                                    $row = $existing[$s->id] ?? null;

                                    $status = old("items.$i.status", $row->status ?? 'H');

                                    $jamMasuk = old("items.$i.jam_masuk", $fmtTime($row->jam_masuk ?? ''));
                                    $jamKeluar = old("items.$i.jam_keluar", $fmtTime($row->jam_keluar ?? ''));

                                    $jamMasuk = $fmtTime($jamMasuk);
                                    $jamKeluar = $fmtTime($jamKeluar);

                                    $catatan = old("items.$i.catatan", $row->catatan ?? '');

                                    $badge = match ($status) {
                                        'H' => 'bg-emerald-50 border-emerald-200 text-emerald-700',
                                        'I' => 'bg-amber-50 border-amber-200 text-amber-800',
                                        'S' => 'bg-sky-50 border-sky-200 text-sky-800',
                                        'A' => 'bg-rose-50 border-rose-200 text-rose-700',
                                        default => 'bg-slate-50 border-slate-200 text-slate-700',
                                    };

                                    // disable time/catatan untuk lockAll
                                    $disabled = $lockAll ? 'disabled' : '';
                                @endphp

                                <tr data-abs-row class="{{ $i % 2 === 0 ? 'bg-white' : 'bg-slate-50' }}">
                                    <td class="px-4 py-3">{{ $i + 1 }}</td>
                                    <td class="px-4 py-3 text-slate-600">{{ $s->nis }}</td>
                                    <td class="px-4 py-3 font-medium text-slate-900">{{ $s->nama }}</td>

                                    <td class="px-4 py-3">
                                        <input type="hidden" name="items[{{ $i }}][siswa_id]"
                                            value="{{ $s->id }}">

                                        @if ($lockStatus)
                                            <input type="hidden" name="items[{{ $i }}][status]"
                                                value="{{ $status }}">
                                            <span
                                                class="inline-flex items-center rounded-full border px-3 py-1 text-xs {{ $badge }}">
                                                {{ $status }}
                                            </span>
                                        @else
                                            <select name="items[{{ $i }}][status]"
                                                class="rounded-xl border border-slate-200 bg-white px-3 py-2">
                                                <option value="H" @selected($status === 'H')>H</option>
                                                <option value="I" @selected($status === 'I')>I</option>
                                                <option value="S" @selected($status === 'S')>S</option>
                                                <option value="A" @selected($status === 'A')>A</option>
                                            </select>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        <input type="time" step="60" name="items[{{ $i }}][jam_masuk]"
                                            value="{{ $jamMasuk }}" {!! $disabled !!}
                                            class="w-36 rounded-xl border border-slate-200 bg-white px-3 py-2 disabled:bg-slate-100 disabled:text-slate-400">
                                        @if ($lockAll)
                                            <input type="hidden" name="items[{{ $i }}][jam_masuk]"
                                                value="{{ $jamMasuk }}">
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        <input type="time" step="60" name="items[{{ $i }}][jam_keluar]"
                                            value="{{ $jamKeluar }}" {!! $disabled !!}
                                            class="w-36 rounded-xl border border-slate-200 bg-white px-3 py-2 disabled:bg-slate-100 disabled:text-slate-400">
                                        @if ($lockAll)
                                            <input type="hidden" name="items[{{ $i }}][jam_keluar]"
                                                value="{{ $jamKeluar }}">
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        <input type="text" name="items[{{ $i }}][catatan]"
                                            value="{{ $catatan }}" {!! $disabled !!} placeholder="Opsional..."
                                            class="w-72 rounded-xl border border-slate-200 bg-white px-3 py-2 disabled:bg-slate-100 disabled:text-slate-400">
                                        @if ($lockAll)
                                            <input type="hidden" name="items[{{ $i }}][catatan]"
                                                value="{{ $catatan }}">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>

            {{-- ACTIONS (OUTSIDE form store) --}}
            <div class="mt-5 flex flex-wrap items-center justify-between gap-3">
                <div class="text-sm text-slate-500">
                    @if ($isSekre)
                        Input sekretaris: hanya hari ini.
                    @else
                        Anda bisa pilih tanggal.
                    @endif
                </div>

                <div class="flex flex-wrap gap-2">
                    @php
                        $sekreLocked = $isSekre && ($isFinalized || $isClosed);
                    @endphp

                    {{-- SIMPAN --}}
                    @if ($sekreLocked)
                        <button type="button" disabled
                            class="rounded-2xl bg-slate-200 px-5 py-2.5 text-slate-500 cursor-not-allowed">
                            Terkunci (sudah finalisasi)
                        </button>
                    @elseif(!$lockAll)
                        <button form="absensiStoreForm" type="submit" name="intent" value="save"
                            class="rounded-2xl bg-indigo-950 px-5 py-2.5 text-white hover:bg-indigo-900">
                            Simpan
                        </button>
                    @else
                        <button type="button" disabled
                            class="rounded-2xl bg-slate-200 px-5 py-2.5 text-slate-500 cursor-not-allowed">
                            Terkunci
                        </button>
                    @endif

                    {{-- FINALIZE + CLOSE (wali saja) --}}
                    @if ($isWali)
                        <button form="absensiStoreForm" type="submit" name="intent" value="finalize"
                            class="rounded-2xl border border-slate-200 bg-white px-5 py-2.5 hover:bg-slate-50"
                            onclick="return confirm('Simpan & finalisasi STATUS untuk tanggal ini?')">
                            Finalisasi Status
                        </button>

                        <button form="absensiStoreForm" type="submit" name="intent" value="close"
                            class="rounded-2xl bg-indigo-950 px-5 py-2.5 text-white hover:bg-indigo-900"
                            onclick="return confirm('Simpan & tutup hari ini? Setelah ditutup semua field terkunci.')">
                            Tutup Hari
                        </button>
                    @endif
                </div>

            </div>

            {{-- ERRORS --}}
            @if ($errors->any())
                <div class="mt-4 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-rose-800">
                    <div class="font-semibold mb-1">Validasi gagal:</div>
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- JS --}}
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const form = document.getElementById('absensiStoreForm');
                    if (!form) return;

                    if (form.dataset.lockAll === '1') return;

                    const pad = (n) => String(n).padStart(2, '0');
                    const now = new Date();
                    const pageTime = `${pad(now.getHours())}:${pad(now.getMinutes())}`;

                    const rows = document.querySelectorAll('tr[data-abs-row]');

                    const getStatus = (tr) => {
                        const sel = tr.querySelector('select[name$="[status]"]');
                        if (sel) return sel.value;
                        const hid = tr.querySelector('input[type="hidden"][name$="[status]"]');
                        return hid ? hid.value : 'H';
                    };

                    const jmEl = (tr) => tr.querySelector('input[type="time"][name$="[jam_masuk]"]');
                    const jkEl = (tr) => tr.querySelector('input[type="time"][name$="[jam_keluar]"]');

                    const setTimeEnabled = (tr, enabled) => {
                        const jm = jmEl(tr);
                        const jk = jkEl(tr);
                        if (jm) jm.disabled = !enabled;
                        if (jk) jk.disabled = !enabled;
                    };

                    const clearTime = (tr) => {
                        const jm = jmEl(tr);
                        const jk = jkEl(tr);
                        if (jm) jm.value = '';
                        if (jk) jk.value = '';
                    };

                    const ensureJamMasuk = (tr, timeValue) => {
                        const jm = jmEl(tr);
                        if (!jm) return;
                        if (!jm.value) jm.value = timeValue;
                    };

                    const applyRule = (tr, status, timeValue) => {
                        if (status !== 'H') {
                            clearTime(tr);
                            setTimeEnabled(tr, false);
                        } else {
                            setTimeEnabled(tr, true);
                            ensureJamMasuk(tr, timeValue);
                        }
                    };

                    // apply saat load
                    rows.forEach((tr) => applyRule(tr, getStatus(tr), pageTime));

                    // listen perubahan status
                    rows.forEach((tr) => {
                        const sel = tr.querySelector('select[name$="[status]"]');
                        if (!sel) return;

                        sel.addEventListener('change', () => {
                            const t = new Date();
                            const curTime = `${pad(t.getHours())}:${pad(t.getMinutes())}`;
                            applyRule(tr, sel.value, curTime);
                        });
                    });
                });
            </script>

        </div>
    </div>
@endsection
