<x-layouts.masjid>
    <x-slot:title>Inventaris Masjid</x-slot:title>
    <x-slot:subtitle>Kelola aset dan perlengkapan masjid</x-slot:subtitle>

    <div x-data="dataInventaris()">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <x-ui.stats-card iconClass="bg-emerald-100 text-emerald-600">
                <x-slot:value><span x-text="totalAset"></span></x-slot:value>
                <x-slot:label>Total Aset</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></x-slot:icon>
            </x-ui.stats-card>
            <x-ui.stats-card iconClass="bg-amber-100 text-amber-600">
                <x-slot:value><span x-text="totalPerluPerbaikan"></span></x-slot:value>
                <x-slot:label>Perlu Perbaikan</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg></x-slot:icon>
            </x-ui.stats-card>
            <x-ui.stats-card iconClass="bg-blue-100 text-blue-600">
                <x-slot:value><span x-text="formatNilai(totalNilai)"></span></x-slot:value>
                <x-slot:label>Nilai Aset</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></x-slot:icon>
            </x-ui.stats-card>
            <x-ui.stats-card iconClass="bg-cyan-100 text-cyan-600">
                <x-slot:value><span x-text="totalKategori"></span></x-slot:value>
                <x-slot:label>Kategori</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg></x-slot:icon>
            </x-ui.stats-card>
        </div>

        <div class="card overflow-hidden">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 px-6 py-3 border-b border-border">
                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <div class="relative flex-1 sm:flex-initial">
                        <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" x-model="search" placeholder="Cari aset..." class="input pl-10 text-sm py-1.5 w-full sm:w-48">
                    </div>
                    <select x-model="filterKategori" class="input text-sm py-1.5 w-auto">
                        <option value="Semua">Semua Kategori</option>
                        <template x-for="k in kategoriList" :key="k">
                            <option x-text="k" :value="k"></option>
                        </template>
                    </select>
                </div>
                <button @click="bukaTambah()" class="btn-primary btn-sm w-full sm:w-auto">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span class="hidden sm:inline">Tambah Aset</span>
                    <span class="sm:hidden">Tambah</span>
                </button>
            </div>

            <div class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-border">
                            <th class="table-header">Nama Aset</th>
                            <th class="table-header">Kategori</th>
                            <th class="table-header">Jumlah</th>
                            <th class="table-header">Kondisi</th>
                            <th class="table-header">Lokasi</th>
                            <th class="table-header text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <template x-for="item in paginated" :key="item.name">
                            <tr class="hover:bg-surface-secondary transition-colors">
                                <td class="table-cell font-medium text-text-primary" x-text="item.name"></td>
                                <td class="table-cell"><span class="badge-slate" x-text="item.kategori"></span></td>
                                <td class="table-cell" x-text="item.jumlah"></td>
                                <td class="table-cell"><span x-text="item.kondisi" :class="kondisiClass(item.kondisi)"></span></td>
                                <td class="table-cell" x-text="item.lokasi"></td>
                                <td class="table-cell text-right">
                                    <button @click="detail(item)" class="btn-ghost btn-sm">Detail</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <div class="md:hidden divide-y divide-border">
                <template x-for="item in paginated" :key="item.name">
                    <div class="p-4 hover:bg-surface-secondary transition-colors">
                        <div class="flex items-start justify-between gap-2">
                            <div>
                                <p class="text-sm font-semibold text-text-primary" x-text="item.name"></p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="badge-slate text-[10px]" x-text="item.kategori"></span>
                                    <span class="text-xs text-text-muted" x-text="item.jumlah + ' pcs'"></span>
                                </div>
                            </div>
                            <span :class="kondisiClass(item.kondisi)" x-text="item.kondisi"></span>
                        </div>
                        <div class="flex items-center justify-between mt-2 pt-2 border-t border-border">
                            <span class="text-xs text-text-muted" x-text="item.lokasi"></span>
                            <button @click="detail(item)" class="text-xs text-emerald-600 hover:text-emerald-700 font-medium">Detail</button>
                        </div>
                    </div>
                </template>
            </div>

            <template x-if="filtered.length === 0">
                <div class="text-center py-12">
                    <svg class="w-12 h-12 mx-auto text-text-muted/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <p class="text-text-muted mt-3 text-sm">Tidak ada aset ditemukan</p>
                </div>
            </template>

            <div class="flex items-center justify-between px-6 py-3 border-t border-border" x-show="filtered.length > perPage">
                <p class="text-xs text-text-muted">
                    Menampilkan <span x-text="paginated.length"></span> dari <span x-text="filtered.length"></span>
                </p>
                <div class="flex gap-1">
                    <button @click="page = Math.max(1, page - 1)" :disabled="page === 1" class="btn-ghost btn-sm px-2" :class="page === 1 ? 'opacity-30' : ''">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <template x-for="p in totalPages" :key="p">
                        <button @click="page = p" class="btn-sm px-2.5" :class="page === p ? 'btn-primary' : 'btn-ghost'" x-text="p"></button>
                    </template>
                    <button @click="page = Math.min(totalPages, page + 1)" :disabled="page === totalPages" class="btn-ghost btn-sm px-2" :class="page === totalPages ? 'opacity-30' : ''">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <x-ui.modal name="detail-aset" header="Detail Aset">
            <template x-if="selectedItem">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-lg font-bold" x-text="selectedItem.name.charAt(0)"></div>
                        <div>
                            <h3 class="text-lg font-semibold text-text-primary" x-text="selectedItem.name"></h3>
                            <span class="badge-slate mt-1 inline-block" x-text="selectedItem.kategori"></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div><span class="text-text-muted">Jumlah</span><p class="font-medium text-text-primary" x-text="selectedItem.jumlah + ' pcs'"></p></div>
                        <div><span class="text-text-muted">Kondisi</span><p><span x-text="selectedItem.kondisi" :class="kondisiClass(selectedItem.kondisi)"></span></p></div>
                        <div><span class="text-text-muted">Lokasi</span><p class="font-medium text-text-primary" x-text="selectedItem.lokasi"></p></div>
                        <div><span class="text-text-muted">Nilai</span><p class="font-medium text-text-primary" x-text="formatRupiah(selectedItem.nilai)"></p></div>
                    </div>
                </div>
            </template>
        </x-ui.modal>

        <x-ui.modal name="tambah-aset" header="Tambah Aset">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Nama Aset *</label>
                    <input type="text" x-model="form.name" class="input w-full text-sm" placeholder="Masukkan nama aset">
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Kategori</label>
                    <select x-model="form.kategori" class="input w-full text-sm">
                        <template x-for="k in kategoriList" :key="k">
                            <option x-text="k" :value="k"></option>
                        </template>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-text-muted mb-1">Jumlah</label>
                        <input type="number" x-model="form.jumlah" class="input w-full text-sm" min="1">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-text-muted mb-1">Nilai (Rp)</label>
                        <input type="number" x-model="form.nilai" class="input w-full text-sm" min="0">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Kondisi</label>
                    <select x-model="form.kondisi" class="input w-full text-sm">
                        <option value="Baik">Baik</option>
                        <option value="Rusak Ringan">Rusak Ringan</option>
                        <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Lokasi</label>
                    <input type="text" x-model="form.lokasi" class="input w-full text-sm" placeholder="Lokasi penyimpanan">
                </div>
                <div class="flex gap-2 justify-end pt-2">
                    <button @click="window['modal-tambah-aset'].close()" class="btn-secondary btn-sm">Batal</button>
                    <button @click="simpanAset()" class="btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </x-ui.modal>
    </div>
</x-layouts.masjid>
