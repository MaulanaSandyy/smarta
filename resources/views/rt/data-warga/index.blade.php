<x-layouts.rt>
    <x-slot:title>Data Warga</x-slot:title>
    <x-slot:subtitle>Kelola data warga RT 01</x-slot:subtitle>

    {{-- Actions --}}
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3 flex-1 max-w-md">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" placeholder="Cari warga..." class="input pl-10">
            </div>
        </div>
        <div class="flex items-center gap-2">
            <button class="btn-secondary btn-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Export
            </button>
            <button class="btn-primary btn-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Warga
            </button>
        </div>
    </div>

    {{-- Table --}}
    <x-ui.card class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-border">
                        <th class="table-header">Nama</th>
                        <th class="table-header">NIK</th>
                        <th class="table-header">KK</th>
                        <th class="table-header">Alamat</th>
                        <th class="table-header">Status</th>
                        <th class="table-header">No. Telepon</th>
                        <th class="table-header text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @php
                        $warga = [
                            ['name' => 'Budi Santoso', 'nik' => '3273010101900001', 'kk' => '3273010101900001', 'alamat' => 'Jl. Merdeka No. 1, RT 01', 'status' => 'Tetap', 'phone' => '081234567890'],
                            ['name' => 'Siti Rahma', 'nik' => '3273010101900002', 'kk' => '3273010101900001', 'alamat' => 'Jl. Merdeka No. 1, RT 01', 'status' => 'Tetap', 'phone' => '081234567891'],
                            ['name' => 'Ahmad Fauzi', 'nik' => '3273010101900003', 'kk' => '3273010101900002', 'alamat' => 'Jl. Merdeka No. 2, RT 01', 'status' => 'Tetap', 'phone' => '081234567892'],
                            ['name' => 'Rina Wijaya', 'nik' => '3273010101900004', 'kk' => '3273010101900003', 'alamat' => 'Jl. Merdeka No. 3, RT 01', 'status' => 'Kontrakan', 'phone' => '081234567893'],
                            ['name' => 'Doni Prasetyo', 'nik' => '3273010101900005', 'kk' => '3273010101900004', 'alamat' => 'Jl. Merdeka No. 4, RT 01', 'status' => 'Kos', 'phone' => '081234567894'],
                            ['name' => 'Desi Ratnasari', 'nik' => '3273010101900006', 'kk' => '3273010101900005', 'alamat' => 'Jl. Merdeka No. 5, RT 01', 'status' => 'Tetap', 'phone' => '081234567895'],
                        ];
                    @endphp
                    @foreach ($warga as $w)
                        <tr class="hover:bg-surface-secondary transition-colors">
                            <td class="table-cell">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-xs font-semibold">{{ substr($w['name'], 0, 1) }}</div>
                                    <span class="font-medium text-text-primary">{{ $w['name'] }}</span>
                                </div>
                            </td>
                            <td class="table-cell font-mono text-xs">{{ $w['nik'] }}</td>
                            <td class="table-cell font-mono text-xs">{{ $w['kk'] }}</td>
                            <td class="table-cell">{{ $w['alamat'] }}</td>
                            <td class="table-cell">
                                @php
                                    $statusClass = match($w['status']) {
                                        'Tetap' => 'badge-primary',
                                        'Kontrakan' => 'badge-warning',
                                        'Kos' => 'badge-slate',
                                        default => 'badge-slate',
                                    };
                                @endphp
                                <span class="{{ $statusClass }}">{{ $w['status'] }}</span>
                            </td>
                            <td class="table-cell">{{ $w['phone'] }}</td>
                            <td class="table-cell text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button class="btn-ghost btn-sm p-1.5" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <button class="btn-ghost btn-sm p-1.5 text-rose-600" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        <div class="flex items-center justify-between px-6 py-3 border-t border-border">
            <p class="text-sm text-text-muted">Menampilkan 1-6 dari 156 warga</p>
            <div class="flex items-center gap-1">
                <button class="btn-ghost btn-sm p-1.5 disabled:opacity-50" disabled>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button class="w-8 h-8 rounded-lg bg-primary-600 text-white text-sm font-medium">1</button>
                <button class="w-8 h-8 rounded-lg hover:bg-surface-secondary text-sm text-text-secondary">2</button>
                <button class="w-8 h-8 rounded-lg hover:bg-surface-secondary text-sm text-text-secondary">3</button>
                <button class="btn-ghost btn-sm p-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </x-ui.card>
</x-layouts.rt>
