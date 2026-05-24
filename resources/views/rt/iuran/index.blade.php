<x-layouts.rt>
    <x-slot:title>Pembayaran Iuran</x-slot:title>
    <x-slot:subtitle>Kelola iuran bulanan warga RT 01</x-slot:subtitle>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-ui.stats-card value="Rp 2.250.000" label="Total Iuran Bulan Ini" iconClass="bg-blue-100 text-blue-600">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="32" label="Warga Lunas" iconClass="bg-emerald-100 text-emerald-600">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="13" label="Belum Lunas" iconClass="bg-amber-100 text-amber-600">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="71%" label="Persentase" iconClass="bg-cyan-100 text-cyan-600">
            <x-slot:icon>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </x-slot:icon>
        </x-ui.stats-card>
    </div>

    {{-- Table --}}
    <x-ui.card class="overflow-hidden">
        <div class="flex items-center justify-between px-6 py-3 border-b border-border">
            <div class="flex items-center gap-2">
                <select class="input text-sm py-1.5 w-auto">
                    <option>Bulan: Mei 2026</option>
                    <option>April 2026</option>
                    <option>Maret 2026</option>
                </select>
            </div>
            <button class="btn-primary btn-sm">Catat Pembayaran</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-border">
                        <th class="table-header">Keluarga</th>
                        <th class="table-header">Jumlah</th>
                        <th class="table-header">Tanggal Bayar</th>
                        <th class="table-header">Metode</th>
                        <th class="table-header">Status</th>
                        <th class="table-header text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @php
                        $iuran = [
                            ['keluarga' => 'Budi Santoso', 'jumlah' => 'Rp 50.000', 'tgl' => '25/05/2026', 'metode' => 'Tunai', 'status' => 'Lunas'],
                            ['keluarga' => 'Siti Rahma', 'jumlah' => 'Rp 50.000', 'tgl' => '24/05/2026', 'metode' => 'Transfer', 'status' => 'Lunas'],
                            ['keluarga' => 'Ahmad Fauzi', 'jumlah' => 'Rp 50.000', 'tgl' => '-', 'metode' => '-', 'status' => 'Belum'],
                            ['keluarga' => 'Rina Wijaya', 'jumlah' => 'Rp 50.000', 'tgl' => '23/05/2026', 'metode' => 'Tunai', 'status' => 'Lunas'],
                            ['keluarga' => 'Doni Prasetyo', 'jumlah' => 'Rp 25.000', 'tgl' => '-', 'metode' => '-', 'status' => 'Belum'],
                            ['keluarga' => 'Desi Ratnasari', 'jumlah' => 'Rp 50.000', 'tgl' => '22/05/2026', 'metode' => 'Transfer', 'status' => 'Lunas'],
                        ];
                    @endphp
                    @foreach ($iuran as $i)
                        <tr class="hover:bg-surface-secondary transition-colors">
                            <td class="table-cell font-medium text-text-primary">{{ $i['keluarga'] }}</td>
                            <td class="table-cell">{{ $i['jumlah'] }}</td>
                            <td class="table-cell">{{ $i['tgl'] }}</td>
                            <td class="table-cell">{{ $i['metode'] }}</td>
                            <td class="table-cell">
                                <span class="{{ $i['status'] === 'Lunas' ? 'badge-success' : 'badge-danger' }}">{{ $i['status'] }}</span>
                            </td>
                            <td class="table-cell text-right">
                                @if ($i['status'] !== 'Lunas')
                                    <button class="btn-primary btn-sm">Bayar</button>
                                @else
                                    <button class="btn-ghost btn-sm">Detail</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-ui.card>
</x-layouts.rt>
