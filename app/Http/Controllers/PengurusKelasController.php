<?php

namespace App\Http\Controllers;

use App\Models\PengurusKelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PengurusKelasController extends Controller
{
    public function index()
    {
        $items = PengurusKelas::with('siswa')
            ->orderByRaw("LOWER(jabatan) ASC")
            ->orderByDesc('periode_awal')
            ->paginate(15);

        return view('pengurus.index', compact('items'));
    }

    public function create()
    {
        $siswaList = Siswa::where('is_active', true)->orderBy('nama')->get();
        return view('pengurus.create', compact('siswaList'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'siswa_id' => ['required', 'integer', 'exists:siswa,id'],
            'jabatan' => ['required', 'string', 'max:50'],
            'periode_awal' => ['required', 'date'],
            'periode_akhir' => ['nullable', 'date', 'after_or_equal:periode_awal'],
            'tugas' => ['nullable', 'string'],
        ]);

        PengurusKelas::create($data);

        return redirect()->route('pengurus.index')->with('success', 'Pengurus kelas berhasil ditambahkan.');
    }

    public function edit(PengurusKelas $penguru)
    {
        $siswaList = Siswa::where('is_active', true)->orderBy('nama')->get();
        return view('pengurus.edit', ['item' => $penguru, 'siswaList' => $siswaList]);
    }

    public function update(Request $request, PengurusKelas $penguru)
    {
        $data = $request->validate([
            'siswa_id' => ['required', 'integer', 'exists:siswa,id'],
            'jabatan' => ['required', 'string', 'max:50'],
            'periode_awal' => ['required', 'date'],
            'periode_akhir' => ['nullable', 'date', 'after_or_equal:periode_awal'],
            'tugas' => ['nullable', 'string'],
        ]);

        $penguru->update($data);

        return redirect()->route('pengurus.index')->with('success', 'Pengurus kelas berhasil diperbarui.');
    }

    public function destroy(PengurusKelas $pengurus)
    {
        $pengurus->delete();
        return back()->with('success', 'Pengurus kelas berhasil dihapus.');
    }
}
