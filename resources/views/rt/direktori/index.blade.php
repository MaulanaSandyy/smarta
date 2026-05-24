<x-layouts.rt>
    <x-slot:title>Direktori Warga</x-slot:title>
    <x-slot:subtitle>Direktori keahlian dan UMKM warga RT 01</x-slot:subtitle>

    @php
        $direktori = [
            ['name' => 'Budi Santoso', 'type' => 'UMKM', 'desc' => 'Warung Sembako', 'kontak' => '081234567890', 'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', 'color' => 'bg-emerald-100 text-emerald-600'],
            ['name' => 'Ahmad Fauzi', 'type' => 'Keahlian', 'desc' => 'Tukang Listrik', 'kontak' => '081234567892', 'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'color' => 'bg-blue-100 text-blue-600'],
            ['name' => 'Siti Rahma', 'type' => 'UMKM', 'desc' => 'Katering Rumahan', 'kontak' => '081234567891', 'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4', 'color' => 'bg-amber-100 text-amber-600'],
            ['name' => 'Rina Wijaya', 'type' => 'Profesi', 'desc' => 'Dokter Umum', 'kontak' => '081234567893', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'color' => 'bg-cyan-100 text-cyan-600'],
            ['name' => 'Doni Prasetyo', 'type' => 'Keahlian', 'desc' => 'Mekanik Motor', 'kontak' => '081234567894', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z', 'color' => 'bg-purple-100 text-purple-600'],
            ['name' => 'Desi Ratnasari', 'type' => 'UMKM', 'desc' => 'Laundry & Setrika', 'kontak' => '081234567895', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'color' => 'bg-rose-100 text-rose-600'],
            ['name' => 'Hendra Gunawan', 'type' => 'Keahlian', 'desc' => 'Tukang Kayu', 'kontak' => '081234567898', 'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01', 'color' => 'bg-orange-100 text-orange-600'],
            ['name' => 'Fitriani', 'type' => 'UMKM', 'desc' => 'Jahit & Bordir', 'kontak' => '081234567899', 'icon' => 'M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z', 'color' => 'bg-teal-100 text-teal-600'],
            ['name' => 'Pak RT', 'type' => 'Profesi', 'desc' => 'Guru SD', 'kontak' => '081234567896', 'icon' => 'M12 14l9-5-9-5-9 5 9 5z', 'color' => 'bg-indigo-100 text-indigo-600'],
            ['name' => 'Bu Sekretaris', 'type' => 'UMKM', 'desc' => 'Toko Kue', 'kontak' => '081234567897', 'icon' => 'M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5', 'color' => 'bg-pink-100 text-pink-600'],
            ['name' => 'Eko Prasetyo', 'type' => 'Profesi', 'desc' => 'Programmer', 'kontak' => '081234567900', 'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4', 'color' => 'bg-sky-100 text-sky-600'],
            ['name' => 'Ratna Dewi', 'type' => 'Keahlian', 'desc' => 'Tata Rias', 'kontak' => '081234567901', 'icon' => 'M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5', 'color' => 'bg-violet-100 text-violet-600'],
        ];
        $perPage = 6;
    @endphp

    <div x-data="dataDirektori({{ Js::from($direktori) }}, {{ $perPage }})">
        {{-- Filter Bar --}}
        <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm mb-6">
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <div class="relative flex-1 max-w-xs">
                    <svg class="absolute left-3 inset-y-0 my-auto w-4 h-4 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    <input type="text" placeholder="Cari warga atau keahlian..." class="input pl-10" x-model="search" @input="page = 1">
                </div>
                <div class="flex items-center gap-1.5 flex-wrap">
                    <button @click="setFilter('')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="kategoriFilter === '' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Semua</button>
                    <button @click="setFilter('UMKM')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="kategoriFilter === 'UMKM' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">UMKM</button>
                    <button @click="setFilter('Keahlian')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="kategoriFilter === 'Keahlian' ? 'bg-amber-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Keahlian</button>
                    <button @click="setFilter('Profesi')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="kategoriFilter === 'Profesi' ? 'bg-cyan-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Profesi</button>
                    <button @click="resetFilters()" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors text-text-muted hover:text-rose-600 hover:bg-rose-50" x-show="search || kategoriFilter">
                        <svg class="w-3.5 h-3.5 inline-block mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Hapus
                    </button>
                </div>
                <div class="flex items-center gap-2 sm:ml-auto">
                    <button class="btn-secondary btn-sm justify-center" @click="exportExcel()" title="Export Excel">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Excel
                    </button>
                    <button class="btn-secondary btn-sm justify-center" @click="printPDF()" title="Cetak PDF">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                        Print
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Cards --}}
        <div class="block sm:hidden space-y-3 mb-6">
            <template x-if="filteredItems.length === 0">
                <div class="bg-(--surface) border border-border rounded-2xl p-8 text-center">
                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <p class="text-sm text-text-muted">Tidak ada warga yang cocok</p>
                    <button @click="resetFilters()" class="btn-primary btn-sm mt-3">Reset Filter</button>
                </div>
            </template>
            <template x-for="(item, index) in pagedItems" :key="index">
                <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm">
                    <div class="flex items-start gap-3 mb-3">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" :class="item.color">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="item.icon"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-text-primary truncate" x-text="item.name"></p>
                            <span class="text-[10px] px-2 py-0.5 rounded-full font-medium inline-block mt-0.5" :class="badgeClass(item.type)" x-text="item.type"></span>
                        </div>
                        <button class="btn-ghost btn-sm shrink-0" @click="detail(item)">Detail</button>
                    </div>
                    <p class="text-sm text-text-secondary" x-text="item.desc"></p>
                    <p class="text-xs text-text-muted mt-1.5 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span class="truncate" x-text="item.kontak"></span>
                    </p>
                </div>
            </template>

            <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm" x-show="filteredItems.length > 0">
                <div class="flex flex-col items-center gap-3">
                    <p class="text-sm text-text-muted">Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> warga</p>
                    <div class="flex items-center gap-1">
                        <button class="btn-ghost btn-sm p-1.5" :disabled="page === 1" @click="prev()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <template x-for="(p, i) in pages" :key="i">
                            <button class="w-8 h-8 rounded-lg text-sm font-medium transition-colors" :class="p === page ? 'bg-primary-600 text-white' : 'hover:bg-surface-secondary text-text-secondary'" x-text="p" @click="goTo(p)"></button>
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
                            <th class="table-header">Kategori</th>
                            <th class="table-header">Deskripsi</th>
                            <th class="table-header">Kontak</th>
                            <th class="table-header text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <template x-if="filteredItems.length === 0">
                            <tr>
                                <td colspan="5" class="table-cell text-center py-12">
                                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    <p class="text-sm text-text-muted">Tidak ada warga yang cocok</p>
                                    <button @click="resetFilters()" class="btn-primary btn-sm mt-2">Reset Filter</button>
                                </td>
                            </tr>
                        </template>
                        <template x-for="(item, index) in pagedItems" :key="index">
                            <tr class="hover:bg-surface-secondary transition-colors">
                                <td class="table-cell">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0 text-xs" :class="item.color">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="item.icon"/></svg>
                                        </div>
                                        <span class="font-medium text-text-primary" x-text="item.name"></span>
                                    </div>
                                </td>
                                <td class="table-cell">
                                    <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" :class="badgeClass(item.type)" x-text="item.type"></span>
                                </td>
                                <td class="table-cell" x-text="item.desc"></td>
                                <td class="table-cell">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-text-muted shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                        <span x-text="item.kontak"></span>
                                    </div>
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
                <p class="text-sm text-text-muted">Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> warga</p>
                <div class="flex items-center gap-1">
                    <button class="btn-ghost btn-sm p-1.5" :disabled="page === 1" @click="prev()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <template x-for="(p, i) in pages" :key="i">
                        <button class="w-8 h-8 rounded-lg text-sm font-medium transition-colors" :class="p === page ? 'bg-primary-600 text-white' : 'hover:bg-surface-secondary text-text-secondary'" x-text="p" @click="goTo(p)"></button>
                    </template>
                    <button class="btn-ghost btn-sm p-1.5" :disabled="page === totalPages" @click="next()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Modal Detail --}}
        <x-ui.modal name="detail-direktori" header="Detail Warga">
            <div x-show="selectedItem" class="space-y-4">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center shrink-0" :class="selectedItem.color">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="selectedItem.icon"/></svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-text-primary" x-text="selectedItem.name"></p>
                        <span class="text-[10px] px-2 py-0.5 rounded-full font-medium inline-block mt-1" :class="badgeClass(selectedItem.type)" x-text="selectedItem.type"></span>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 text-sm">
                    <div>
                        <span class="text-text-muted block text-xs">Deskripsi</span>
                        <span class="text-text-primary font-medium" x-text="selectedItem.desc"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Kontak</span>
                        <span class="text-text-primary" x-text="selectedItem.kontak"></span>
                    </div>
                </div>
            </div>
        </x-ui.modal>
    </div>
</x-layouts.rt>
