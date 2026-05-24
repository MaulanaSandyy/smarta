<x-layouts.masjid>
    <x-slot:title>Galeri & Informasi</x-slot:title>
    <x-slot:subtitle>Dokumentasi kegiatan, pengumuman, dan artikel masjid</x-slot:subtitle>

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <button class="btn-secondary btn-sm">Semua</button>
            <button class="btn-ghost btn-sm">Foto</button>
            <button class="btn-ghost btn-sm">Video</button>
            <button class="btn-ghost btn-sm">Artikel</button>
        </div>
        <button class="btn-primary btn-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Unggah
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
        @php
            $galeri = [
                ['title' => 'Kajian Tafsir Al-Quran', 'desc' => 'Kegiatan kajian tafsir rutin setiap Senin ba\'da Maghrib', 'date' => '25 Mei 2026', 'type' => 'Foto', 'count' => '12 foto', 'color' => 'bg-emerald-500'],
                ['title' => 'Bakti Sosial Ramadhan', 'desc' => 'Pembagian paket sembako untuk warga kurang mampu', 'date' => '20 Mei 2026', 'type' => 'Foto', 'count' => '24 foto', 'color' => 'bg-amber-500'],
                ['title' => 'Pengajian Akbar', 'desc' => 'Pengajian akbar dengan tema "Memperkuat Ukhuwah Islamiyah"', 'date' => '15 Mei 2026', 'type' => 'Video', 'count' => '2 video', 'color' => 'bg-purple-500'],
                ['title' => 'Peringatan Isra Miraj', 'desc' => 'Peringatan Isra Miraj Nabi Muhammad SAW 1447 H', 'date' => '10 Mei 2026', 'type' => 'Foto', 'count' => '18 foto', 'color' => 'bg-rose-500'],
                ['title' => 'Khotbah Jumat Spesial', 'desc' => 'Khotbah Jumat dengan Ustadz tamu dari Jakarta', 'date' => '8 Mei 2026', 'type' => 'Video', 'count' => '1 video', 'color' => 'bg-blue-500'],
                ['title' => 'Gotong Royong Masjid', 'desc' => 'Kegiatan gotong royong membersihkan dan merawat masjid', 'date' => '5 Mei 2026', 'type' => 'Foto', 'count' => '8 foto', 'color' => 'bg-emerald-500'],
            ];
        @endphp
        @foreach ($galeri as $g)
            <x-ui.card class="hover:shadow-md transition-shadow p-0 overflow-hidden">
                <div class="h-40 {{ $g['color'] }} flex items-center justify-center">
                    <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if($g['type'] === 'Video')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        @endif
                    </svg>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="badge-slate text-[10px]">{{ $g['type'] }}</span>
                        <span class="text-xs text-text-muted">{{ $g['count'] }}</span>
                    </div>
                    <h3 class="text-sm font-semibold text-text-primary">{{ $g['title'] }}</h3>
                    <p class="text-xs text-text-secondary mt-1 line-clamp-2">{{ $g['desc'] }}</p>
                    <div class="flex items-center justify-between mt-3 pt-2 border-t border-border">
                        <span class="text-xs text-text-muted">{{ $g['date'] }}</span>
                        <button class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">Lihat</button>
                    </div>
                </div>
            </x-ui.card>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <x-ui.card>
            <x-slot:header>
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-semibold text-text-primary">Artikel & Informasi</h3>
                    <button class="btn-primary btn-sm">Tulis Artikel</button>
                </div>
            </x-slot:header>
            <div class="space-y-4">
                @php
                    $artikel = [
                        ['title' => 'Keutamaan Sholat Berjamaah', 'desc' => 'Sholat berjamaah memiliki keutamaan 27 derajat dibanding sholat sendirian...', 'date' => '24 Mei 2026', 'author' => 'DKM'],
                        ['title' => 'Jadwal Kajian Bulan Juni', 'desc' => 'Berikut adalah jadwal lengkap kajian dan kegiatan masjid selama bulan Juni 2026...', 'date' => '23 Mei 2026', 'author' => 'Sekretaris'],
                        ['title' => 'Laporan Keuangan Bulanan', 'desc' => 'Laporan keuangan masjid periode Mei 2026 telah selesai dan dapat diakses...', 'date' => '22 Mei 2026', 'author' => 'Bendahara'],
                    ];
                @endphp
                @foreach ($artikel as $a)
                    <div class="pb-4 {{ !$loop->last ? 'border-b border-border' : '' }}">
                        <h4 class="text-sm font-semibold text-text-primary">{{ $a['title'] }}</h4>
                        <p class="text-xs text-text-secondary mt-1">{{ $a['desc'] }}</p>
                        <div class="flex items-center gap-2 mt-2 text-xs text-text-muted">
                            <span>Oleh: {{ $a['author'] }}</span>
                            <span>&middot;</span>
                            <span>{{ $a['date'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-ui.card>

        <x-ui.card>
            <x-slot:header>
                <h3 class="text-base font-semibold text-text-primary">Informasi Masjid</h3>
            </x-slot:header>
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-text-primary">Alamat</p>
                        <p class="text-sm text-text-secondary">Jl. Masjid Al-Barakah No. 1, RT 01, Kel. Sukamaju</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-text-primary">Kontak</p>
                        <p class="text-sm text-text-secondary">0812-3456-7890 (Sekretariat)</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-text-primary">Jadwal</p>
                        <p class="text-sm text-text-secondary">Sholat 5 waktu &middot; Kajian setiap Senin-Kamis</p>
                    </div>
                </div>
            </div>
        </x-ui.card>
    </div>
</x-layouts.masjid>
