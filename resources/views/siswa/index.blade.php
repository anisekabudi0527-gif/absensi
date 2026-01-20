@extends('layouts.app')
@php $pageTitle = 'Data Siswa'; @endphp

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-6">
        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
            <form method="GET" class="flex gap-2">
                <input name="q" value="{{ $q ?? '' }}" placeholder="Cari NIS / Nama..."
                    class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2.5 w-72">
                <button class="rounded-2xl border border-slate-200 bg-white px-4 py-2.5 hover:bg-slate-50">Cari</button>
            </form>

            <a href="{{ route('siswa.create') }}"
                class="rounded-2xl bg-indigo-950 text-white px-5 py-2.5 hover:bg-indigo-900">
                + Tambah Siswa
            </a>
        </div>

        <div class="overflow-x-auto border border-slate-200 rounded-2xl">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="text-left px-4 py-3">No</th>
                        <th class="text-left px-4 py-3">NIS</th>
                        <th class="text-left px-4 py-3">Nama</th>
                        <th class="text-left px-4 py-3">Aktif</th>
                        <th class="text-left px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $i => $s)
                        <tr class="{{ $i % 2 === 0 ? 'bg-white' : 'bg-slate-50' }}">
                            <td class="px-4 py-3">{{ $items->firstItem() + $i }}</td>
                            <td class="px-4 py-3">{{ $s->nis }}</td>
                            <td class="px-4 py-3 font-medium">{{ $s->nama }}</td>
                            <td class="px-4 py-3">
                                <span
                                    class="rounded-full px-3 py-1 text-xs border {{ $s->is_active ? 'bg-emerald-50 border-emerald-200 text-emerald-700' : 'bg-rose-50 border-rose-200 text-rose-700' }}">
                                    {{ $s->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('siswa.edit', $s) }}"
                                        class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 hover:bg-slate-50">Edit</a>
                                    <form method="POST" action="{{ route('siswa.destroy', $s) }}"
                                        onsubmit="return confirm('{{ $s->is_active ? 'Nonaktifkan' : 'Aktifkan' }} siswa ini?')">
                                        @csrf @method('DELETE')
                                        <button
                                            class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 hover:bg-slate-50">
                                            {{ $s->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            {{ $items->onEachSide(1)->links('components.pagination') }}
        </div>
    </div>
@endsection
