@extends('layouts.app')

@php
    $pageTitle = 'Rekap Absensi';
@endphp

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-6">
        <form method="GET" action="{{ route('rekap.index') }}" class="flex flex-wrap items-end gap-3 mb-5">
            <div>
                <div class="text-sm text-slate-600">Bulan</div>
                <input type="number" min="1" max="12" name="bulan" value="{{ $bulan }}"
                    class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2 w-28">
            </div>
            <div>
                <div class="text-sm text-slate-600">Tahun</div>
                <input type="number" min="2000" max="2100" name="tahun" value="{{ $tahun }}"
                    class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2 w-36">
            </div>
            <button class="rounded-2xl bg-indigo-950 text-white px-5 py-2.5 hover:bg-indigo-900">
                Filter
            </button>
            <div class="text-xs text-slate-500 ml-auto">
                Periode: {{ $start }} s/d {{ $end }}
            </div>
        </form>

        <div class="overflow-x-auto border border-slate-200 rounded-2xl">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="text-left px-4 py-3">No</th>
                        <th class="text-left px-4 py-3">NIS</th>
                        <th class="text-left px-4 py-3">Nama</th>
                        <th class="text-left px-4 py-3">H</th>
                        <th class="text-left px-4 py-3">I</th>
                        <th class="text-left px-4 py-3">S</th>
                        <th class="text-left px-4 py-3">A</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $i => $s)
                        @php $r = $rows[$s->id] ?? null; @endphp
                        <tr class="{{ $i % 2 === 0 ? 'bg-white' : 'bg-slate-50' }}">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3">{{ $s->nis }}</td>
                            <td class="px-4 py-3 font-medium">{{ $s->nama }}</td>
                            <td class="px-4 py-3">{{ $r->hadir ?? 0 }}</td>
                            <td class="px-4 py-3">{{ $r->izin ?? 0 }}</td>
                            <td class="px-4 py-3">{{ $r->sakit ?? 0 }}</td>
                            <td class="px-4 py-3">{{ $r->alfa ?? 0 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
