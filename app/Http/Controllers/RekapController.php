<?php

namespace App\Http\Controllers;

use App\Models\AbsensiHarian;
use App\Models\Siswa;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $bulan = (int) ($request->get('bulan') ?: now()->month);
        $tahun = (int) ($request->get('tahun') ?: now()->year);

        $start = now()->setDate($tahun, $bulan, 1)->startOfMonth()->toDateString();
        $end = now()->setDate($tahun, $bulan, 1)->endOfMonth()->toDateString();

        $siswa = Siswa::where('is_active', true)->orderBy('nama')->get();

        $rows = AbsensiHarian::selectRaw("siswa_id,
            SUM(CASE WHEN status='H' THEN 1 ELSE 0 END) as hadir,
            SUM(CASE WHEN status='I' THEN 1 ELSE 0 END) as izin,
            SUM(CASE WHEN status='S' THEN 1 ELSE 0 END) as sakit,
            SUM(CASE WHEN status='A' THEN 1 ELSE 0 END) as alfa
        ")
        ->whereBetween('tanggal', [$start, $end])
        ->groupBy('siswa_id')
        ->get()
        ->keyBy('siswa_id');

        return view('rekap.index', compact('bulan','tahun','start','end','siswa','rows'));
    }
}