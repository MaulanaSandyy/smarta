<x-layouts.masjid>
    <x-slot:title>Keuangan Masjid</x-slot:title>
    <x-slot:subtitle>Transparansi keuangan dan kas masjid</x-slot:subtitle>

    @php
        $transaksi = [
            ['tgl' => '25/05/2026', 'ket' => 'Infaq Jumat', 'kategori' => 'Infaq', 'masuk' => 1250000, 'keluar' => 0, 'bukti' => true],
            ['tgl' => '24/05/2026', 'ket' => 'Pembelian sajadah baru', 'kategori' => 'Perlengkapan', 'masuk' => 0, 'keluar' => 850000, 'bukti' => true],
            ['tgl' => '23/05/2026', 'ket' => 'Donasi pembangunan', 'kategori' => 'Donasi', 'masuk' => 2000000, 'keluar' => 0, 'bukti' => true],
            ['tgl' => '22/05/2026', 'ket' => 'Listrik dan air', 'kategori' => 'Operasional', 'masuk' => 0, 'keluar' => 600000, 'bukti' => true],
            ['tgl' => '21/05/2026', 'ket' => 'Zakat fitrah', 'kategori' => 'Zakat', 'masuk' => 1500000, 'keluar' => 0, 'bukti' => true],
            ['tgl' => '20/05/2026', 'ket' => 'Konsumsi kajian', 'kategori' => 'Konsumsi', 'masuk' => 0, 'keluar' => 350000, 'bukti' => true],
            ['tgl' => '19/05/2026', 'ket' => 'Kotak amal Jumat', 'kategori' => 'Infaq', 'masuk' => 980000, 'keluar' => 0, 'bukti' => false],
            ['tgl' => '18/05/2026', 'ket' => 'Perbaikan kubah', 'kategori' => 'Perbaikan', 'masuk' => 0, 'keluar' => 2500000, 'bukti' => true],
            ['tgl' => '17/05/2026', 'ket' => 'Infaq Jumat', 'kategori' => 'Infaq', 'masuk' => 1100000, 'keluar' => 0, 'bukti' => true],
            ['tgl' => '16/05/2026', 'ket' => 'Pembersihan masjid', 'kategori' => 'Operasional', 'masuk' => 0, 'keluar' => 200000, 'bukti' => false],
        ];
        $perPage = 5;
    @endphp

    <div x-data="dataKeuangan({{ Js::from($transaksi) }}, {{ $perPage }})">
        {{-- Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="bg-(--surface) border border-border rounded-2xl p-4 sm:p-5 shadow-sm">
                <p class="text-sm text-text-muted mb-1">Saldo Kas Masjid</p>
                <p class="text-2xl sm:text-3xl font-bold text-text-primary" x-text="formatRupiah(saldo)"></p>
                <p class="text-xs text-emerald-600 mt-1">Bulan Mei 2026</p>
            </div>
            <div class="bg-(--surface) border border-border rounded-2xl p-4 sm:p-5 shadow-sm">
                <p class="text-sm text-text-muted mb-1">Total Pemasukan</p>
                <p class="text-2xl sm:text-3xl font-bold text-emerald-600" x-text="formatRupiah(totalMasuk)"></p>
                <p class="text-xs text-text-muted mt-1">Bulan Mei 2026</p>
            </div>
            <div class="bg-(--surface) border border-border rounded-2xl p-4 sm:p-5 shadow-sm">
                <p class="text-sm text-text-muted mb-1">Total Pengeluaran</p>
                <p class="text-2xl sm:text-3xl font-bold text-rose-600" x-text="formatRupiah(totalKeluar)"></p>
                <p class="text-xs text-text-muted mt-1">Bulan Mei 2026</p>
            </div>
        </div>

        {{-- Filter --}}
        <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm mb-6">
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <div class="relative flex-1 max-w-xs">
                    <svg class="absolute left-3 inset-y-0 my-auto w-4 h-4 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    <input type="text" placeholder="Cari keterangan atau kategori..." class="input pl-10" x-model="search" @input="page = 1">
                </div>
                <div class="flex items-center gap-2 flex-wrap">
                    <div class="flex items-center gap-1.5">
                        <button @click="setFilter('typeFilter', '')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="typeFilter === '' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Semua</button>
                        <button @click="setFilter('typeFilter', 'masuk')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="typeFilter === 'masuk' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Pemasukan</button>
                        <button @click="setFilter('typeFilter', 'keluar')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="typeFilter === 'keluar' ? 'bg-rose-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Pengeluaran</button>
                    </div>
                    <span class="w-px h-5 bg-border hidden sm:block"></span>
                    <template x-for="k in kategoriList" :key="k">
                        <button @click="setFilter('kategoriFilter', kategoriFilter === k ? '' : k)" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="kategoriFilter === k ? 'bg-emerald-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'" x-text="k"></button>
                    </template>
                    <button @click="resetFilters()" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors text-text-muted hover:text-rose-600 hover:bg-rose-50" x-show="search || kategoriFilter || typeFilter">
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
                        <span class="hidden sm:inline">Tambah</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Cards --}}
        <div class="block sm:hidden space-y-3 mb-6">
            <template x-if="filteredItems.length === 0">
                <div class="bg-(--surface) border border-border rounded-2xl p-8 text-center">
                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <p class="text-sm text-text-muted">Tidak ada transaksi yang cocok</p>
                    <button @click="resetFilters()" class="btn-primary btn-sm mt-3">Reset Filter</button>
                </div>
            </template>
            <template x-for="(item, index) in pagedItems" :key="index">
                <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <p class="text-xs text-text-muted" x-text="item.tgl"></p>
                            <p class="text-sm font-semibold text-text-primary mt-0.5" x-text="item.ket"></p>
                        </div>
                        <span class="badge-slate text-[10px] px-2 py-0.5 shrink-0" x-text="item.kategori"></span>
                    </div>
                    <div class="flex items-center justify-between mt-2">
                        <div>
                            <template x-if="item.masuk > 0">
                                <p class="text-sm font-bold text-emerald-600" x-text="'+ ' + formatRupiah(item.masuk)"></p>
                            </template>
                            <template x-if="item.keluar > 0">
                                <p class="text-sm font-bold text-rose-600" x-text="'- ' + formatRupiah(item.keluar)"></p>
                            </template>
                        </div>
                        <button class="btn-ghost btn-sm" @click="detail(item)">Detail</button>
                    </div>
                </div>
            </template>

            <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm" x-show="filteredItems.length > 0">
                <div class="flex flex-col items-center gap-3">
                    <p class="text-sm text-text-muted">Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> transaksi</p>
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
                            <th class="table-header">Keterangan</th>
                            <th class="table-header">Kategori</th>
                            <th class="table-header text-right">Pemasukan</th>
                            <th class="table-header text-right">Pengeluaran</th>
                            <th class="table-header">Bukti</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <template x-if="filteredItems.length === 0">
                            <tr>
                                <td colspan="6" class="table-cell text-center py-12">
                                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    <p class="text-sm text-text-muted">Tidak ada transaksi yang cocok</p>
                                    <button @click="resetFilters()" class="btn-primary btn-sm mt-2">Reset Filter</button>
                                </td>
                            </tr>
                        </template>
                        <template x-for="(item, index) in pagedItems" :key="index">
                            <tr class="hover:bg-surface-secondary transition-colors">
                                <td class="table-cell text-xs" x-text="item.tgl"></td>
                                <td class="table-cell font-medium text-text-primary" x-text="item.ket"></td>
                                <td class="table-cell"><span class="badge-slate text-[10px] px-2 py-0.5" x-text="item.kategori"></span></td>
                                <td class="table-cell text-right font-medium text-emerald-600">
                                    <template x-if="item.masuk > 0"><span x-text="formatRupiah(item.masuk)"></span></template>
                                    <template x-if="item.masuk === 0"><span class="text-text-muted">-</span></template>
                                </td>
                                <td class="table-cell text-right font-medium text-rose-600">
                                    <template x-if="item.keluar > 0"><span x-text="formatRupiah(item.keluar)"></span></template>
                                    <template x-if="item.keluar === 0"><span class="text-text-muted">-</span></template>
                                </td>
                                <td class="table-cell">
                                    <template x-if="item.bukti">
                                        <button class="text-emerald-600 hover:text-emerald-700 text-sm font-medium" @click="detail(item)">Lihat</button>
                                    </template>
                                    <template x-if="!item.bukti">
                                        <span class="text-text-muted text-xs">-</span>
                                    </template>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 px-4 sm:px-6 py-3 border-t border-border" x-show="filteredItems.length > 0">
                <p class="text-sm text-text-muted">Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> transaksi</p>
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
        <x-ui.modal name="detail-keuangan" header="Detail Transaksi">
            <div x-show="selectedItem" class="space-y-4">
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-text-muted block text-xs">Tanggal</span>
                        <span class="text-text-primary font-medium" x-text="selectedItem.tgl"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Kategori</span>
                        <span class="text-text-primary" x-text="selectedItem.kategori"></span>
                    </div>
                    <div class="col-span-2">
                        <span class="text-text-muted block text-xs">Keterangan</span>
                        <span class="text-text-primary font-medium" x-text="selectedItem.ket"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Pemasukan</span>
                        <span class="text-emerald-600 font-semibold">
                            <template x-if="selectedItem.masuk > 0"><span x-text="formatRupiah(selectedItem.masuk)"></span></template>
                            <template x-if="selectedItem.masuk === 0"><span class="text-text-muted">-</span></template>
                        </span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Pengeluaran</span>
                        <span class="text-rose-600 font-semibold">
                            <template x-if="selectedItem.keluar > 0"><span x-text="formatRupiah(selectedItem.keluar)"></span></template>
                            <template x-if="selectedItem.keluar === 0"><span class="text-text-muted">-</span></template>
                        </span>
                    </div>
                    <div class="col-span-2">
                        <span class="text-text-muted block text-xs">Bukti</span>
                        <template x-if="selectedItem.bukti">
                            <span class="text-emerald-600 text-sm font-medium">Tersedia</span>
                        </template>
                        <template x-if="!selectedItem.bukti">
                            <span class="text-text-muted text-sm">Tidak ada</span>
                        </template>
                    </div>
                </div>
            </div>
        </x-ui.modal>

        {{-- Modal Tambah --}}
        <x-ui.modal name="tambah-keuangan" header="Tambah Transaksi">
            <form class="space-y-4" @submit.prevent="tambahTransaksi">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Keterangan <span class="text-rose-500">*</span></label>
                    <input type="text" class="input w-full" placeholder="Deskripsi transaksi" x-model="form.ket" required>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Tanggal</label>
                        <input type="text" class="input w-full" placeholder="DD/MM/YYYY" x-model="form.tgl">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Kategori</label>
                        <select class="input w-full" x-model="form.kategori">
                            <option value="Infaq">Infaq</option>
                            <option value="Donasi">Donasi</option>
                            <option value="Zakat">Zakat</option>
                            <option value="Operasional">Operasional</option>
                            <option value="Perlengkapan">Perlengkapan</option>
                            <option value="Konsumsi">Konsumsi</option>
                            <option value="Perbaikan">Perbaikan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Pemasukan</label>
                        <input type="number" class="input w-full" placeholder="0" x-model="form.masuk">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Pengeluaran</label>
                        <input type="number" class="input w-full" placeholder="0" x-model="form.keluar">
                    </div>
                </div>
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" class="btn-secondary btn-sm" @click="window['modal-tambah-keuangan'].close()">Batal</button>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.modal>
    </div>
</x-layouts.masjid>
