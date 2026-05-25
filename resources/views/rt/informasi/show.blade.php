<x-layouts.rt>
    <x-slot:title>Detail Informasi</x-slot:title>
    <x-slot:subtitle>{{ $informasi->judul }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Judul</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $informasi->judul }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider mb-1">Isi</span>
                    <div class="text-text-primary whitespace-pre-line leading-relaxed">{{ $informasi->isi }}</div>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kategori</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $informasi->kategori }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Penting</span>
                    @if ($informasi->penting)
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400">Penting</span>
                    @endif
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Diterbitkan</span>
                    @if ($informasi->diterbitkan)
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Ya</span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-700 dark:bg-gray-900/30 dark:text-gray-400">Tidak</span>
                    @endif
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal Terbit</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $informasi->tanggal_terbit ? \Carbon\Carbon::parse($informasi->tanggal_terbit)->format('d/m/Y') : '-' }}</span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('rt.informasi.edit', $informasi) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('rt.informasi.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
