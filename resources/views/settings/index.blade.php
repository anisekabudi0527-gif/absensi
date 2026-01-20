@extends('layouts.app')

@php
    $pageTitle = 'Settings';
@endphp

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-6 max-w-2xl">
        <form method="POST" action="{{ route('settings.store') }}" class="space-y-4">
            @csrf

            <div>
                <div class="text-sm text-slate-600">Nama Kelas</div>
                <input name="nama_kelas" value="{{ $settings['nama_kelas'] ?? '' }}"
                    class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <div class="text-sm text-slate-600">Jurusan</div>
                    <input name="jurusan" value="{{ $settings['jurusan'] ?? '' }}"
                        class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                </div>
                <div>
                    <div class="text-sm text-slate-600">Tingkat</div>
                    <input name="tingkat" value="{{ $settings['tingkat'] ?? '' }}"
                        class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <div class="text-sm text-slate-600">Tahun Ajaran</div>
                    <input name="tahun_ajaran" value="{{ $settings['tahun_ajaran'] ?? '' }}"
                        class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                </div>
                <div>
                    <div class="text-sm text-slate-600">Jam Masuk Batas</div>
                    <input type="time" name="jam_masuk_batas" value="{{ $settings['jam_masuk_batas'] ?? '' }}"
                        class="mt-1 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
                </div>
            </div>

            <button class="rounded-2xl bg-indigo-950 text-white px-5 py-3 hover:bg-indigo-900">
                Simpan
            </button>
        </form>
    </div>
@endsection
