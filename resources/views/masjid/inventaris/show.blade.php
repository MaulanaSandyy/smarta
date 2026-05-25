<x-layouts.masjid>
    <x-slot:title>Detail Inventaris</x-slot:title>
    <x-slot:subtitle>{{ $inventarisMasjid->nama }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Nama</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $inventarisMasjid->nama }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kategori</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $inventarisMasjid->kategori }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Jumlah</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $inventarisMasjid->jumlah }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kondisi</span>
                    <span class="text-text-primary font-medium mt-0.5 block">
                        @if($inventarisMasjid->kondisi == 'baik')
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700">Baik</span>
                        @elseif($inventarisMasjid->kondisi == 'rusak_ringan')
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-amber-100 text-amber-700">Rusak Ringan</span>
                        @elseif($inventarisMasjid->kondisi == 'rusak_berat')
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-rose-100 text-rose-700">Rusak Berat</span>
                        @else
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-700">Perbaikan</span>
                        @endif
                    </span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Lokasi</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $inventarisMasjid->lokasi ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Nilai</span>
                    <span class="text-text-primary font-medium mt-0.5 block">Rp {{ number_format($inventarisMasjid->nilai, 0, ',', '.') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Keterangan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $inventarisMasjid->keterangan ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Foto</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $inventarisMasjid->foto ?? '-' }}</span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('masjid.inventaris.edit', $inventarisMasjid) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('masjid.inventaris.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.masjid>
