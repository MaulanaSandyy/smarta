<x-layouts.masjid>
    <x-slot:title>Donasi & Zakat</x-slot:title>
    <x-slot:subtitle>Kelola donasi, infaq, sedekah, dan zakat</x-slot:subtitle>

    <div x-data="dataDonasi({{ Js::from($donasi->items()) }}, {{ $donasi->perPage() }})">
        {{-- Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <x-ui.stats-card iconClass="bg-emerald-100 text-emerald-600">
                <x-slot:value><span x-text="formatRupiah(totalDonasi)"></span></x-slot:value>
                <x-slot:label>Total Donasi</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg></x-slot:icon>
            </x-ui.stats-card>
            <x-ui.stats-card iconClass="bg-amber-100 text-amber-600">
                <x-slot:value><span x-text="formatRupiah(totalZakat)"></span></x-slot:value>
                <x-slot:label>Zakat Terkumpul</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg></x-slot:icon>
            </x-ui.stats-card>
            <x-ui.stats-card iconClass="bg-blue-100 text-blue-600">
                <x-slot:value><span x-text="donaturAktif"></span></x-slot:value>
                <x-slot:label>Donatur Aktif</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></x-slot:icon>
            </x-ui.stats-card>
            <x-ui.stats-card iconClass="bg-cyan-100 text-cyan-600" value="12" label="Mustahik">
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg></x-slot:icon>
            </x-ui.stats-card>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                {{-- Filter --}}
                <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm mb-6">
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <div class="relative flex-1 max-w-xs">
                            <svg class="absolute left-3 inset-y-0 my-auto w-4 h-4 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                            <input type="text" placeholder="Cari donatur atau jenis..." class="input pl-10" x-model="search" @input="page = 1">
                        </div>
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <button @click="setFilter('')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="jenisFilter === '' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Semua</button>
                            <template x-for="j in jenisList" :key="j">
                                <button @click="setFilter(j)" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="jenisFilter === j ? 'bg-emerald-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'" x-text="j"></button>
                            </template>
                            <button @click="resetFilters()" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors text-text-muted hover:text-rose-600 hover:bg-rose-50" x-show="search || jenisFilter">
                                <svg class="w-3.5 h-3.5 inline-block mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                Hapus
                            </button>
                        </div>
                        <div class="flex items-center gap-2 sm:ml-auto">
                            <button class="btn-secondary btn-sm justify-center shrink-0" @click="printPDF()">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                                <span class="hidden sm:inline">Cetak</span>
                            </button>
                            <button class="btn-primary btn-sm justify-center shrink-0" @click="bukaForm()">
                                <svg class="w-4 h-4 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <span class="hidden sm:inline">Catat Donasi</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Mobile Cards --}}
                <div class="block sm:hidden space-y-3 mb-6">
                    <template x-if="filteredItems.length === 0">
                        <div class="bg-(--surface) border border-border rounded-2xl p-8 text-center">
                            <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <p class="text-sm text-text-muted">Tidak ada donasi yang cocok</p>
                            <button @click="resetFilters()" class="btn-primary btn-sm mt-3">Reset Filter</button>
                        </div>
                    </template>
                    <template x-for="(item, index) in pagedItems" :key="index">
                        <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <p class="text-xs text-text-muted" x-text="item.tgl"></p>
                                    <p class="text-sm font-semibold text-text-primary mt-0.5" x-text="item.donatur"></p>
                                </div>
                                <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" :class="statusClass(item.status)" x-text="item.status"></span>
                            </div>
                            <div class="flex items-center justify-between mt-2">
                                <div>
                                    <span class="badge-slate text-[10px]" x-text="item.jenis"></span>
                                    <p class="text-sm font-bold text-emerald-600 mt-1" x-text="formatRupiah(item.jumlah)"></p>
                                </div>
                                <button class="btn-ghost btn-sm" @click="detail(item)">Detail</button>
                            </div>
                        </div>
                    </template>

                    <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm" x-show="filteredItems.length > 0">
                        <div class="flex flex-col items-center gap-3">
                            <p class="text-sm text-text-muted">Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> donasi</p>
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
                                    <th class="table-header">Tanggal</th>
                                    <th class="table-header">Donatur</th>
                                    <th class="table-header">Jenis</th>
                                    <th class="table-header">Jumlah</th>
                                    <th class="table-header">Status</th>
                                    <th class="table-header text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border">
                                <template x-if="filteredItems.length === 0">
                                    <tr>
                                        <td colspan="6" class="table-cell text-center py-12">
                                            <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                            <p class="text-sm text-text-muted">Tidak ada donasi yang cocok</p>
                                            <button @click="resetFilters()" class="btn-primary btn-sm mt-2">Reset Filter</button>
                                        </td>
                                    </tr>
                                </template>
                                <template x-for="(item, index) in pagedItems" :key="index">
                                    <tr class="hover:bg-surface-secondary transition-colors">
                                        <td class="table-cell text-xs" x-text="item.tgl"></td>
                                        <td class="table-cell font-medium text-text-primary" x-text="item.donatur"></td>
                                        <td class="table-cell"><span class="badge-slate text-[10px] px-2 py-0.5" x-text="item.jenis"></span></td>
                                        <td class="table-cell font-semibold text-emerald-600" x-text="formatRupiah(item.jumlah)"></td>
                                        <td class="table-cell">
                                            <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" :class="statusClass(item.status)" x-text="item.status"></span>
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
                        <p class="text-sm text-text-muted">Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> donasi</p>
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

            {{-- Sidebar Informasi --}}
            <div class="space-y-6">
                <div class="bg-(--surface) border border-border rounded-2xl shadow-sm overflow-hidden">
                    <div class="px-4 sm:px-6 py-4 border-b border-border">
                        <h3 class="text-sm sm:text-base font-semibold text-text-primary">Rekening Donasi</h3>
                    </div>
                    <div class="p-4 sm:p-6 space-y-4">
                        <div class="p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-800">
                            <p class="text-xs text-emerald-600 dark:text-emerald-400 font-medium mb-1">Bank Syariah Indonesia</p>
                            <p class="text-lg font-bold text-emerald-800 dark:text-emerald-200">7123 4567 8901</p>
                            <p class="text-xs text-emerald-600 dark:text-emerald-400">a.n. DKM Masjid Al-Barakah</p>
                        </div>
                        <div class="p-4 rounded-xl bg-amber-50 dark:bg-amber-950/30 border border-amber-200 dark:border-amber-800">
                            <p class="text-xs text-amber-600 dark:text-amber-400 font-medium mb-1">Bank Mandiri</p>
                            <p class="text-lg font-bold text-amber-800 dark:text-amber-200">1230 9876 5432</p>
                            <p class="text-xs text-amber-600 dark:text-amber-400">a.n. DKM Masjid Al-Barakah</p>
                        </div>
                    </div>
                </div>

                <div class="bg-(--surface) border border-border rounded-2xl shadow-sm overflow-hidden">
                    <div class="px-4 sm:px-6 py-4 border-b border-border">
                        <h3 class="text-sm sm:text-base font-semibold text-text-primary">Distribusi Zakat</h3>
                    </div>
                    <div class="p-4 sm:p-6 space-y-3">
                        @php
                            $distribusi = [
                                ['name' => 'Fakir', 'total' => 'Rp 450.000', 'pct' => '30%'],
                                ['name' => 'Miskin', 'total' => 'Rp 350.000', 'pct' => '23%'],
                                ['name' => 'Amil', 'total' => 'Rp 150.000', 'pct' => '10%'],
                                ['name' => 'Mualaf', 'total' => 'Rp 200.000', 'pct' => '13%'],
                                ['name' => 'Lainnya', 'total' => 'Rp 350.000', 'pct' => '23%'],
                            ];
                        @endphp
                        @foreach ($distribusi as $d)
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-text-secondary">{{ $d['name'] }}</span>
                                <div class="text-right">
                                    <span class="text-sm font-medium text-text-primary">{{ $d['total'] }}</span>
                                    <span class="text-xs text-text-muted ml-2">({{ $d['pct'] }})</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Detail --}}
        <x-ui.modal name="detail-donasi" header="Detail Donasi">
            <div x-show="selectedItem" class="space-y-4">
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-text-muted block text-xs">Tanggal</span>
                        <span class="text-text-primary font-medium" x-text="selectedItem.tgl"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Donatur</span>
                        <span class="text-text-primary font-medium" x-text="selectedItem.donatur"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Jenis</span>
                        <span class="text-text-primary" x-text="selectedItem.jenis"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Status</span>
                        <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" :class="statusClass(selectedItem.status)" x-text="selectedItem.status"></span>
                    </div>
                    <div class="col-span-2">
                        <span class="text-text-muted block text-xs">Jumlah</span>
                        <span class="text-lg font-bold text-emerald-600" x-text="formatRupiah(selectedItem.jumlah)"></span>
                    </div>
                </div>
            </div>
        </x-ui.modal>

        {{-- Modal Catat Donasi --}}
        <x-ui.modal name="tambah-donasi" header="Catat Donasi">
            <form class="space-y-4" @submit.prevent="catatDonasi">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Donatur <span class="text-rose-500">*</span></label>
                        <input type="text" class="input w-full" placeholder="Nama donatur" x-model="form.donatur" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Tanggal</label>
                        <input type="text" class="input w-full" placeholder="DD/MM/YYYY" x-model="form.tgl">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Jenis</label>
                        <select class="input w-full" x-model="form.jenis">
                            <option value="Infaq">Infaq</option>
                            <option value="Sedekah">Sedekah</option>
                            <option value="Zakat Fitrah">Zakat Fitrah</option>
                            <option value="Zakat Mal">Zakat Mal</option>
                            <option value="Donasi Pembangunan">Donasi Pembangunan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Jumlah <span class="text-rose-500">*</span></label>
                        <input type="number" class="input w-full" placeholder="0" x-model="form.jumlah" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Status</label>
                        <select class="input w-full" x-model="form.status">
                            <option value="Menunggu">Menunggu</option>
                            <option value="Terkonfirmasi">Terkonfirmasi</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" class="btn-secondary btn-sm" @click="window['modal-tambah-donasi'].close()">Batal</button>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.modal>
    </div>
</x-layouts.masjid>
