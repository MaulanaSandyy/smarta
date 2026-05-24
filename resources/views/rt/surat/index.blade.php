<x-layouts.rt>
    <x-slot:title>Pengajuan Surat</x-slot:title>
    <x-slot:subtitle>Kelola pengajuan surat warga</x-slot:subtitle>

    {{-- Tabs --}}
    <div class="flex items-center gap-1 mb-6 p-1 bg-surface-tertiary rounded-xl w-fit">
        <button class="px-4 py-2 text-sm font-medium rounded-lg bg-(--surface) text-text-primary shadow-sm">Semua</button>
        <button class="px-4 py-2 text-sm font-medium rounded-lg text-text-secondary hover:text-text-primary">Menunggu</button>
        <button class="px-4 py-2 text-sm font-medium rounded-lg text-text-secondary hover:text-text-primary">Diproses</button>
        <button class="px-4 py-2 text-sm font-medium rounded-lg text-text-secondary hover:text-text-primary">Selesai</button>
    </div>

    <x-ui.card class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-border">
                        <th class="table-header">No. Surat</th>
                        <th class="table-header">Pemohon</th>
                        <th class="table-header">Jenis Surat</th>
                        <th class="table-header">Tanggal</th>
                        <th class="table-header">Status</th>
                        <th class="table-header text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @php
                        $surat = [
                            ['no' => 'SRT/001/V/2026', 'pemohon' => 'Budi Santoso', 'jenis' => 'SK Domisili', 'tgl' => '25/05/2026', 'status' => 'Selesai'],
                            ['no' => 'SRT/002/V/2026', 'pemohon' => 'Siti Rahma', 'jenis' => 'SK Tidak Mampu', 'tgl' => '24/05/2026', 'status' => 'Diproses'],
                            ['no' => 'SRT/003/V/2026', 'pemohon' => 'Ahmad Fauzi', 'jenis' => 'SK Usaha', 'tgl' => '23/05/2026', 'status' => 'Menunggu'],
                            ['no' => 'SRT/004/V/2026', 'pemohon' => 'Rina Wijaya', 'jenis' => 'SK Domisili', 'tgl' => '22/05/2026', 'status' => 'Menunggu'],
                            ['no' => 'SRT/005/V/2026', 'pemohon' => 'Doni Prasetyo', 'jenis' => 'SK Kehilangan', 'tgl' => '21/05/2026', 'status' => 'Selesai'],
                        ];
                    @endphp
                    @foreach ($surat as $s)
                        <tr class="hover:bg-surface-secondary transition-colors">
                            <td class="table-cell font-mono text-xs font-medium text-text-primary">{{ $s['no'] }}</td>
                            <td class="table-cell">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-xs font-semibold">{{ substr($s['pemohon'], 0, 1) }}</div>
                                    <span class="text-text-primary">{{ $s['pemohon'] }}</span>
                                </div>
                            </td>
                            <td class="table-cell">{{ $s['jenis'] }}</td>
                            <td class="table-cell">{{ $s['tgl'] }}</td>
                            <td class="table-cell">
                                @php
                                    $badgeClass = match($s['status']) {
                                        'Selesai' => 'badge-success',
                                        'Diproses' => 'badge-warning',
                                        'Menunggu' => 'badge-slate',
                                        default => 'badge-slate',
                                    };
                                @endphp
                                <span class="{{ $badgeClass }}">{{ $s['status'] }}</span>
                            </td>
                            <td class="table-cell text-right">
                                <button class="btn-ghost btn-sm">Detail</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-ui.card>
</x-layouts.rt>
