<x-layouts.masjid>
    <x-slot:title>Detail Galeri</x-slot:title>
    <x-slot:subtitle>{{ $galeri->judul }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Judul</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $galeri->judul }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tipe</span>
                    <span class="text-text-primary font-medium mt-0.5 block">
                        @if($galeri->tipe == 'foto')
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-700">Foto</span>
                        @elseif($galeri->tipe == 'video')
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-rose-100 text-rose-700">Video</span>
                        @else
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700">Artikel</span>
                        @endif
                    </span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">URL</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $galeri->url ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Deskripsi</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $galeri->deskripsi ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ \Carbon\Carbon::parse($galeri->tanggal)->format('d/m/Y') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Status</span>
                    <span class="text-text-primary font-medium mt-0.5 block">
                        @if($galeri->status == 'draft')
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-amber-100 text-amber-700">Draft</span>
                        @elseif($galeri->status == 'terbit')
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700">Terbit</span>
                        @else
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-gray-100 text-gray-700">Arsip</span>
                        @endif
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('masjid.galeri.edit', $galeri) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('masjid.galeri.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.masjid>
