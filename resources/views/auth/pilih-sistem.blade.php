<x-layouts.guest>
    <div class="w-full max-w-2xl animate-fade-in">
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl bg-primary-600 flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4 shadow-lg shadow-primary-600/25">
                S
            </div>
            <h1 class="text-2xl font-bold text-text-primary">Pilih Sistem</h1>
            <p class="text-text-muted mt-1">Pilih sistem yang ingin Anda kelola</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('rt.dashboard') }}"
               class="card p-8 hover:shadow-lg transition-all duration-200 hover:-translate-y-0.5 group cursor-pointer">
                <div class="w-16 h-16 rounded-2xl bg-primary-100 text-primary-600 flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h2 class="text-xl font-bold text-text-primary text-center mb-2">Sistem RT</h2>
                <p class="text-sm text-text-secondary text-center leading-relaxed">
                    Kelola data warga, surat, iuran, kas, ronda, agenda, direktori, dan portal kos
                </p>
                <div class="mt-6 flex justify-center">
                    <span class="btn-primary">Masuk ke RT</span>
                </div>
            </a>

            <a href="{{ route('masjid.dashboard') }}"
               class="card p-8 hover:shadow-lg transition-all duration-200 hover:-translate-y-0.5 group cursor-pointer">
                <div class="w-16 h-16 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v4M6 6h12M3 10h18M4 22h16a2 2 0 002-2V8a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h2 class="text-xl font-bold text-text-primary text-center mb-2">Sistem Masjid</h2>
                <p class="text-sm text-text-secondary text-center leading-relaxed">
                    Kelola jamaah, keuangan masjid, donasi, jadwal kajian, inventaris, kalender, dan galeri
                </p>
                <div class="mt-6 flex justify-center">
                    <span class="btn-primary" style="background-color: var(--color-emerald-600);">Masuk ke Masjid</span>
                </div>
            </a>
        </div>
    </div>
</x-layouts.guest>
