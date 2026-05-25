<x-layouts.masjid>
    <x-slot:title>Detail Kajian</x-slot:title>
    <x-slot:subtitle>{{ $kajian->judul }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Judul</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kajian->judul }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Hari</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kajian->hari }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Waktu</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ \Carbon\Carbon::parse($kajian->waktu)->format('H:i') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Pemateri</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kajian->pemateri }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tempat</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kajian->tempat }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kategori</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kajian->kategori }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Deskripsi</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $kajian->deskripsi ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Aktif</span>
                    <span class="text-text-primary font-medium mt-0.5 block">
                        @if($kajian->aktif)
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700">Aktif</span>
                        @else
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-rose-100 text-rose-700">Tidak Aktif</span>
                        @endif
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('masjid.kajian.edit', $kajian) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('masjid.kajian.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.masjid>
