<x-layouts.masjid>
    <x-slot:title>Manajemen Jamaah</x-slot:title>
    <x-slot:subtitle>Data jamaah dan pengurus masjid</x-slot:subtitle>

    @php
        $jamaah = [
            ['name' => 'H. Ahmad', 'role' => 'Ketua DKM', 'phone' => '081234567901', 'alamat' => 'Jl. Masjid No. 1', 'status' => 'Aktif'],
            ['name' => 'Ustadz Abdurrahman', 'role' => 'Imam', 'phone' => '081234567902', 'alamat' => 'Jl. Masjid No. 2', 'status' => 'Aktif'],
            ['name' => 'Bpk. Hasan', 'role' => 'Bendahara', 'phone' => '081234567903', 'alamat' => 'Jl. Masjid No. 3', 'status' => 'Aktif'],
            ['name' => 'Ibu Siti Rahma', 'role' => 'Sekretaris', 'phone' => '081234567904', 'alamat' => 'Jl. Masjid No. 4', 'status' => 'Aktif'],
            ['name' => 'Bpk. Mahmud', 'role' => 'Marbot', 'phone' => '081234567905', 'alamat' => 'Jl. Masjid No. 5', 'status' => 'Aktif'],
            ['name' => 'Ahmad Fauzi', 'role' => 'Jamaah', 'phone' => '081234567906', 'alamat' => 'Jl. Merdeka No. 2', 'status' => 'Aktif'],
            ['name' => 'Ustadz Hafidz', 'role' => 'Imam', 'phone' => '081234567907', 'alamat' => 'Jl. Masjid No. 6', 'status' => 'Aktif'],
            ['name' => 'Ibu Dewi Sartika', 'role' => 'Jamaah', 'phone' => '081234567908', 'alamat' => 'Jl. Merdeka No. 3', 'status' => 'Aktif'],
        ];
        $perPage = 5;
    @endphp

    <div x-data="dataJamaah({{ Js::from($jamaah) }}, {{ $perPage }})">
        {{-- Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <x-ui.stats-card iconClass="bg-emerald-100 text-emerald-600">
                <x-slot:value><span x-text="items.length"></span></x-slot:value>
                <x-slot:label>Total Jamaah</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg></x-slot:icon>
            </x-ui.stats-card>
            <x-ui.stats-card iconClass="bg-blue-100 text-blue-600">
                <x-slot:value><span x-text="totalPengurus"></span></x-slot:value>
                <x-slot:label>Pengurus DKM</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></x-slot:icon>
            </x-ui.stats-card>
            <x-ui.stats-card iconClass="bg-amber-100 text-amber-600">
                <x-slot:value><span x-text="totalAktif"></span></x-slot:value>
                <x-slot:label>Jamaah Aktif</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg></x-slot:icon>
            </x-ui.stats-card>
        </div>

        {{-- Filter + Tambah --}}
        <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm mb-6">
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <div class="relative flex-1 max-w-xs">
                    <svg class="absolute left-3 inset-y-0 my-auto w-4 h-4 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    <input type="text" placeholder="Cari nama, telepon, atau alamat..." class="input pl-10" x-model="search" @input="page = 1">
                </div>
                <div class="flex items-center gap-1.5 flex-wrap">
                    <button @click="setFilter('')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="roleFilter === '' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Semua</button>
                    <template x-for="r in roleList" :key="r">
                        <button @click="setFilter(r)" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="roleFilter === r ? 'bg-emerald-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'" x-text="r"></button>
                    </template>
                    <button @click="resetFilters()" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors text-text-muted hover:text-rose-600 hover:bg-rose-50" x-show="search || roleFilter">
                        <svg class="w-3.5 h-3.5 inline-block mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Hapus
                    </button>
                </div>
                <button class="btn-primary btn-sm justify-center sm:ml-auto shrink-0" @click="bukaForm()">
                    <svg class="w-4 h-4 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span class="hidden sm:inline">Tambah Jamaah</span>
                </button>
            </div>
        </div>

        {{-- Mobile Cards --}}
        <div class="block sm:hidden space-y-3 mb-6">
            <template x-if="filteredItems.length === 0">
                <div class="bg-(--surface) border border-border rounded-2xl p-8 text-center">
                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <p class="text-sm text-text-muted">Tidak ada jamaah yang cocok</p>
                    <button @click="resetFilters()" class="btn-primary btn-sm mt-3">Reset Filter</button>
                </div>
            </template>
            <template x-for="(item, index) in pagedItems" :key="index">
                <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm">
                    <div class="flex items-start gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-sm font-semibold shrink-0" x-text="item.name.charAt(0)"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-text-primary truncate" x-text="item.name"></p>
                            <span class="text-[10px] px-2 py-0.5 rounded-full font-medium inline-block mt-0.5" :class="roleBadge(item.role)" x-text="item.role"></span>
                        </div>
                        <button class="btn-ghost btn-sm shrink-0" @click="detail(item)">Detail</button>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div>
                            <span class="text-text-muted block">Telepon</span>
                            <span class="text-text-primary" x-text="item.phone"></span>
                        </div>
                        <div>
                            <span class="text-text-muted block">Status</span>
                            <span class="badge-success text-[10px]" x-text="item.status"></span>
                        </div>
                        <div class="col-span-2">
                            <span class="text-text-muted block">Alamat</span>
                            <span class="text-text-primary" x-text="item.alamat"></span>
                        </div>
                    </div>
                </div>
            </template>

            <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm" x-show="filteredItems.length > 0">
                <div class="flex flex-col items-center gap-3">
                    <p class="text-sm text-text-muted">Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> jamaah</p>
                    <div class="flex items-center gap-1">
                        <button class="btn-ghost btn-sm p-1.5" :disabled="page === 1" @click="prev()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <template x-for="(p, i) in pages" :key="i">
                            <button class="w-8 h-8 rounded-lg text-sm font-medium transition-colors" :class="p === page ? 'bg-emerald-600 text-white' : 'hover:bg-surface-secondary text-text-secondary'" x-text="p" @click="goTo(p)"></button>
                        </template>
                        <button class="btn-ghost btn-sm p-1.5" :disabled="page === totalPages" @click="next()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Desktop Table --}}
        <div class="hidden sm:block bg-(--surface) border border-border rounded-2xl shadow-sm overflow-hidden">
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
                        <template x-if="filteredItems.length === 0">
                            <tr>
                                <td colspan="6" class="table-cell text-center py-12">
                                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    <p class="text-sm text-text-muted">Tidak ada jamaah yang cocok</p>
                                    <button @click="resetFilters()" class="btn-primary btn-sm mt-2">Reset Filter</button>
                                </td>
                            </tr>
                        </template>
                        <template x-for="(item, index) in pagedItems" :key="index">
                            <tr class="hover:bg-surface-secondary transition-colors">
                                <td class="table-cell">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-semibold" x-text="item.name.charAt(0)"></div>
                                        <span class="font-medium text-text-primary" x-text="item.name"></span>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" :class="roleBadge(item.role)" x-text="item.role"></span>
                                </td>
                                <td class="table-cell" x-text="item.phone"></td>
                                <td class="table-cell" x-text="item.alamat"></td>
                                <td class="table-cell">
                                    <span class="badge-success text-[10px]" x-text="item.status"></span>
                                </td>
                                <td class="table-cell text-right">
                                    <button class="btn-ghost btn-sm" @click="detail(item)">Detail</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 px-4 sm:px-6 py-3 border-t border-border" x-show="filteredItems.length > 0">
                <p class="text-sm text-text-muted">Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> jamaah</p>
                <div class="flex items-center gap-1">
                    <button class="btn-ghost btn-sm p-1.5" :disabled="page === 1" @click="prev()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <template x-for="(p, i) in pages" :key="i">
                        <button class="w-8 h-8 rounded-lg text-sm font-medium transition-colors" :class="p === page ? 'bg-emerald-600 text-white' : 'hover:bg-surface-secondary text-text-secondary'" x-text="p" @click="goTo(p)"></button>
                    </template>
                    <button class="btn-ghost btn-sm p-1.5" :disabled="page === totalPages" @click="next()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Modal Detail --}}
        <x-ui.modal name="detail-jamaah" header="Detail Jamaah">
            <div x-show="selectedItem" class="space-y-4">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-14 h-14 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl font-bold shrink-0" x-text="selectedItem.name ? selectedItem.name.charAt(0) : ''"></div>
                    <div>
                        <p class="text-lg font-semibold text-text-primary" x-text="selectedItem.name"></p>
                        <span class="text-[10px] px-2 py-0.5 rounded-full font-medium inline-block mt-1" :class="roleBadge(selectedItem.role)" x-text="selectedItem.role"></span>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-text-muted block text-xs">No. Telepon</span>
                        <span class="text-text-primary font-medium" x-text="selectedItem.phone"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Status</span>
                        <span class="badge-success text-[10px]" x-text="selectedItem.status"></span>
                    </div>
                    <div class="sm:col-span-2">
                        <span class="text-text-muted block text-xs">Alamat</span>
                        <span class="text-text-primary font-medium" x-text="selectedItem.alamat"></span>
                    </div>
                </div>
            </div>
        </x-ui.modal>

        {{-- Modal Tambah --}}
        <x-ui.modal name="tambah-jamaah" header="Tambah Jamaah">
            <form class="space-y-4" @submit.prevent="tambahJamaah">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nama <span class="text-rose-500">*</span></label>
                    <input type="text" class="input w-full" placeholder="Nama lengkap" x-model="form.name" required>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Role</label>
                        <input type="text" class="input w-full" placeholder="Contoh: Imam, Marbot" x-model="form.role">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">No. Telepon</label>
                        <input type="tel" class="input w-full" placeholder="Nomor telepon" x-model="form.phone">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Alamat</label>
                    <input type="text" class="input w-full" placeholder="Alamat lengkap" x-model="form.alamat">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Status</label>
                    <select class="input w-full" x-model="form.status">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" class="btn-secondary btn-sm" @click="window['modal-tambah-jamaah'].close()">Batal</button>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.modal>
    </div>
</x-layouts.masjid>
