<x-layouts.masjid>
    <x-slot:title>Inventaris Masjid</x-slot:title>
    <x-slot:subtitle>Kelola aset dan perlengkapan masjid</x-slot:subtitle>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-ui.stats-card value="48" label="Total Aset" iconClass="bg-emerald-100 text-emerald-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="6" label="Perlu Perbaikan" iconClass="bg-amber-100 text-amber-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="Rp 85jt" label="Nilai Aset" iconClass="bg-blue-100 text-blue-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="3" label="Kategori" iconClass="bg-cyan-100 text-cyan-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg></x-slot:icon>
        </x-ui.stats-card>
    </div>

    <x-ui.card class="overflow-hidden">
        <div class="flex items-center justify-between px-6 py-3 border-b border-border">
            <div class="flex items-center gap-2">
                <select class="input text-sm py-1.5 w-auto">
                    <option>Semua Kategori</option>
                    <option>Perabotan</option>
                    <option>Elektronik</option>
                    <option>Bangunan</option>
                </select>
            </div>
            <button class="btn-primary btn-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Aset
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-border">
                        <th class="table-header">Nama Aset</th>
                        <th class="table-header">Kategori</th>
                        <th class="table-header">Jumlah</th>
                        <th class="table-header">Kondisi</th>
                        <th class="table-header">Lokasi</th>
                        <th class="table-header text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @php
                        $aset = [
                            ['name' => 'Sajadah Besar', 'kategori' => 'Perabotan', 'jumlah' => 50, 'kondisi' => 'Baik', 'lokasi' => 'Ruang Utama'],
                            ['name' => 'Mikrofon Wireless', 'kategori' => 'Elektronik', 'jumlah' => 4, 'kondisi' => 'Baik', 'lokasi' => 'Ruang Imam'],
                            ['name' => 'Sound System', 'kategori' => 'Elektronik', 'jumlah' => 2, 'kondisi' => 'Rusak Ringan', 'lokasi' => 'Ruang Utama'],
                            ['name' => 'Lemari Al-Quran', 'kategori' => 'Perabotan', 'jumlah' => 3, 'kondisi' => 'Baik', 'lokasi' => 'Ruang Utama'],
                            ['name' => 'Kipas Angin', 'kategori' => 'Elektronik', 'jumlah' => 8, 'kondisi' => 'Perlu Perbaikan', 'lokasi' => 'Ruang Utama'],
                            ['name' => 'Karpet', 'kategori' => 'Perabotan', 'jumlah' => 20, 'kondisi' => 'Baik', 'lokasi' => 'Ruang Wanita'],
                            ['name' => 'AC', 'kategori' => 'Elektronik', 'jumlah' => 3, 'kondisi' => 'Rusak', 'lokasi' => 'Ruang Utama'],
                            ['name' => 'Rak Buku', 'kategori' => 'Perabotan', 'jumlah' => 5, 'kondisi' => 'Baik', 'lokasi' => 'Perpustakaan'],
                        ];
                    @endphp
                    @foreach ($aset as $a)
                        <tr class="hover:bg-surface-secondary transition-colors">
                            <td class="table-cell font-medium text-text-primary">{{ $a['name'] }}</td>
                            <td class="table-cell"><span class="badge-slate">{{ $a['kategori'] }}</span></td>
                            <td class="table-cell">{{ $a['jumlah'] }}</td>
                            <td class="table-cell">
                                @php
                                    $kondisiClass = match($a['kondisi']) {
                                        'Baik' => 'badge-success',
                                        'Rusak Ringan', 'Perlu Perbaikan' => 'badge-warning',
                                        'Rusak' => 'badge-danger',
                                        default => 'badge-slate',
                                    };
                                @endphp
                                <span class="{{ $kondisiClass }}">{{ $a['kondisi'] }}</span>
                            </td>
                            <td class="table-cell">{{ $a['lokasi'] }}</td>
                            <td class="table-cell text-right">
                                <button class="btn-ghost btn-sm">Detail</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-ui.card>
</x-layouts.masjid>
