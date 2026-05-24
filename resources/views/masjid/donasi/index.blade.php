<x-layouts.masjid>
    <x-slot:title>Donasi & Zakat</x-slot:title>
    <x-slot:subtitle>Kelola donasi, infaq, sedekah, dan zakat</x-slot:subtitle>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-ui.stats-card value="Rp 4.5jt" label="Total Donasi" iconClass="bg-emerald-100 text-emerald-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="Rp 1.5jt" label="Zakat Terkumpul" iconClass="bg-amber-100 text-amber-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="45" label="Donatur Aktif" iconClass="bg-blue-100 text-blue-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="12" label="Mustahik" iconClass="bg-cyan-100 text-cyan-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg></x-slot:icon>
        </x-ui.stats-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <x-ui.card class="overflow-hidden">
                <div class="flex items-center justify-between px-6 py-3 border-b border-border">
                    <h3 class="text-base font-semibold text-text-primary">Riwayat Donasi</h3>
                    <div class="flex items-center gap-2">
                        <select class="input text-sm py-1.5 w-auto">
                            <option>Semua</option>
                            <option>Infaq</option>
                            <option>Sedekah</option>
                            <option>Zakat</option>
                            <option>Donasi</option>
                        </select>
                        <button class="btn-primary btn-sm">Catat Donasi</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-border">
                                <th class="table-header">Tanggal</th>
                                <th class="table-header">Donatur</th>
                                <th class="table-header">Jenis</th>
                                <th class="table-header">Jumlah</th>
                                <th class="table-header">Status</th>
                                <th class="table-header text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-border">
                            @php
                                $donasi = [
                                    ['tgl' => '25/05/2026', 'donatur' => 'H. Ahmad', 'jenis' => 'Donasi Pembangunan', 'jumlah' => 'Rp 2.000.000', 'status' => 'Terkonfirmasi'],
                                    ['tgl' => '24/05/2026', 'donatur' => 'Ibu Siti', 'jenis' => 'Sedekah', 'jumlah' => 'Rp 500.000', 'status' => 'Terkonfirmasi'],
                                    ['tgl' => '23/05/2026', 'donatur' => 'Pak Budi', 'jenis' => 'Zakat Mal', 'jumlah' => 'Rp 1.000.000', 'status' => 'Menunggu'],
                                    ['tgl' => '22/05/2026', 'donatur' => 'Anonim', 'jenis' => 'Infaq', 'jumlah' => 'Rp 250.000', 'status' => 'Terkonfirmasi'],
                                    ['tgl' => '21/05/2026', 'donatur' => 'Bpk. Hasan', 'jenis' => 'Zakat Fitrah', 'jumlah' => 'Rp 450.000', 'status' => 'Terkonfirmasi'],
                                    ['tgl' => '20/05/2026', 'donatur' => 'Ibu Dewi', 'jenis' => 'Infaq', 'jumlah' => 'Rp 300.000', 'status' => 'Terkonfirmasi'],
                                ];
                            @endphp
                            @foreach ($donasi as $d)
                                <tr class="hover:bg-surface-secondary transition-colors">
                                    <td class="table-cell text-xs">{{ $d['tgl'] }}</td>
                                    <td class="table-cell font-medium text-text-primary">{{ $d['donatur'] }}</td>
                                    <td class="table-cell"><span class="badge-slate">{{ $d['jenis'] }}</span></td>
                                    <td class="table-cell font-semibold text-emerald-600">{{ $d['jumlah'] }}</td>
                                    <td class="table-cell">
                                        <span class="{{ $d['status'] === 'Terkonfirmasi' ? 'badge-success' : 'badge-warning' }}">{{ $d['status'] }}</span>
                                    </td>
                                    <td class="table-cell text-right">
                                        <button class="btn-ghost btn-sm">Detail</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-ui.card>
        </div>

        <div class="space-y-6">
            <x-ui.card>
                <x-slot:header>
                    <h3 class="text-base font-semibold text-text-primary">Rekening Donasi</h3>
                </x-slot:header>
                <div class="space-y-4">
                    <div class="p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-800">
                        <p class="text-xs text-emerald-600 dark:text-emerald-400 font-medium mb-1">Bank Syariah Indonesia</p>
                        <p class="text-lg font-bold text-emerald-800 dark:text-emerald-200">7123 4567 8901</p>
                        <p class="text-xs text-emerald-600 dark:text-emerald-400">a.n. DKM Masjid Al-Barakah</p>
                    </div>
                    <div class="p-4 rounded-xl bg-amber-50 dark:bg-amber-950/30 border border-amber-200 dark:border-amber-800">
                        <p class="text-xs text-amber-600 dark:text-amber-400 font-medium mb-1">Bank Mandiri</p>
                        <p class="text-lg font-bold text-amber-800 dark:text-amber-200">1230 9876 5432</p>
                        <p class="text-xs text-amber-600 dark:text-amber-400">a.n. DKM Masjid Al-Barakah</p>
                    </div>
                </div>
            </x-ui.card>

            <x-ui.card>
                <x-slot:header>
                    <h3 class="text-base font-semibold text-text-primary">Distribusi Zakat</h3>
                </x-slot:header>
                <div class="space-y-3">
                    @php
                        $distribusi = [
                            ['name' => 'Fakir', 'total' => 'Rp 450.000', 'pct' => '30%'],
                            ['name' => 'Miskin', 'total' => 'Rp 350.000', 'pct' => '23%'],
                            ['name' => 'Amil', 'total' => 'Rp 150.000', 'pct' => '10%'],
                            ['name' => 'Mualaf', 'total' => 'Rp 200.000', 'pct' => '13%'],
                            ['name' => 'Lainnya', 'total' => 'Rp 350.000', 'pct' => '23%'],
                        ];
                    @endphp
                    @foreach ($distribusi as $d)
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-text-secondary">{{ $d['name'] }}</span>
                            <div class="text-right">
                                <span class="text-sm font-medium text-text-primary">{{ $d['total'] }}</span>
                                <span class="text-xs text-text-muted ml-2">({{ $d['pct'] }})</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-ui.card>
        </div>
    </div>
</x-layouts.masjid>
