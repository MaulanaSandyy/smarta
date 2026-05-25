<x-layouts.rt>
    <x-slot:title>Detail Pengajuan Surat</x-slot:title>
    <x-slot:subtitle>{{ $pengajuanSurat->jenis_surat }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Warga ID</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $pengajuanSurat->warga_id }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Jenis Surat</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $pengajuanSurat->jenis_surat }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Nomor Surat</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $pengajuanSurat->nomor_surat ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Keperluan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $pengajuanSurat->keperluan }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Keterangan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $pengajuanSurat->keterangan ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Status</span>
                    @php
                        $statusSuratClasses = [
                            'pending' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
                            'disetujui' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
                            'ditolak' => 'bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400',
                            'selesai' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                        ];
                        $class = $statusSuratClasses[$pengajuanSurat->status] ?? 'bg-gray-100 text-gray-700';
                    @endphp
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $class }}">
                        {{ ucfirst($pengajuanSurat->status) }}
                    </span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Catatan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $pengajuanSurat->catatan ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal Pengajuan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $pengajuanSurat->tanggal ? \Carbon\Carbon::parse($pengajuanSurat->tanggal)->format('d/m/Y') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal Selesai</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $pengajuanSurat->tanggal_selesai ? \Carbon\Carbon::parse($pengajuanSurat->tanggal_selesai)->format('d/m/Y') : '-' }}</span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('rt.surat.edit', $pengajuanSurat) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('rt.surat.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
