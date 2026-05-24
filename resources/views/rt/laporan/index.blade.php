<x-layouts.rt>
    <x-slot:title>Laporan & Aspirasi</x-slot:title>
    <x-slot:subtitle>Laporan dan aspirasi dari warga RT 01</x-slot:subtitle>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Daftar Laporan --}}
        <div class="lg:col-span-2">
            <div class="space-y-3">
                @php
                    $laporan = [
                        ['warga' => 'Budi Santoso', 'judul' => 'Lampu Jalan Mati', 'isi' => 'Lampu jalan di depan rumah saya sudah mati selama 3 hari. Mohon segera diperbaiki karena sangat gelap di malam hari.', 'tgl' => '25/05/2026', 'status' => 'Diproses', 'kategori' => 'Infrastruktur', 'avatar' => 'B'],
                        ['warga' => 'Siti Rahma', 'judul' => 'Usulan Program Kerja Bakti', 'isi' => 'Saya mengusulkan agar diadakan kerja bakti setiap hari Minggu untuk membersihkan selokan yang mulai tersumbat.', 'tgl' => '24/05/2026', 'status' => 'Selesai', 'kategori' => 'Kebersihan', 'avatar' => 'S'],
                        ['warga' => 'Ahmad Fauzi', 'judul' => 'Keamanan Lingkungan', 'isi' => 'Akhir-akhir ini ada beberapa orang mencurigakan yang sering berkeliaran di malam hari. Mohon tingkatkan ronda malam.', 'tgl' => '23/05/2026', 'status' => 'Menunggu', 'kategori' => 'Keamanan', 'avatar' => 'A'],
                        ['warga' => 'Rina Wijaya', 'judul' => 'Pengaduan Sampah', 'isi' => 'Tempat sampah di belakang rumah saya sudah penuh dan tidak diangkut selama seminggu. Mohon segera ditindaklanjuti.', 'tgl' => '22/05/2026', 'status' => 'Diproses', 'kategori' => 'Kebersihan', 'avatar' => 'R'],
                        ['warga' => 'Doni Prasetyo', 'judul' => 'Usulan Pos Kamling', 'isi' => 'Saya mengusulkan perbaikan pos kamling yang sudah mulai rusak agar bisa digunakan untuk ronda dengan nyaman.', 'tgl' => '21/05/2026', 'status' => 'Selesai', 'kategori' => 'Infrastruktur', 'avatar' => 'D'],
                    ];
                @endphp
                @foreach ($laporan as $l)
                    <x-ui.card>
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-sm font-semibold flex-shrink-0">{{ $l['avatar'] }}</div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2 mb-1">
                                    <div>
                                        <h3 class="text-sm font-semibold text-text-primary">{{ $l['judul'] }}</h3>
                                        <p class="text-xs text-text-muted">Oleh {{ $l['warga'] }} &middot; {{ $l['tgl'] }}</p>
                                    </div>
                                    <span class="{{ $l['status'] === 'Selesai' ? 'badge-success' : ($l['status'] === 'Diproses' ? 'badge-warning' : 'badge-slate') }} flex-shrink-0">{{ $l['status'] }}</span>
                                </div>
                                <p class="text-sm text-text-secondary mt-2">{{ $l['isi'] }}</p>
                                <div class="flex items-center gap-2 mt-3">
                                    <span class="badge-primary text-[10px]">{{ $l['kategori'] }}</span>
                                    <button class="text-sm text-primary-600 hover:text-primary-700 font-medium ml-auto">Tanggapi</button>
                                </div>
                            </div>
                        </div>
                    </x-ui.card>
                @endforeach
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            <x-ui.card>
                <x-slot:header>
                    <h3 class="text-base font-semibold text-text-primary">Statistik</h3>
                </x-slot:header>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-text-secondary">Total Laporan</span>
                        <span class="text-sm font-semibold text-text-primary">47</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-text-secondary">Selesai</span>
                        <span class="text-sm font-semibold text-emerald-600">32</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-text-secondary">Diproses</span>
                        <span class="text-sm font-semibold text-amber-600">10</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-text-secondary">Menunggu</span>
                        <span class="text-sm font-semibold text-text-muted">5</span>
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <x-slot:header>
                    <h3 class="text-base font-semibold text-text-primary">Kategori</h3>
                </x-slot:header>
                <div class="space-y-3">
                    @php
                        $kategori = [
                            ['name' => 'Infrastruktur', 'count' => 15, 'color' => 'bg-blue-500'],
                            ['name' => 'Kebersihan', 'count' => 12, 'color' => 'bg-emerald-500'],
                            ['name' => 'Keamanan', 'count' => 10, 'color' => 'bg-rose-500'],
                            ['name' => 'Kesehatan', 'count' => 6, 'color' => 'bg-cyan-500'],
                            ['name' => 'Lainnya', 'count' => 4, 'color' => 'bg-slate-400'],
                        ];
                    @endphp
                    @foreach ($kategori as $k)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full {{ $k['color'] }}"></div>
                                <span class="text-sm text-text-secondary">{{ $k['name'] }}</span>
                            </div>
                            <span class="text-sm font-medium text-text-primary">{{ $k['count'] }}</span>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layouts.rt>
