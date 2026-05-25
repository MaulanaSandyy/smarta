<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/pilih-sistem', function () {
    return view('auth.pilih-sistem');
})->name('pilih-sistem');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('rt')->name('rt.')->group(function () {
        Route::get('/dashboard', fn() => view('rt.dashboard'))->name('dashboard');
        Route::get('/data-warga', fn() => view('rt.data-warga.index'))->name('data-warga');
        Route::get('/surat', fn() => view('rt.surat.index'))->name('surat');
        Route::get('/informasi', fn() => view('rt.informasi.index'))->name('informasi');
        Route::get('/iuran', fn() => view('rt.iuran.index'))->name('iuran');
        Route::get('/laporan', fn() => view('rt.laporan.index'))->name('laporan');
        Route::get('/agenda', fn() => view('rt.agenda.index'))->name('agenda');
        Route::get('/kas', fn() => view('rt.kas.index'))->name('kas');
        Route::get('/ronda', fn() => view('rt.ronda.index'))->name('ronda');
        Route::get('/direktori', fn() => view('rt.direktori.index'))->name('direktori');
        Route::get('/kalender', fn() => view('rt.kalender.index'))->name('kalender');
        Route::get('/portal-kos', fn() => view('rt.portal-kos.index'))->name('portal-kos');
    });

    Route::prefix('masjid')->name('masjid.')->group(function () {
        Route::get('/dashboard', fn() => view('masjid.dashboard'))->name('dashboard');
        Route::get('/jamaah', fn() => view('masjid.jamaah.index'))->name('jamaah');
        Route::get('/keuangan', fn() => view('masjid.keuangan.index'))->name('keuangan');
        Route::get('/donasi', fn() => view('masjid.donasi.index'))->name('donasi');
        Route::get('/kajian', fn() => view('masjid.kajian.index'))->name('kajian');
        Route::get('/inventaris', fn() => view('masjid.inventaris.index'))->name('inventaris');
        Route::get('/kalender', fn() => view('masjid.kalender.index'))->name('kalender');
        Route::get('/galeri', fn() => view('masjid.galeri.index'))->name('galeri');
    });
});

require __DIR__.'/auth.php';
