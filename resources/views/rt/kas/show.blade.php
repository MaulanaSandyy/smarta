<x-layouts.rt>
    <x-slot:title>Detail Transaksi</x-slot:title>
    <x-slot:subtitle>Transaksi #{{ $kas->id }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tipe</span>
                    @if ($kas->tipe == 'pemasukan')
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Pemasukan</span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400">Pengeluaran</span>
                    @endif
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Warga ID</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kas->warga_id ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Jumlah</span>
                    <span class="text-text-primary font-medium mt-0.5 block">Rp {{ number_format($kas->jumlah, 0, ',', '.') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kategori</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kas->kategori ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider mb-1">Keterangan</span>
                    <div class="text-text-primary whitespace-pre-line leading-relaxed">{{ $kas->keterangan }}</div>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kas->tanggal ? \Carbon\Carbon::parse($kas->tanggal)->format('d/m/Y') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Bukti</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kas->bukti ?? '-' }}</span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('rt.kas.edit', $kas) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('rt.kas.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
