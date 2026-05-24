<x-layouts.rt>
    <x-slot:title>Dashboard RT</x-slot:title>
    <x-slot:subtitle>Selamat datang kembali, <span x-text="userName">Admin RT 01</span></x-slot:subtitle>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-ui.stats-card
            value="156"
            label="Total Warga"
            iconClass="bg-blue-100 text-blue-600"
            :trend="['positive' => true, 'value' => '+12']">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </x-slot:icon>
        </x-ui.stats-card>

        <x-ui.stats-card
            value="45"
            label="Keluarga"
            iconClass="bg-emerald-100 text-emerald-600"
            :trend="['positive' => true, 'value' => '+3']">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </x-slot:icon>
        </x-ui.stats-card>

        <x-ui.stats-card
            value="Rp 4.2jt"
            label="Saldo Kas RT"
            iconClass="bg-amber-100 text-amber-600"
            :trend="['positive' => true, 'value' => '+Rp 850rb']">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </x-slot:icon>
        </x-ui.stats-card>

        <x-ui.stats-card
            value="12"
            label="Surat Baru"
            iconClass="bg-rose-100 text-rose-600"
            :trend="['positive' => false, 'value' => '-2']">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </x-slot:icon>
        </x-ui.stats-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Aktivitas Terbaru --}}
        <div class="lg:col-span-2">
            <x-ui.card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Aktivitas Terbaru</h3>
                        <a href="#" class="text-sm text-primary-600 hover:text-primary-700 font-medium">Lihat Semua</a>
                    </div>
                </x-slot:header>
                <div class="space-y-4">
                    @php
                        $activities = [
                            ['user' => 'Budi Santoso', 'action' => 'mengajukan surat keterangan domisili', 'time' => '10 menit lalu', 'type' => 'surat'],
                            ['user' => 'Siti Rahma', 'action' => 'melakukan pembayaran iuran bulan Mei', 'time' => '1 jam lalu', 'type' => 'payment'],
                            ['user' => 'Ahmad Fauzi', 'action' => 'melaporkan kehilangan KTP', 'time' => '2 jam lalu', 'type' => 'laporan'],
                            ['user' => 'Rina Wijaya', 'action' => 'mendaftar sebagai warga baru', 'time' => '3 jam lalu', 'type' => 'warga'],
                            ['user' => 'Koordinator Hansip', 'action' => 'mengupdate jadwal ronda mingguan', 'time' => '5 jam lalu', 'type' => 'ronda'],
                        ];
                    @endphp
                    @foreach ($activities as $activity)
                        <div class="flex items-start gap-3 pb-4 {{ !$loop->last ? 'border-b border-border' : '' }}">
                            <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-xs font-semibold flex-shrink-0">
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

        {{-- Pengumuman & Iuran --}}
        <div class="space-y-6">
            {{-- Pengumuman --}}
            <x-ui.card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Pengumuman</h3>
                        <a href="#" class="text-sm text-primary-600 hover:text-primary-700 font-medium">Lihat</a>
                    </div>
                </x-slot:header>
                <div class="space-y-3">
                    @php
                        $announcements = [
                            ['title' => 'Kerja Bakti Minggu Ini', 'date' => '25 Mei 2026', 'badge' => 'Baru'],
                            ['title' => 'Pembayaran Iuran Bulan Juni', 'date' => '20 Mei 2026', 'badge' => 'Penting'],
                            ['title' => 'Pengajian Rutin Malam Jumat', 'date' => '18 Mei 2026', 'badge' => 'Info'],
                        ];
                    @endphp
                    @foreach ($announcements as $announcement)
                        <div class="p-3 rounded-xl bg-surface-secondary hover:bg-surface-tertiary transition-colors cursor-pointer">
                            <div class="flex items-start justify-between gap-2">
                                <div>
                                    <p class="text-sm font-medium text-text-primary">{{ $announcement['title'] }}</p>
                                    <p class="text-xs text-text-muted mt-0.5">{{ $announcement['date'] }}</p>
                                </div>
                                <span class="badge-primary text-[10px] px-2 py-0.5 flex-shrink-0">{{ $announcement['badge'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>

            {{-- Iuran Terbaru --}}
            <x-ui.card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Iuran Terbaru</h3>
                        <span class="badge-success">Lunas 32/45</span>
                    </div>
                </x-slot:header>
                <div class="space-y-2">
                    @php
                        $payments = [
                            ['name' => 'Keluarga Budi', 'amount' => 'Rp 50.000', 'status' => 'Lunas', 'date' => 'Hari ini'],
                            ['name' => 'Keluarga Siti', 'amount' => 'Rp 50.000', 'status' => 'Lunas', 'date' => 'Kemarin'],
                            ['name' => 'Keluarga Agus', 'amount' => 'Rp 50.000', 'status' => 'Pending', 'date' => '2 hari lalu'],
                            ['name' => 'Keluarga Dewi', 'amount' => 'Rp 50.000', 'status' => 'Lunas', 'date' => '3 hari lalu'],
                        ];
                    @endphp
                    @foreach ($payments as $payment)
                        <div class="flex items-center justify-between py-2">
                            <span class="text-sm text-text-primary">{{ $payment['name'] }}</span>
                            <div class="text-right">
                                <p class="text-sm font-medium text-text-primary">{{ $payment['amount'] }}</p>
                                <span class="{{ $payment['status'] === 'Lunas' ? 'badge-success' : 'badge-warning' }} text-[10px]">{{ $payment['status'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layouts.rt>
