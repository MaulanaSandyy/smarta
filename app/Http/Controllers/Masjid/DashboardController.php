<?php

namespace App\Http\Controllers\Masjid;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\Kajian;
use App\Models\KeuanganMasjid;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJamaah = \App\Models\User::count();
        $totalKeuangan = KeuanganMasjid::sum('jumlah');
        $totalDonasi = Donasi::sum('jumlah');
        $totalKajian = Kajian::count();
        $transaksiTerbaru = KeuanganMasjid::latest()->take(5)->get();
        $kajianMendatang = Kajian::where('aktif', true)->take(5)->get();

        return view('masjid.dashboard', compact(
            'totalJamaah',
            'totalKeuangan',
            'totalDonasi',
            'totalKajian',
            'transaksiTerbaru',
            'kajianMendatang'
        ));
    }
}
