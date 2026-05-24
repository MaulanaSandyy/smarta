<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/pilih-sistem', function () {
    return view('auth.pilih-sistem');
})->name('pilih-sistem');

Route::prefix('rt')->name('rt.')->group(function () {
    Route::get('/dashboard', function () {
        return view('rt.dashboard');
    })->name('dashboard');

    Route::get('/data-warga', function () {
        return view('rt.data-warga.index');
    })->name('data-warga');

    Route::get('/surat', function () {
        return view('rt.surat.index');
    })->name('surat');

    Route::get('/informasi', function () {
        return view('rt.informasi.index');
    })->name('informasi');

    Route::get('/iuran', function () {
        return view('rt.iuran.index');
    })->name('iuran');

    Route::get('/laporan', function () {
        return view('rt.laporan.index');
    })->name('laporan');

    Route::get('/agenda', function () {
        return view('rt.agenda.index');
    })->name('agenda');

    Route::get('/kas', function () {
        return view('rt.kas.index');
    })->name('kas');

    Route::get('/ronda', function () {
        return view('rt.ronda.index');
    })->name('ronda');

    Route::get('/direktori', function () {
        return view('rt.direktori.index');
    })->name('direktori');

    Route::get('/kalender', function () {
        return view('rt.kalender.index');
    })->name('kalender');

    Route::get('/portal-kos', function () {
        return view('rt.portal-kos.index');
    })->name('portal-kos');
});

Route::prefix('masjid')->name('masjid.')->group(function () {
    Route::get('/dashboard', function () {
        return view('masjid.dashboard');
    })->name('dashboard');

    Route::get('/jamaah', function () {
        return view('masjid.jamaah.index');
    })->name('jamaah');

    Route::get('/keuangan', function () {
        return view('masjid.keuangan.index');
    })->name('keuangan');

    Route::get('/donasi', function () {
        return view('masjid.donasi.index');
    })->name('donasi');

    Route::get('/kajian', function () {
        return view('masjid.kajian.index');
    })->name('kajian');

    Route::get('/inventaris', function () {
        return view('masjid.inventaris.index');
    })->name('inventaris');

    Route::get('/kalender', function () {
        return view('masjid.kalender.index');
    })->name('kalender');

    Route::get('/galeri', function () {
        return view('masjid.galeri.index');
    })->name('galeri');
});
