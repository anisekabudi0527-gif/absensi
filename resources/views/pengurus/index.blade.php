@extends('layouts.app')
@php $pageTitle = 'Pengurus Kelas'; @endphp

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="text-sm text-slate-500">Kelola jabatan pengurus. Sekretaris yang aktif bisa login (sesuai aturan).
            </div>
            <a href="{{ route('pengurus.create') }}"
                class="rounded-2xl bg-indigo-950 text-white px-5 py-2.5 hover:bg-indigo-900">
                + Tambah Pengurus
            </a>
        </div>

        <div class="overflow-x-auto border border-slate-200 rounded-2xl">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="text-left px-4 py-3">No</th>
                        <th class="text-left px-4 py-3">Siswa</th>
                        <th class="text-left px-4 py-3">Jabatan</th>
                        <th class="text-left px-4 py-3">Periode</th>
                        <th class="text-left px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $i => $p)
                        <tr class="{{ $i % 2 === 0 ? 'bg-white' : 'bg-slate-50' }}">
                            <td class="px-4 py-3">{{ $items->firstItem() + $i }}</td>
                            <td class="px-4 py-3">
                                <div class="font-medium">{{ $p->siswa->nama }}</div>
                                <div class="text-xs text-slate-500">{{ $p->siswa->nis }}</div>
                            </td>
                            <td class="px-4 py-3">{{ $p->jabatan }}</td>
                            <td class="px-4 py-3 text-xs text-slate-600">
                                {{ $p->periode_awal->format('Y-m-d') }} —
                                {{ $p->periode_akhir?->format('Y-m-d') ?? 'aktif' }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('pengurus.edit', $p) }}"
                                        class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 hover:bg-slate-50">Edit</a>
                                    <form method="POST" action="{{ route('pengurus.destroy', $p) }}"
                                        onsubmit="return confirm('Hapus data pengurus ini?')">
                                        @csrf @method('DELETE')
                                        <button
                                            class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 hover:bg-slate-50">Hapus</button>
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
