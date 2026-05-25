<x-layouts.masjid>
    <x-slot:title>Detail Donasi</x-slot:title>
    <x-slot:subtitle>{{ $donasi->donatur ?? 'Anonim' }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Donatur</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $donasi->donatur ?? 'Anonim' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ \Carbon\Carbon::parse($donasi->tanggal)->format('d/m/Y') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Jenis</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $donasi->jenis }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Jumlah</span>
                    <span class="text-text-primary font-medium mt-0.5 block">Rp {{ number_format($donasi->jumlah, 0, ',', '.') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Status</span>
                    <span class="text-text-primary font-medium mt-0.5 block">
                        @if($donasi->status == 'diterima')
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700">Diterima</span>
                        @elseif($donasi->status == 'tertunda')
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-amber-100 text-amber-700">Tertunda</span>
                        @else
                            <span class="inline-block px-2 py-0.5 text-xs font-medium rounded-full bg-blue-100 text-blue-700">Disalurkan</span>
                        @endif
                    </span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Keterangan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $donasi->keterangan ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Bukti</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $donasi->bukti ?? '-' }}</span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('masjid.donasi.edit', $donasi) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('masjid.donasi.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.masjid>
