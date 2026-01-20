<?php

namespace App\Http\Controllers;

use App\Models\AbsensiHarian;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        $totalSiswa = Siswa::where('is_active', true)->count();
        $absenHariIni = AbsensiHarian::where('tanggal', $today)->count();

        $stat = AbsensiHarian::selectRaw("status, COUNT(*) as total")
            ->where('tanggal', $today)
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        return view('dashboard', [
            'totalSiswa' => $totalSiswa,
            'absenHariIni' => $absenHariIni,
            'stat' => $stat,
            'today' => $today,
        ]);
    }
}
