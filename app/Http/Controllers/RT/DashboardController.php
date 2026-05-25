<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Warga;
use App\Models\PengajuanSurat;
use App\Models\PembayaranIuran;

class DashboardController extends Controller
{
    public function index()
    {
        $totalWarga = Warga::count();
        $totalSurat = PengajuanSurat::count();
        $totalIuran = PembayaranIuran::sum('jumlah');
        $totalAgenda = Agenda::count();
        $wargaTerbaru = Warga::latest()->take(5)->get();
        $suratTerbaru = PengajuanSurat::with('warga')->latest()->take(5)->get();
        $agendaMendatang = Agenda::where('tanggal', '>=', now())->latest()->take(5)->get();

        return view('rt.dashboard', compact(
            'totalWarga',
            'totalSurat',
            'totalIuran',
            'totalAgenda',
            'wargaTerbaru',
            'suratTerbaru',
            'agendaMendatang'
        ));
    }
}
