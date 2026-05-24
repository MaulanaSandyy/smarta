<x-layouts.masjid>
    <x-slot:title>Keuangan Masjid</x-slot:title>
    <x-slot:subtitle>Transparansi keuangan dan kas masjid</x-slot:subtitle>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <x-ui.card>
            <p class="text-sm text-text-muted mb-1">Saldo Kas Masjid</p>
            <p class="text-3xl font-bold text-text-primary">Rp 12.850.000</p>
            <p class="text-xs text-emerald-600 mt-1">+Rp 2.300.000 bulan ini</p>
        </x-ui.card>
        <x-ui.card>
            <p class="text-sm text-text-muted mb-1">Total Pemasukan</p>
            <p class="text-3xl font-bold text-emerald-600">Rp 4.750.000</p>
            <p class="text-xs text-text-muted mt-1">Bulan Mei 2026</p>
        </x-ui.card>
        <x-ui.card>
            <p class="text-sm text-text-muted mb-1">Total Pengeluaran</p>
            <p class="text-3xl font-bold text-rose-600">Rp 2.450.000</p>
            <p class="text-xs text-text-muted mt-1">Bulan Mei 2026</p>
        </x-ui.card>
    </div>

    <x-ui.card class="overflow-hidden">
        <div class="flex items-center justify-between px-6 py-3 border-b border-border">
            <h3 class="text-base font-semibold text-text-primary">Riwayat Transaksi</h3>
            <div class="flex items-center gap-2">
                <button class="btn-secondary btn-sm">Cetak Laporan</button>
                <button class="btn-primary btn-sm">Tambah Transaksi</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-border">
                        <th class="table-header">Tanggal</th>
                        <th class="table-header">Keterangan</th>
                        <th class="table-header">Kategori</th>
                        <th class="table-header text-right">Pemasukan</th>
                        <th class="table-header text-right">Pengeluaran</th>
                        <th class="table-header">Bukti</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @php
                        $transaksi = [
                            ['tgl' => '25/05/2026', 'ket' => 'Infaq Jumat', 'kategori' => 'Infaq', 'masuk' => '1.250.000', 'keluar' => '-', 'bukti' => true],
                            ['tgl' => '24/05/2026', 'ket' => 'Pembelian sajadah baru', 'kategori' => 'Perlengkapan', 'masuk' => '-', 'keluar' => '850.000', 'bukti' => true],
                            ['tgl' => '23/05/2026', 'ket' => 'Donasi pembangunan', 'kategori' => 'Donasi', 'masuk' => '2.000.000', 'keluar' => '-', 'bukti' => true],
                            ['tgl' => '22/05/2026', 'ket' => 'Listrik dan air', 'kategori' => 'Operasional', 'masuk' => '-', 'keluar' => '600.000', 'bukti' => true],
                            ['tgl' => '21/05/2026', 'ket' => 'Zakat fitrah', 'kategori' => 'Zakat', 'masuk' => '1.500.000', 'keluar' => '-', 'bukti' => true],
                            ['tgl' => '20/05/2026', 'ket' => 'Konsumsi kajian', 'kategori' => 'Konsumsi', 'masuk' => '-', 'keluar' => '350.000', 'bukti' => true],
                            ['tgl' => '19/05/2026', 'ket' => 'Kotak amal Jumat', 'kategori' => 'Infaq', 'masuk' => '980.000', 'keluar' => '-', 'bukti' => false],
                            ['tgl' => '18/05/2026', 'ket' => 'Perbaikan kubah', 'kategori' => 'Perbaikan', 'masuk' => '-', 'keluar' => '2.500.000', 'bukti' => true],
                        ];
                    @endphp
                    @foreach ($transaksi as $t)
                        <tr class="hover:bg-surface-secondary transition-colors">
                            <td class="table-cell text-xs">{{ $t['tgl'] }}</td>
                            <td class="table-cell font-medium text-text-primary">{{ $t['ket'] }}</td>
                            <td class="table-cell"><span class="badge-slate">{{ $t['kategori'] }}</span></td>
                            <td class="table-cell text-right font-medium text-emerald-600">{{ $t['masuk'] !== '-' ? 'Rp ' . $t['masuk'] : '-' }}</td>
                            <td class="table-cell text-right font-medium text-rose-600">{{ $t['keluar'] !== '-' ? 'Rp ' . $t['keluar'] : '-' }}</td>
                            <td class="table-cell">
                                @if ($t['bukti'])
                                    <button class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">Lihat</button>
                                @else
                                    <span class="text-text-muted text-xs">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-ui.card>
</x-layouts.masjid>
