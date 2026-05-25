<x-layouts.masjid>
    <x-slot:title>Dashboard Masjid</x-slot:title>
    <x-slot:subtitle>Selamat datang kembali, <span x-text="userName">Admin</span></x-slot:subtitle>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-ui.stats-card value="320" label="Total Jamaah" iconClass="bg-emerald-100 text-emerald-600" :trend="['positive' => true, 'value' => '+15']">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="Rp 12.8jt" label="Saldo Kas Masjid" iconClass="bg-blue-100 text-blue-600" :trend="['positive' => true, 'value' => '+Rp 2.3jt']">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="Rp 4.5jt" label="Donasi Bulan Ini" iconClass="bg-amber-100 text-amber-600" :trend="['positive' => true, 'value' => '+Rp 850rb']">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="12" label="Kajian Bulan Ini" iconClass="bg-cyan-100 text-cyan-600" :trend="['positive' => false, 'value' => '-2']">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></x-slot:icon>
        </x-ui.stats-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <x-ui.card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Aktivitas Terbaru</h3>
                        <button @click="window['modal-aktivitas'].open()" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium transition-colors">Lihat Semua</button>
                    </div>
                </x-slot:header>
                <div class="space-y-4">
                    @php
                        $activities = [
                            ['user' => 'H. Ahmad', 'action' => 'melakukan donasi untuk pembangunan', 'time' => '15 menit lalu', 'type' => 'donasi'],
                            ['user' => 'Ustadz Abdurrahman', 'action' => 'mengkonfirmasi jadwal kajian Ahad', 'time' => '1 jam lalu', 'type' => 'kajian'],
                            ['user' => 'Bendahara Masjid', 'action' => 'mencatat pemasukan infaq Jumat', 'time' => '2 jam lalu', 'type' => 'keuangan'],
                            ['user' => 'Ketua DKM', 'action' => 'menambahkan inventaris baru', 'time' => '4 jam lalu', 'type' => 'inventaris'],
                            ['user' => 'Fotografer', 'action' => 'mengunggah 15 foto kegiatan', 'time' => '6 jam lalu', 'type' => 'galeri'],
                        ];
                    @endphp
                    @foreach ($activities as $activity)
                        <div class="flex items-start gap-3 pb-4 {{ !$loop->last ? 'border-b border-border' : '' }}">
                            <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-semibold flex-shrink-0">
                                {{ substr($activity['user'], 0, 1) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-text-primary">
                                    <span class="font-medium">{{ $activity['user'] }}</span>
                                    <span class="text-text-secondary"> {{ $activity['action'] }}</span>
                                </p>
                                <p class="text-xs text-text-muted mt-0.5">{{ $activity['time'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        </div>

        <div class="space-y-6">
            <x-ui.card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Jadwal Sholat</h3>
                        <span class="badge-success">Hari Ini</span>
                    </div>
                </x-slot:header>
                <div class="space-y-2">
                    @php
                        $jadwalSholat = [
                            ['name' => 'Subuh', 'time' => '04:30', 'remaining' => 'Sudah'],
                            ['name' => 'Dzuhur', 'time' => '11:55', 'remaining' => '-'],
                            ['name' => 'Ashar', 'time' => '15:10', 'remaining' => '-'],
                            ['name' => 'Maghrib', 'time' => '17:45', 'remaining' => '-'],
                            ['name' => 'Isya', 'time' => '19:00', 'remaining' => '-'],
                        ];
                    @endphp
                    @foreach ($jadwalSholat as $s)
                        <div class="flex items-center justify-between py-2 {{ !$loop->last ? 'border-b border-border' : '' }}">
                            <span class="text-sm font-medium text-text-primary">{{ $s['name'] }}</span>
                            <div class="text-right">
                                <span class="text-sm text-text-primary">{{ $s['time'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>

            <x-ui.card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Donasi Terbaru</h3>
                        <span class="badge-primary">Hari Ini</span>
                    </div>
                </x-slot:header>
                <div class="space-y-2">
                    @php
                        $donasi = [
                            ['name' => 'H. Ahmad', 'amount' => 'Rp 2.000.000', 'type' => 'Infaq'],
                            ['name' => 'Ibu Siti', 'amount' => 'Rp 500.000', 'type' => 'Sedekah'],
                            ['name' => 'Pak Budi', 'amount' => 'Rp 1.000.000', 'type' => 'Zakat'],
                            ['name' => 'Anonim', 'amount' => 'Rp 250.000', 'type' => 'Infaq'],
                        ];
                    @endphp
                    @foreach ($donasi as $d)
                        <div class="flex items-center justify-between py-2">
                            <div>
                                <p class="text-sm font-medium text-text-primary">{{ $d['name'] }}</p>
                                <span class="badge-slate text-[10px]">{{ $d['type'] }}</span>
                            </div>
                            <span class="text-sm font-semibold text-emerald-600">{{ $d['amount'] }}</span>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        </div>
    </div>

    {{-- Modal Aktivitas --}}
    <x-ui.modal name="aktivitas" header="Semua Aktivitas">
        <div class="space-y-4">
            @php
                $allActivities = array_merge($activities, [
                    ['user' => 'Doni Prasetyo', 'action' => 'melakukan donasi untuk pembangunan', 'time' => '8 jam lalu', 'type' => 'donasi'],
                    ['user' => 'Ibu Siti', 'action' => 'mencatat infaq Jumat', 'time' => '10 jam lalu', 'type' => 'keuangan'],
                    ['user' => 'Ketua DKM', 'action' => 'mengesahkan laporan keuangan', 'time' => '1 hari lalu', 'type' => 'keuangan'],
                    ['user' => 'Marbot', 'action' => 'menambahkan inventaris baru', 'time' => '1 hari lalu', 'type' => 'inventaris'],
                    ['user' => 'Fotografer', 'action' => 'mengunggah 20 foto kegiatan', 'time' => '2 hari lalu', 'type' => 'galeri'],
                    ['user' => 'Ustadz Hafidz', 'action' => 'mengkonfirmasi jadwal kajian', 'time' => '2 hari lalu', 'type' => 'kajian'],
                    ['user' => 'Bendahara', 'action' => 'mendistribusikan zakat', 'time' => '3 hari lalu', 'type' => 'donasi'],
                ]);
            @endphp
            @foreach ($allActivities as $activity)
                <div class="flex items-start gap-3 pb-4 {{ !$loop->last ? 'border-b border-border' : '' }}">
                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-semibold flex-shrink-0">
                        {{ substr($activity['user'], 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-text-primary">
                            <span class="font-medium">{{ $activity['user'] }}</span>
                            <span class="text-text-secondary"> {{ $activity['action'] }}</span>
                        </p>
                        <p class="text-xs text-text-muted mt-0.5">{{ $activity['time'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-ui.modal>
</x-layouts.masjid>
