<x-layouts.rt>
    <x-slot:title>Detail Ronda</x-slot:title>
    <x-slot:subtitle>{{ $ronda->nama }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Nama</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $ronda->nama }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider mb-1">Deskripsi</span>
                    <div class="text-text-primary whitespace-pre-line leading-relaxed">{{ $ronda->deskripsi }}</div>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Aktif</span>
                    @if ($ronda->aktif)
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Aktif</span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400">Tidak Aktif</span>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('rt.ronda.edit', $ronda) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('rt.ronda.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
