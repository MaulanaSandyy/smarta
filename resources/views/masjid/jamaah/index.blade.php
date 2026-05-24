<x-layouts.masjid>
    <x-slot:title>Manajemen Jamaah</x-slot:title>
    <x-slot:subtitle>Data jamaah dan pengurus masjid</x-slot:subtitle>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <x-ui.stats-card value="320" label="Total Jamaah" iconClass="bg-emerald-100 text-emerald-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="12" label="Pengurus DKM" iconClass="bg-blue-100 text-blue-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="85" label="Jamaah Aktif" iconClass="bg-amber-100 text-amber-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg></x-slot:icon>
        </x-ui.stats-card>
    </div>

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3 flex-1 max-w-md">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" placeholder="Cari jamaah..." class="input pl-10">
            </div>
        </div>
        <button class="btn-primary btn-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Jamaah
        </button>
    </div>

    <x-ui.card class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-border">
                        <th class="table-header">Nama</th>
                        <th class="table-header">Role</th>
                        <th class="table-header">No. Telepon</th>
                        <th class="table-header">Alamat</th>
                        <th class="table-header">Status</th>
                        <th class="table-header text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @php
                        $jamaah = [
                            ['name' => 'H. Ahmad', 'role' => 'Ketua DKM', 'phone' => '081234567901', 'alamat' => 'Jl. Masjid No. 1', 'status' => 'Aktif'],
                            ['name' => 'Ustadz Abdurrahman', 'role' => 'Imam', 'phone' => '081234567902', 'alamat' => 'Jl. Masjid No. 2', 'status' => 'Aktif'],
                            ['name' => 'Bpk. Hasan', 'role' => 'Bendahara', 'phone' => '081234567903', 'alamat' => 'Jl. Masjid No. 3', 'status' => 'Aktif'],
                            ['name' => 'Ibu Siti Rahma', 'role' => 'Sekretaris', 'phone' => '081234567904', 'alamat' => 'Jl. Masjid No. 4', 'status' => 'Aktif'],
                            ['name' => 'Bpk. Mahmud', 'role' => 'Marbot', 'phone' => '081234567905', 'alamat' => 'Jl. Masjid No. 5', 'status' => 'Aktif'],
                            ['name' => 'Ahmad Fauzi', 'role' => 'Jamaah', 'phone' => '081234567906', 'alamat' => 'Jl. Merdeka No. 2', 'status' => 'Aktif'],
                        ];
                    @endphp
                    @foreach ($jamaah as $j)
                        <tr class="hover:bg-surface-secondary transition-colors">
                            <td class="table-cell">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-semibold">{{ substr($j['name'], 0, 1) }}</div>
                                    <span class="font-medium text-text-primary">{{ $j['name'] }}</span>
                                </div>
                            </td>
                            <td class="table-cell">
                                <span class="badge-primary text-[10px]">{{ $j['role'] }}</span>
                            </td>
                            <td class="table-cell">{{ $j['phone'] }}</td>
                            <td class="table-cell">{{ $j['alamat'] }}</td>
                            <td class="table-cell">
                                <span class="badge-success">{{ $j['status'] }}</span>
                            </td>
                            <td class="table-cell text-right">
                                <button class="btn-ghost btn-sm">Detail</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between px-6 py-3 border-t border-border">
            <p class="text-sm text-text-muted">Menampilkan 1-6 dari 320 jamaah</p>
            <div class="flex items-center gap-1">
                <button class="btn-ghost btn-sm p-1.5 disabled:opacity-50" disabled>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button class="w-8 h-8 rounded-lg bg-emerald-600 text-white text-sm font-medium">1</button>
                <button class="w-8 h-8 rounded-lg hover:bg-surface-secondary text-sm text-text-secondary">2</button>
                <button class="w-8 h-8 rounded-lg hover:bg-surface-secondary text-sm text-text-secondary">3</button>
                <button class="btn-ghost btn-sm p-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </x-ui.card>
</x-layouts.masjid>
