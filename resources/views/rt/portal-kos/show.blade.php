<x-layouts.rt>
    <x-slot:title>Detail Penghuni Kos</x-slot:title>
    <x-slot:subtitle>{{ $portalKo->nama }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Nama</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $portalKo->nama }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">NIK</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $portalKo->nik ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Telepon</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $portalKo->telepon ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Alamat Kos</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $portalKo->alamat_kos ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Pemilik</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $portalKo->pemilik ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kontak Pemilik</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $portalKo->kontak_pemilik ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal Masuk</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $portalKo->tanggal_masuk ? \Carbon\Carbon::parse($portalKo->tanggal_masuk)->format('d/m/Y') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal Keluar</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $portalKo->tanggal_keluar ? \Carbon\Carbon::parse($portalKo->tanggal_keluar)->format('d/m/Y') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Biaya Sewa</span>
                    <span class="text-text-primary font-medium mt-0.5 block">Rp {{ number_format($portalKo->biaya_sewa, 0, ',', '.') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider mb-1">Catatan</span>
                    <div class="text-text-primary whitespace-pre-line leading-relaxed">{{ $portalKo->catatan }}</div>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Aktif</span>
                    @if ($portalKo->aktif)
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Aktif</span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400">Tidak Aktif</span>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('rt.portal-kos.edit', $portalKo) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('rt.portal-kos.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
