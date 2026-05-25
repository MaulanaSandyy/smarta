<x-layouts.rt>
    <x-slot:title>Detail Event</x-slot:title>
    <x-slot:subtitle>{{ $kalenderEvent->judul }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Judul</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kalenderEvent->judul }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kalenderEvent->tanggal ? \Carbon\Carbon::parse($kalenderEvent->tanggal)->format('d/m/Y') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Waktu</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kalenderEvent->waktu ? \Carbon\Carbon::parse($kalenderEvent->waktu)->format('H:i') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Lokasi</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kalenderEvent->lokasi ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kategori</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kalenderEvent->kategori }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider mb-1">Deskripsi</span>
                    <div class="text-text-primary whitespace-pre-line leading-relaxed">{{ $kalenderEvent->deskripsi }}</div>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Warna</span>
                    <span class="inline-flex items-center gap-2 mt-0.5">
                        <span class="inline-block w-5 h-5 rounded-full" style="background-color: {{ $kalenderEvent->warna }}"></span>
                        <span class="text-text-primary font-medium">{{ $kalenderEvent->warna }}</span>
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('rt.kalender.edit', $kalenderEvent) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('rt.kalender.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
