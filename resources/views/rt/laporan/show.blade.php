<x-layouts.rt>
    <x-slot:title>Detail Laporan</x-slot:title>
    <x-slot:subtitle>{{ $laporan->judul }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Warga ID</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $laporan->warga_id }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Judul</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $laporan->judul }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider mb-1">Isi</span>
                    <div class="text-text-primary whitespace-pre-line leading-relaxed">{{ $laporan->isi }}</div>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kategori</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $laporan->kategori }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Status</span>
                    @php
                        $statusLaporanClasses = [
                            'menunggu' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
                            'diproses' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                            'selesai' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
                            'ditolak' => 'bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400',
                        ];
                        $class = $statusLaporanClasses[$laporan->status] ?? 'bg-gray-100 text-gray-700';
                    @endphp
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $class }}">
                        {{ ucfirst($laporan->status) }}
                    </span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider mb-1">Tanggapan</span>
                    <div class="text-text-primary whitespace-pre-line leading-relaxed">{{ $laporan->tanggapan ?? '-' }}</div>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal Laporan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $laporan->tanggal ? \Carbon\Carbon::parse($laporan->tanggal)->format('d/m/Y') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal Ditanggapi</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $laporan->tanggal_ditanggapi ? \Carbon\Carbon::parse($laporan->tanggal_ditanggapi)->format('d/m/Y') : '-' }}</span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('rt.laporan.edit', $laporan) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('rt.laporan.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
