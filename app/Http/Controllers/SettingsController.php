<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kelas' => ['nullable', 'string', 'max:100'],
            'jurusan' => ['nullable', 'string', 'max:100'],
            'tingkat' => ['nullable', 'string', 'max:30'],
            'tahun_ajaran' => ['nullable', 'string', 'max:20'],
            'jam_masuk_batas' => ['nullable', 'date_format:H:i'],
        ]);

        foreach ($data as $k => $v) {
            Setting::updateOrCreate(['key' => $k], ['value' => $v]);
        }

        return back()->with('success', 'Settings tersimpan.');
    }
}
