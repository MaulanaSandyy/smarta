<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/pilih-sistem', function () {
    return view('auth.pilih-sistem');
})->name('pilih-sistem');

Route::post('/demo-login', function (\Illuminate\Http\Request $request) {
    $email = $request->input('role') === 'masjid' ? 'ketua@masjid.test' : 'ketua@rt01.test';
    if (\Illuminate\Support\Facades\Auth::attempt(['email' => $email, 'password' => 'password'])) {
        $request->session()->regenerate();
        $title = $request->input('role') === 'masjid' ? 'Ketua DKM' : 'Ketua RT';
        $user = ['name' => $title, 'title' => $title, 'email' => $email, 'initial' => $title[0]];
        session(['smarta_user' => $user]);
        return redirect()->route('pilih-sistem');
    }
    return back()->withErrors(['email' => 'Login gagal']);
})->name('demo-login');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // === SISTEM RT ===
    Route::prefix('rt')->name('rt.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\RT\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('data-warga', \App\Http\Controllers\RT\WargaController::class)->parameters(['data-warga' => 'warga']);
        Route::resource('surat', \App\Http\Controllers\RT\PengajuanSuratController::class)->parameters(['surat' => 'pengajuan_surat']);
        Route::resource('informasi', \App\Http\Controllers\RT\InformasiController::class);
        Route::resource('iuran', \App\Http\Controllers\RT\IuranController::class);
        Route::post('/iuran/bayar', [\App\Http\Controllers\RT\IuranController::class, 'bayar'])->name('iuran.bayar');
        Route::get('/iuran/pembayaran', [\App\Http\Controllers\RT\IuranController::class, 'pembayaranIndex'])->name('iuran.pembayaran');
        Route::resource('laporan', \App\Http\Controllers\RT\LaporanController::class);
        Route::post('/laporan/{laporan}/tanggap', [\App\Http\Controllers\RT\LaporanController::class, 'tanggap'])->name('laporan.tanggap');
        Route::resource('agenda', \App\Http\Controllers\RT\AgendaController::class);
        Route::resource('kas', \App\Http\Controllers\RT\KasController::class);
        Route::resource('ronda', \App\Http\Controllers\RT\RondaController::class);
        Route::post('/ronda/jadwal', [\App\Http\Controllers\RT\RondaController::class, 'jadwalStore'])->name('ronda.jadwal-store');
        Route::post('/ronda/laporan-keamanan', [\App\Http\Controllers\RT\RondaController::class, 'laporanKeamananStore'])->name('ronda.laporan-keamanan-store');
        Route::resource('kalender', \App\Http\Controllers\RT\KalenderController::class)->parameters(['kalender' => 'kalender_event']);
        Route::resource('portal-kos', \App\Http\Controllers\RT\PortalKoController::class)->parameters(['portal-kos' => 'portal_ko']);
        Route::get('/direktori', function () {
            return view('rt.direktori.index');
        })->name('direktori');
    });

    // === SISTEM MASJID ===
    Route::prefix('masjid')->name('masjid.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Masjid\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('jamaah', \App\Http\Controllers\Masjid\JamaahController::class)->parameters(['jamaah' => 'jamaah']);
        Route::resource('keuangan', \App\Http\Controllers\Masjid\KeuanganController::class)->parameters(['keuangan' => 'keuangan_masjid']);
        Route::resource('donasi', \App\Http\Controllers\Masjid\DonasiController::class);
        Route::resource('kajian', \App\Http\Controllers\Masjid\KajianController::class);
        Route::resource('inventaris', \App\Http\Controllers\Masjid\InventarisController::class)->parameters(['inventaris' => 'inventaris_masjid']);
        Route::resource('kalender', \App\Http\Controllers\Masjid\KalenderController::class)->parameters(['kalender' => 'kalender_event']);
        Route::resource('galeri', \App\Http\Controllers\Masjid\GaleriController::class);
    });
});

require __DIR__ . '/auth.php';
