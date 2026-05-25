<x-layouts.masjid>
    <x-slot:title>Detail Transaksi</x-slot:title>
    <x-slot:subtitle>Transaksi keuangan</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tipe</span>
                    <span class="text-text-primary font-medium mt-0.5 block">
                        @if($keuanganMasjid->tipe == 'pemasukan')
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700">Pemasukan</span>
                        @else
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-rose-100 text-rose-700">Pengeluaran</span>
                        @endif
                    </span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Jumlah</span>
                    <span class="text-text-primary font-medium mt-0.5 block">Rp {{ number_format($keuanganMasjid->jumlah, 0, ',', '.') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kategori</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $keuanganMasjid->kategori }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Keterangan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $keuanganMasjid->keterangan ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ \Carbon\Carbon::parse($keuanganMasjid->tanggal)->format('d/m/Y') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Bukti</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $keuanganMasjid->bukti ?? '-' }}</span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('masjid.keuangan.edit', $keuanganMasjid) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('masjid.keuangan.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.masjid>
