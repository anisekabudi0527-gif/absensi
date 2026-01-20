@extends('layouts.app')

@php
    $pageTitle = 'Dashboard';
@endphp

@section('content')
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 lg:col-span-4">
            <div class="rounded-3xl border border-slate-200 bg-white p-6">
                <div class="text-sm text-slate-500">Total Siswa Aktif</div>
                <div class="text-3xl font-extrabold mt-1">{{ $totalSiswa }}</div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-4">
            <div class="rounded-3xl border border-slate-200 bg-white p-6">
                <div class="text-sm text-slate-500">Tercatat Hari Ini</div>
                <div class="text-3xl font-extrabold mt-1">{{ $absenHariIni }}</div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-4">
            <div class="rounded-3xl border border-slate-200 bg-white p-6">
                <div class="text-sm text-slate-500">Tanggal</div>
                <div class="text-3xl font-extrabold mt-1">{{ $today }}</div>
            </div>
        </div>

        <div class="col-span-12">
            <div class="rounded-3xl border border-slate-200 bg-white p-6">
                <div class="font-semibold mb-4">Ringkasan Status Hari Ini</div>
                <div class="flex flex-wrap gap-2">
                    @php
                        $map = [
                            'H' => ['bg' => 'bg-emerald-50 border-emerald-200 text-emerald-800', 'label' => 'Hadir'],
                            'I' => ['bg' => 'bg-amber-50 border-amber-200 text-amber-800', 'label' => 'Izin'],
                            'S' => ['bg' => 'bg-sky-50 border-sky-200 text-sky-800', 'label' => 'Sakit'],
                            'A' => ['bg' => 'bg-rose-50 border-rose-200 text-rose-800', 'label' => 'Alfa'],
                        ];
                    @endphp
                    @foreach ($map as $k => $v)
                        <div class="rounded-2xl border px-4 py-2 {{ $v['bg'] }}">
                            <span class="font-semibold">{{ $v['label'] }}</span>:
                            <span>{{ $stat[$k] ?? 0 }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    <a href="{{ route('absensi.index') }}"
                        class="inline-flex items-center rounded-2xl bg-indigo-950 text-white px-4 py-2 hover:bg-indigo-900">
                        Input Absensi Hari Ini
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
