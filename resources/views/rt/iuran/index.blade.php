<x-layouts.rt>
    <x-slot:title>Pembayaran Iuran</x-slot:title>
    <x-slot:subtitle>Kelola iuran bulanan warga RT 01</x-slot:subtitle>

    @php
        $iuran = [
            ['keluarga' => 'Budi Santoso', 'jumlah' => 'Rp 50.000', 'tgl' => '25/05/2026', 'metode' => 'Tunai', 'status' => 'Lunas', 'bulan' => 'Mei', 'tahun' => '2026', 'ket' => 'Pembayaran iuran bulan Mei 2026. Dibayar tunai ke Bendahara RT.'],
            ['keluarga' => 'Siti Rahma', 'jumlah' => 'Rp 50.000', 'tgl' => '24/05/2026', 'metode' => 'Transfer', 'status' => 'Lunas', 'bulan' => 'Mei', 'tahun' => '2026', 'ket' => 'Transfer BCA a.n. Siti Rahma. Bukti transfer sudah dikonfirmasi.'],
            ['keluarga' => 'Ahmad Fauzi', 'jumlah' => 'Rp 50.000', 'tgl' => '-', 'metode' => '-', 'status' => 'Belum', 'bulan' => 'Mei', 'tahun' => '2026', 'ket' => 'Belum melakukan pembayaran iuran bulan Mei 2026.'],
            ['keluarga' => 'Rina Wijaya', 'jumlah' => 'Rp 50.000', 'tgl' => '23/05/2026', 'metode' => 'Tunai', 'status' => 'Lunas', 'bulan' => 'Mei', 'tahun' => '2026', 'ket' => 'Pembayaran iuran bulan Mei 2026. Dibayar langsung ke Bendahara.'],
            ['keluarga' => 'Doni Prasetyo', 'jumlah' => 'Rp 25.000', 'tgl' => '-', 'metode' => '-', 'status' => 'Belum', 'bulan' => 'Mei', 'tahun' => '2026', 'ket' => 'Pembayaran belum dilakukan. Masih ada tunggakan Rp 25.000.'],
            ['keluarga' => 'Desi Ratnasari', 'jumlah' => 'Rp 50.000', 'tgl' => '22/05/2026', 'metode' => 'Transfer', 'status' => 'Lunas', 'bulan' => 'Mei', 'tahun' => '2026', 'ket' => 'Transfer Mandiri a.n. Desi Ratnasari. Terkonfirmasi.'],
            ['keluarga' => 'Hendra Gunawan', 'jumlah' => 'Rp 50.000', 'tgl' => '21/05/2026', 'metode' => 'Tunai', 'status' => 'Lunas', 'bulan' => 'Mei', 'tahun' => '2026', 'ket' => 'Dibayar tunai saat rapat warga.'],
            ['keluarga' => 'Fitriani', 'jumlah' => 'Rp 50.000', 'tgl' => '-', 'metode' => '-', 'status' => 'Belum', 'bulan' => 'Mei', 'tahun' => '2026', 'ket' => 'Belum membayar. Sedang di luar kota.'],
            ['keluarga' => 'Agus Supriyadi', 'jumlah' => 'Rp 50.000', 'tgl' => '20/04/2026', 'metode' => 'Transfer', 'status' => 'Lunas', 'bulan' => 'April', 'tahun' => '2026', 'ket' => 'Pembayaran iuran bulan April 2026. Transfer BSI.'],
            ['keluarga' => 'Dewi Sartika', 'jumlah' => 'Rp 50.000', 'tgl' => '19/04/2026', 'metode' => 'Tunai', 'status' => 'Lunas', 'bulan' => 'April', 'tahun' => '2026', 'ket' => 'Dibayar tunai melalui Ketua RT.'],
            ['keluarga' => 'Eko Prasetyo', 'jumlah' => 'Rp 50.000', 'tgl' => '-', 'metode' => '-', 'status' => 'Belum', 'bulan' => 'April', 'tahun' => '2026', 'ket' => 'Tunggakan 2 bulan. Akan diingatkan.'],
            ['keluarga' => 'Ratna Dewi', 'jumlah' => 'Rp 50.000', 'tgl' => '18/04/2026', 'metode' => 'Transfer', 'status' => 'Lunas', 'bulan' => 'April', 'tahun' => '2026', 'ket' => 'Transfer BCA. Konfirmasi sudah diterima.'],
            ['keluarga' => 'Irfan Hakim', 'jumlah' => 'Rp 50.000', 'tgl' => '25/03/2026', 'metode' => 'Tunai', 'status' => 'Lunas', 'bulan' => 'Maret', 'tahun' => '2026', 'ket' => 'Pembayaran iuran bulan Maret 2026.'],
            ['keluarga' => 'Mega Wati', 'jumlah' => 'Rp 50.000', 'tgl' => '-', 'metode' => '-', 'status' => 'Belum', 'bulan' => 'Maret', 'tahun' => '2026', 'ket' => 'Belum membayar iuran bulan Maret.'],
            ['keluarga' => 'Rudi Hartono', 'jumlah' => 'Rp 50.000', 'tgl' => '24/03/2026', 'metode' => 'Tunai', 'status' => 'Lunas', 'bulan' => 'Maret', 'tahun' => '2026', 'ket' => 'Dibayar langsung ke Bendahara RT.'],
        ];
        $perPage = 5;
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    @endphp

    <div x-data="dataIuran({{ Js::from($iuran) }}, {{ $perPage }})">
        {{-- Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="stats-card">
                <div class="flex items-start justify-between mb-4">
                    <div class="stats-card-icon bg-blue-100 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-text-primary" x-text="formatRupiah(totalIuranBulanIni)"></p>
                <p class="text-sm text-text-muted mt-1">Total Iuran Bulan Ini</p>
            </div>
            <div class="stats-card">
                <div class="flex items-start justify-between mb-4">
                    <div class="stats-card-icon bg-emerald-100 text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-text-primary" x-text="totalLunas"></p>
                <p class="text-sm text-text-muted mt-1">Warga Lunas</p>
            </div>
            <div class="stats-card">
                <div class="flex items-start justify-between mb-4">
                    <div class="stats-card-icon bg-amber-100 text-amber-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-text-primary" x-text="totalBelum"></p>
                <p class="text-sm text-text-muted mt-1">Belum Lunas</p>
            </div>
            <div class="stats-card">
                <div class="flex items-start justify-between mb-4">
                    <div class="stats-card-icon bg-cyan-100 text-cyan-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-text-primary"><span x-text="persentaseLunas"></span>%</p>
                <p class="text-sm text-text-muted mt-1">Persentase</p>
            </div>
        </div>

        {{-- Filters --}}
        <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm mb-6">
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <div class="relative flex-1 max-w-xs">
                    <svg class="absolute left-3 inset-y-0 my-auto w-4 h-4 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    <input type="text" placeholder="Cari keluarga..." class="input pl-10" x-model="search" @input="page = 1">
                </div>
                <div class="flex items-center gap-2 flex-wrap">
                    <input type="text" placeholder="Tgl (dd/mm)" class="input text-sm py-1.5 w-28" x-model="dayFilter" @input="page = 1">
                    <select class="input text-sm py-1.5 w-auto" x-model="monthFilter" @change="page = 1">
                        <option value="">Semua Bulan</option>
                        @foreach ($months as $m)
                            <option value="{{ $m }}">{{ $m }}</option>
                        @endforeach
                    </select>
                    <select class="input text-sm py-1.5 w-auto" x-model="yearFilter" @change="page = 1">
                        <option value="">Semua Tahun</option>
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                    </select>
                    <div class="flex items-center gap-1.5">
                        <button @click="setFilter('statusFilter', '')"
                                class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                                :class="statusFilter === '' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                            Semua
                        </button>
                        <button @click="setFilter('statusFilter', 'Lunas')"
                                class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                                :class="statusFilter === 'Lunas' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                            Lunas
                        </button>
                        <button @click="setFilter('statusFilter', 'Belum')"
                                class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                                :class="statusFilter === 'Belum' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                            Belum
                        </button>
                    </div>
                    <button @click="resetFilters()"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors text-text-muted hover:text-rose-600 hover:bg-rose-50"
                            x-show="search || dayFilter || statusFilter || monthFilter || yearFilter">
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

        {{-- Mobile Card View --}}
        <div class="block sm:hidden space-y-3 mb-6">
            <template x-if="filteredItems.length === 0">
                <div class="bg-(--surface) border border-border rounded-2xl p-8 text-center">
                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <p class="text-sm text-text-muted">Tidak ada data iuran yang cocok</p>
                    <button @click="resetFilters()" class="btn-primary btn-sm mt-3">Reset Filter</button>
                </div>
            </template>
            <template x-for="(item, index) in pagedItems" :key="index">
                <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <p class="text-sm font-semibold text-text-primary" x-text="item.keluarga"></p>
                            <p class="text-xs text-text-muted mt-0.5">Iuran <span x-text="item.bulan"></span> <span x-text="item.tahun"></span></p>
                        </div>
                        <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" :class="statusClass(item.status)" x-text="item.status"></span>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div>
                            <span class="text-text-muted block">Jumlah</span>
                            <span class="text-text-primary font-semibold" x-text="item.jumlah"></span>
                        </div>
                        <div>
                            <span class="text-text-muted block">Tanggal</span>
                            <span class="text-text-primary" x-text="item.tgl"></span>
                        </div>
                        <div>
                            <span class="text-text-muted block">Metode</span>
                            <span class="text-text-primary" x-text="item.metode"></span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mt-3 pt-3 border-t border-border">
                        <button class="btn-ghost btn-sm flex-1 justify-center" @click="selectedItem = item; window['modal-detail-iuran'].open()">Detail</button>
                        <template x-if="item.status === 'Belum'">
                            <button class="btn-primary btn-sm flex-1 justify-center" @click="bayar(item)">Bayar</button>
                        </template>
                    </div>
                </div>
            </template>

            <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm" x-show="filteredItems.length > 0">
                <div class="flex flex-col items-center gap-3">
                    <p class="text-sm text-text-muted">
                        Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> iuran
                    </p>
                    <div class="flex items-center gap-1">
                        <button class="btn-ghost btn-sm p-1.5" :disabled="page === 1" @click="prev()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <template x-for="(p, i) in pages" :key="i">
                            <button class="w-8 h-8 rounded-lg text-sm font-medium transition-colors"
                                    :class="p === page ? 'bg-primary-600 text-white' : 'hover:bg-surface-secondary text-text-secondary'"
                                    x-text="p"
                                    @click="goTo(p)">
                            </button>
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
                            <th class="table-header">Keluarga</th>
                            <th class="table-header">Jumlah</th>
                            <th class="table-header">Tanggal</th>
                            <th class="table-header">Metode</th>
                            <th class="table-header">Status</th>
                            <th class="table-header text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <template x-if="filteredItems.length === 0">
                            <tr>
                                <td colspan="6" class="table-cell text-center py-12">
                                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    <p class="text-sm text-text-muted">Tidak ada data iuran yang cocok</p>
                                    <button @click="resetFilters()" class="btn-primary btn-sm mt-2">Reset Filter</button>
                                </td>
                            </tr>
                        </template>
                        <template x-for="(item, index) in pagedItems" :key="index">
                            <tr class="hover:bg-surface-secondary transition-colors">
                                <td class="table-cell font-medium text-text-primary" x-text="item.keluarga"></td>
                                <td class="table-cell" x-text="item.jumlah"></td>
                                <td class="table-cell" x-text="item.tgl"></td>
                                <td class="table-cell" x-text="item.metode"></td>
                                <td class="table-cell">
                                    <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" :class="statusClass(item.status)" x-text="item.status"></span>
                                </td>
                                <td class="table-cell text-right">
                                    <button class="btn-ghost btn-sm" @click="selectedItem = item; window['modal-detail-iuran'].open()">Detail</button>
                                    <template x-if="item.status === 'Belum'">
                                        <button class="btn-primary btn-sm ml-1" @click="bayar(item)">Bayar</button>
                                    </template>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 px-4 sm:px-6 py-3 border-t border-border" x-show="filteredItems.length > 0">
                <p class="text-sm text-text-muted">
                    Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> iuran
                </p>
                <div class="flex items-center gap-1">
                    <button class="btn-ghost btn-sm p-1.5" :disabled="page === 1" @click="prev()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <template x-for="(p, i) in pages" :key="i">
                        <button class="w-8 h-8 rounded-lg text-sm font-medium transition-colors"
                                :class="p === page ? 'bg-primary-600 text-white' : 'hover:bg-surface-secondary text-text-secondary'"
                                x-text="p"
                                @click="goTo(p)">
                        </button>
                    </template>
                    <button class="btn-ghost btn-sm p-1.5" :disabled="page === totalPages" @click="next()">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Modal Detail Iuran --}}
        <x-ui.modal name="detail-iuran" header="Detail Iuran">
            <div x-show="selectedItem" class="space-y-4">
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-text-muted block text-xs">Keluarga</span>
                        <span class="text-text-primary font-medium" x-text="selectedItem.keluarga"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Jumlah</span>
                        <span class="text-text-primary font-semibold" x-text="selectedItem.jumlah"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Periode</span>
                        <span class="text-text-primary" x-text="selectedItem.bulan + ' ' + selectedItem.tahun"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Status</span>
                        <span class="text-[10px] px-2 py-0.5 rounded-full font-medium inline-block mt-0.5" :class="statusClass(selectedItem.status)" x-text="selectedItem.status"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Tanggal Bayar</span>
                        <span class="text-text-primary" x-text="selectedItem.tgl"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Metode</span>
                        <span class="text-text-primary" x-text="selectedItem.metode"></span>
                    </div>
                </div>
                <div class="pt-3 border-t border-border">
                    <span class="text-text-muted block text-xs mb-1">Keterangan</span>
                    <p class="text-sm text-text-secondary" x-text="selectedItem.ket"></p>
                </div>
            </div>
        </x-ui.modal>

        {{-- Modal Bayar Iuran --}}
        <x-ui.modal name="bayar-iuran" header="Konfirmasi Pembayaran">
            <div x-show="selectedItem" class="space-y-4">
                <p class="text-sm text-text-secondary">Konfirmasi pembayaran iuran untuk:</p>
                <div class="bg-surface-secondary rounded-xl p-4 space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-text-muted">Keluarga</span>
                        <span class="font-medium text-text-primary" x-text="selectedItem.keluarga"></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-text-muted">Periode</span>
                        <span class="text-text-primary" x-text="selectedItem.bulan + ' ' + selectedItem.tahun"></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-text-muted">Jumlah</span>
                        <span class="font-semibold text-text-primary" x-text="selectedItem.jumlah"></span>
                    </div>
                </div>
                <div class="flex items-center gap-2 justify-end pt-2">
                    <button class="btn-secondary" @click="window['modal-bayar-iuran'].close()">Batal</button>
                    <button class="btn-primary" @click="konfirmasiBayar()">Konfirmasi Bayar</button>
                </div>
            </div>
        </x-ui.modal>
    </div>
</x-layouts.rt>
