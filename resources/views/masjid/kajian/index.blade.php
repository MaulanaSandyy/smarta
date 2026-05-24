<x-layouts.masjid>
    <x-slot:title>Jadwal Kajian & Sholat</x-slot:title>
    <x-slot:subtitle>Kelola jadwal imam, khatib, dan kajian rutin</x-slot:subtitle>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-base font-semibold text-text-primary">Jadwal Kajian</h3>
                <button class="btn-primary btn-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Kajian
                </button>
            </div>

            <div class="space-y-4">
                @php
                    $kajian = [
                        ['hari' => 'Senin', 'judul' => 'Tafsir Al-Quran', 'waktu' => 'Ba\'da Maghrib', 'pemateri' => 'Ustadz Abdurrahman', 'tempat' => 'Ruang Utama', 'badge' => 'Rutin', 'badgeClass' => 'badge-success'],
                        ['hari' => 'Selasa', 'judul' => 'Fiqih Ibadah', 'waktu' => 'Ba\'da Subuh', 'pemateri' => 'Ustadz Hafidz', 'tempat' => 'Ruang Utama', 'badge' => 'Rutin', 'badgeClass' => 'badge-success'],
                        ['hari' => 'Rabu', 'judul' => 'Kajian Remaja', 'waktu' => '16:00 - 17:30', 'pemateri' => 'Ustadz Fauzi', 'tempat' => 'Aula', 'badge' => 'Remaja', 'badgeClass' => 'badge-primary'],
                        ['hari' => 'Kamis', 'judul' => 'Tahsin & Tahfidz', 'waktu' => 'Ba\'da Maghrib', 'pemateri' => 'Ustadzah Aminah', 'tempat' => 'Ruang Wanita', 'badge' => 'Rutin', 'badgeClass' => 'badge-success'],
                        ['hari' => 'Jumat', 'judul' => 'Khotbah Jumat', 'waktu' => '12:00', 'pemateri' => 'Bergilir', 'tempat' => 'Ruang Utama', 'badge' => 'Khatib', 'badgeClass' => 'badge-warning'],
                        ['hari' => 'Sabtu', 'judul' => 'Kajian Ahad Pagi', 'waktu' => '06:00 - 08:00', 'pemateri' => 'Ustadz Abdurrahman', 'tempat' => 'Ruang Utama', 'badge' => 'Mingguan', 'badgeClass' => 'badge-primary'],
                        ['hari' => 'Minggu', 'judul' => 'Pengajian Akbar', 'waktu' => '07:00 - 09:00', 'pemateri' => 'Ustadz Tamu', 'tempat' => 'Halaman Masjid', 'badge' => 'Bulanan', 'badgeClass' => 'badge-warning'],
                    ];
                @endphp
                @foreach ($kajian as $k)
                    <x-ui.card>
                        <div class="flex items-start gap-4">
                            <div class="min-w-[60px] text-center">
                                <p class="text-xs font-semibold text-text-muted uppercase">{{ substr($k['hari'], 0, 3) }}</p>
                                <div class="w-px h-8 bg-border mx-auto mt-2"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <h3 class="text-sm font-semibold text-text-primary">{{ $k['judul'] }}</h3>
                                        <div class="flex items-center gap-3 mt-1 text-xs text-text-muted">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                {{ $k['waktu'] }}
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                                {{ $k['pemateri'] }}
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                {{ $k['tempat'] }}
                                            </span>
                                        </div>
                                    </div>
                                    <span class="{{ $k['badgeClass'] }}">{{ $k['badge'] }}</span>
                                </div>
                            </div>
                        </div>
                    </x-ui.card>
                @endforeach
            </div>
        </div>

        <div class="space-y-6">
            <x-ui.card>
                <x-slot:header>
                    <h3 class="text-base font-semibold text-text-primary">Jadwal Sholat Hari Ini</h3>
                </x-slot:header>
                <div class="space-y-3">
                    @php
                        $sholat = [
                            ['name' => 'Subuh', 'time' => '04:30', 'imam' => 'Ustadz Hafidz'],
                            ['name' => 'Dzuhur', 'time' => '11:55', 'imam' => 'H. Ahmad'],
                            ['name' => 'Ashar', 'time' => '15:10', 'imam' => 'Ustadz Abdurrahman'],
                            ['name' => 'Maghrib', 'time' => '17:45', 'imam' => 'Ustadz Fauzi'],
                            ['name' => 'Isya', 'time' => '19:00', 'imam' => 'H. Ahmad'],
                        ];
                    @endphp
                    @foreach ($sholat as $s)
                        <div class="flex items-center justify-between py-2 {{ !$loop->last ? 'border-b border-border' : '' }}">
                            <div>
                                <p class="text-sm font-medium text-text-primary">{{ $s['name'] }}</p>
                                <p class="text-xs text-text-muted">Imam: {{ $s['imam'] }}</p>
                            </div>
                            <span class="text-lg font-bold text-emerald-600">{{ $s['time'] }}</span>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>

            <x-ui.card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Jadwal Khatib</h3>
                        <button class="btn-secondary btn-sm">Atur</button>
                    </div>
                </x-slot:header>
                <div class="space-y-2">
                    @php
                        $khatib = [
                            ['tgl' => '26 Mei', 'khatib' => 'Ustadz Abdurrahman', 'tema' => 'Keutamaan Sholat Berjamaah'],
                            ['tgl' => '2 Juni', 'khatib' => 'Ustadz Hafidz', 'tema' => 'Pentingnya Sedekah'],
                            ['tgl' => '9 Juni', 'khatib' => 'Ustadz Tamu', 'tema' => 'TBD'],
                        ];
                    @endphp
                    @foreach ($khatib as $k)
                        <div class="p-3 rounded-xl bg-surface-secondary">
                            <div class="flex items-center justify-between">
                                <span class="badge-slate text-[10px]">{{ $k['tgl'] }}</span>
                                <span class="badge-primary text-[10px]">Jumat</span>
                            </div>
                            <p class="text-sm font-medium text-text-primary mt-2">{{ $k['khatib'] }}</p>
                            <p class="text-xs text-text-muted mt-0.5">{{ $k['tema'] }}</p>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layouts.masjid>
