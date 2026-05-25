<x-layouts.rt>
    <x-slot:title>Detail Warga</x-slot:title>
    <x-slot:subtitle>{{ $warga->nama }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">NIK</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->nik }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">KK</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->kk }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Nama</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->nama }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tempat/Tgl Lahir</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->tempat_lahir }}, {{ $warga->tanggal_lahir ? \Carbon\Carbon::parse($warga->tanggal_lahir)->format('d/m/Y') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Jenis Kelamin</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Alamat</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->alamat }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">RT/RW</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->rt }}/{{ $warga->rw }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kelurahan/Kec</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->kelurahan }}, {{ $warga->kecamatan }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kota/Prov</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->kota }}, {{ $warga->provinsi }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Agama</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->agama }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Pekerjaan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->pekerjaan }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Pendidikan</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->pendidikan }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Status Warga</span>
                    @php
                        $statusWargaClasses = [
                            'tetap' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                            'kontrakan' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
                            'kos' => 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400',
                        ];
                        $class = $statusWargaClasses[$warga->status_warga] ?? 'bg-gray-100 text-gray-700';
                    @endphp
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $class }}">
                        {{ ucfirst($warga->status_warga) }}
                    </span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Status Keluarga</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->status_keluarga }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Telepon</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->telepon ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Email</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $warga->email ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Aktif</span>
                    @if ($warga->aktif)
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Aktif</span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400">Tidak Aktif</span>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('rt.data-warga.edit', $warga) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('rt.data-warga.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
