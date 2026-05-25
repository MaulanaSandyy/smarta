<x-layouts.rt>
    <x-slot:title>Detail Iuran</x-slot:title>
    <x-slot:subtitle>{{ $iuran->nama }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Nama</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $iuran->nama }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Jumlah</span>
                    <span class="text-text-primary font-medium mt-0.5 block">Rp {{ number_format($iuran->jumlah, 0, ',', '.') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Periode</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $iuran->periode }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Keterangan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $iuran->keterangan ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Aktif</span>
                    @if ($iuran->aktif)
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Aktif</span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400">Tidak Aktif</span>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('rt.iuran.edit', $iuran) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('rt.iuran.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
