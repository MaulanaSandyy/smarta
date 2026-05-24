<x-layouts.rt>
    <x-slot:title>Data Warga</x-slot:title>
    <x-slot:subtitle>Kelola data warga RT 01</x-slot:subtitle>

    @php
        $warga = [
            ['name' => 'Budi Santoso', 'nik' => '3273010101900001', 'kk' => '3273010101900001', 'alamat' => 'Jl. Merdeka No. 1, RT 01', 'status' => 'Tetap', 'phone' => '081234567890'],
            ['name' => 'Siti Rahma', 'nik' => '3273010101900002', 'kk' => '3273010101900001', 'alamat' => 'Jl. Merdeka No. 1, RT 01', 'status' => 'Tetap', 'phone' => '081234567891'],
            ['name' => 'Ahmad Fauzi', 'nik' => '3273010101900003', 'kk' => '3273010101900002', 'alamat' => 'Jl. Merdeka No. 2, RT 01', 'status' => 'Tetap', 'phone' => '081234567892'],
            ['name' => 'Rina Wijaya', 'nik' => '3273010101900004', 'kk' => '3273010101900003', 'alamat' => 'Jl. Merdeka No. 3, RT 01', 'status' => 'Kontrakan', 'phone' => '081234567893'],
            ['name' => 'Doni Prasetyo', 'nik' => '3273010101900005', 'kk' => '3273010101900004', 'alamat' => 'Jl. Merdeka No. 4, RT 01', 'status' => 'Kos', 'phone' => '081234567894'],
            ['name' => 'Desi Ratnasari', 'nik' => '3273010101900006', 'kk' => '3273010101900005', 'alamat' => 'Jl. Merdeka No. 5, RT 01', 'status' => 'Tetap', 'phone' => '081234567895'],
            ['name' => 'Hendra Gunawan', 'nik' => '3273010101900007', 'kk' => '3273010101900006', 'alamat' => 'Jl. Merdeka No. 6, RT 01', 'status' => 'Tetap', 'phone' => '081234567896'],
            ['name' => 'Fitriani', 'nik' => '3273010101900008', 'kk' => '3273010101900006', 'alamat' => 'Jl. Merdeka No. 6, RT 01', 'status' => 'Tetap', 'phone' => '081234567897'],
            ['name' => 'Agus Supriyadi', 'nik' => '3273010101900009', 'kk' => '3273010101900007', 'alamat' => 'Jl. Merdeka No. 7, RT 01', 'status' => 'Kontrakan', 'phone' => '081234567898'],
            ['name' => 'Dewi Sartika', 'nik' => '3273010101900010', 'kk' => '3273010101900008', 'alamat' => 'Jl. Merdeka No. 8, RT 01', 'status' => 'Tetap', 'phone' => '081234567899'],
            ['name' => 'Eko Prasetyo', 'nik' => '3273010101900011', 'kk' => '3273010101900009', 'alamat' => 'Jl. Merdeka No. 9, RT 01', 'status' => 'Kos', 'phone' => '081234567900'],
            ['name' => 'Ratna Dewi', 'nik' => '3273010101900012', 'kk' => '3273010101900010', 'alamat' => 'Jl. Merdeka No. 10, RT 01', 'status' => 'Tetap', 'phone' => '081234567901'],
            ['name' => 'Irfan Hakim', 'nik' => '3273010101900013', 'kk' => '3273010101900011', 'alamat' => 'Jl. Merdeka No. 11, RT 01', 'status' => 'Kontrakan', 'phone' => '081234567902'],
            ['name' => 'Mega Wati', 'nik' => '3273010101900014', 'kk' => '3273010101900012', 'alamat' => 'Jl. Merdeka No. 12, RT 01', 'status' => 'Tetap', 'phone' => '081234567903'],
            ['name' => 'Rudi Hartono', 'nik' => '3273010101900015', 'kk' => '3273010101900013', 'alamat' => 'Jl. Merdeka No. 13, RT 01', 'status' => 'Kos', 'phone' => '081234567904'],
        ];
        $perPage = 6;
    @endphp

    <div x-data="{
        page: 1,
        perPage: {{ $perPage }},
        search: '',
        statusFilter: '',
        items: {{ Js::from($warga) }},
        get filteredItems() {
            return this.items.filter(item => {
                const matchSearch = !this.search || item.name.toLowerCase().includes(this.search.toLowerCase()) || item.nik.includes(this.search) || item.phone.includes(this.search);
                const matchStatus = !this.statusFilter || item.status === this.statusFilter;
                return matchSearch && matchStatus;
            });
        },
        get totalPages() { return Math.ceil(this.filteredItems.length / this.perPage) || 1 },
        get pagedItems() { return this.filteredItems.slice((this.page - 1) * this.perPage, this.page * this.perPage) },
        get start() { return this.filteredItems.length ? (this.page - 1) * this.perPage + 1 : 0 },
        get end() { return Math.min(this.page * this.perPage, this.filteredItems.length) },
        get pages() {
            const p = [];
            for (let i = 1; i <= this.totalPages; i++) p.push(i);
            return p;
        },
        statusClass(s) {
            const map = { 'Tetap': 'badge-primary', 'Kontrakan': 'badge-warning', 'Kos': 'badge-slate' };
            return map[s] || 'badge-slate';
        },
        setFilter(status) {
            this.statusFilter = status;
            this.page = 1;
        },
        goTo(p) { if (p >= 1 && p <= this.totalPages) { this.page = p; this.$el.scrollIntoView({ behavior: 'smooth', block: 'start' }) } },
        prev() { this.goTo(this.page - 1) },
        next() { this.goTo(this.page + 1) },
        resetFilters() {
            this.search = '';
            this.statusFilter = '';
            this.page = 1;
        },
        generateTableHTML(includePrintStyles = false) {
            const header = `<table border="1" cellpadding="6" cellspacing="0" style="border-collapse:collapse;width:100%;font-family:Arial,sans-serif;font-size:12px">
                <thead>
                    <tr style="background:#4f46e5;color:white">
                        <th style="text-align:left;padding:8px">Nama</th>
                        <th style="text-align:left;padding:8px">NIK</th>
                        <th style="text-align:left;padding:8px">KK</th>
                        <th style="text-align:left;padding:8px">Alamat</th>
                        <th style="text-align:left;padding:8px">Status</th>
                        <th style="text-align:left;padding:8px">No. Telepon</th>
                    </tr>
                </thead>
                <tbody>`;
            const rows = this.filteredItems.map(item =>
                `<tr>
                    <td style="padding:6px;border:1px solid #ddd">${this.escapeHtml(item.name)}</td>
                    <td style="padding:6px;border:1px solid #ddd">${this.escapeHtml(item.nik)}</td>
                    <td style="padding:6px;border:1px solid #ddd">${this.escapeHtml(item.kk)}</td>
                    <td style="padding:6px;border:1px solid #ddd">${this.escapeHtml(item.alamat)}</td>
                    <td style="padding:6px;border:1px solid #ddd">${this.escapeHtml(item.status)}</td>
                    <td style="padding:6px;border:1px solid #ddd">${this.escapeHtml(item.phone)}</td>
                </tr>`
            ).join('');
            const footer = `</tbody></table>`;
            const title = '<h2 style="font-family:Arial,sans-serif;margin-bottom:16px">Data Warga RT 01</h2>';
            return includePrintStyles
                ? `<div style="padding:20px">${title}<p style="font-size:12px;color:#666;margin-bottom:12px">Dicetak: ${new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</p>${header}${rows}${footer}</div>`
                : `${header}${rows}${footer}`;
        },
        escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        },
        exportExcel() {
            const table = this.generateTableHTML();
            const html = `<html><head><meta charset="UTF-8"><title>Data Warga RT 01</title></head><body>${table}</body></html>`;
            const blob = new Blob([html], { type: 'application/vnd.ms-excel' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `Data_Warga_RT_01_${new Date().toISOString().slice(0,10)}.xls`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        },
        printPDF() {
            const content = this.generateTableHTML(true);
            const style = `@media print{body{margin:0;padding:0}}`;
            const win = window.open('', '_blank');
            win.document.write(`<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Data Warga RT 01</title><style>${style}</style></head><body>${content}</body></html>`);
            win.document.close();
            win.focus();
            setTimeout(() => { win.print(); win.close(); }, 400);
        }
    }">
        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 mb-6">
            <div class="flex items-center gap-3 flex-1 max-w-md">
            </div>
            <div class="flex items-center gap-2">
                <button class="btn-secondary btn-sm flex-1 sm:flex-none justify-center" @click="exportExcel()" title="Export Excel">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    <span>Excel</span>
                </button>
                <button class="btn-secondary btn-sm flex-1 sm:flex-none justify-center" @click="printPDF()" title="Cetak PDF">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    <span>Print</span>
                </button>
                <button class="btn-primary btn-sm flex-1 sm:flex-none justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah
                </button>
            </div>
        </div>

        {{-- Filters --}}
        <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm mb-6">
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <div class="relative flex-1 max-w-md">
                    <svg class="absolute left-3 inset-y-0 my-auto w-4 h-4 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    <input type="text" placeholder="Cari nama, NIK, atau telepon..." class="input pl-10" x-model="search" @input="page = 1">
                </div>
                <div class="flex items-center gap-1.5 flex-wrap" x-data="{ showMore: false }">
                    <button @click="setFilter('')"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            :class="statusFilter === '' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                        Semua
                    </button>
                    <button @click="setFilter('Tetap')"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            :class="statusFilter === 'Tetap' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                        Tetap
                    </button>
                    <button @click="setFilter('Kontrakan')"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            :class="statusFilter === 'Kontrakan' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                        Kontrakan
                    </button>
                    <button @click="setFilter('Kos')"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            :class="statusFilter === 'Kos' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                        Kos
                    </button>
                    <button @click="resetFilters()"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors text-text-muted hover:text-rose-600 hover:bg-rose-50"
                            x-show="search || statusFilter">
                        <svg class="w-3.5 h-3.5 inline-block mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Hapus
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Card View --}}
        <div class="block sm:hidden space-y-3 mb-6">
            <template x-if="filteredItems.length === 0">
                <div class="bg-(--surface) border border-border rounded-2xl p-8 text-center">
                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <p class="text-sm text-text-muted">Tidak ada warga yang cocok dengan filter</p>
                    <button @click="resetFilters()" class="btn-primary btn-sm mt-3">Reset Filter</button>
                </div>
            </template>
            <template x-for="(item, index) in pagedItems" :key="index">
                <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm">
                    <div class="flex items-start gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-sm font-semibold flex-shrink-0" x-text="item.name.charAt(0)"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-text-primary" x-text="item.name"></p>
                            <span class="text-[10px] px-2 py-0.5 rounded-full font-medium inline-block mt-0.5" :class="statusClass(item.status)" x-text="item.status"></span>
                        </div>
                        <div class="flex items-center gap-1 flex-shrink-0">
                            <button class="btn-ghost btn-sm p-1.5" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </button>
                            <button class="btn-ghost btn-sm p-1.5 text-rose-600" title="Hapus">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div>
                            <span class="text-text-muted block">NIK</span>
                            <span class="text-text-primary font-mono" x-text="item.nik"></span>
                        </div>
                        <div>
                            <span class="text-text-muted block">KK</span>
                            <span class="text-text-primary font-mono" x-text="item.kk"></span>
                        </div>
                        <div class="col-span-2">
                            <span class="text-text-muted block">Alamat</span>
                            <span class="text-text-primary" x-text="item.alamat"></span>
                        </div>
                        <div>
                            <span class="text-text-muted block">Telepon</span>
                            <span class="text-text-primary" x-text="item.phone"></span>
                        </div>
                    </div>
                </div>
            </template>

            {{-- Mobile Pagination --}}
            <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm" x-show="filteredItems.length > 0">
                <div class="flex flex-col items-center gap-3">
                    <p class="text-sm text-text-muted">
                        Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> warga
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
                        <template x-if="filteredItems.length === 0">
                            <tr>
                                <td colspan="7" class="table-cell text-center py-12">
                                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    <p class="text-sm text-text-muted">Tidak ada warga yang cocok dengan filter</p>
                                    <button @click="resetFilters()" class="btn-primary btn-sm mt-2">Reset Filter</button>
                                </td>
                            </tr>
                        </template>
                        <template x-for="(item, index) in pagedItems" :key="index">
                            <tr class="hover:bg-surface-secondary transition-colors">
                                <td class="table-cell">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-xs font-semibold" x-text="item.name.charAt(0)"></div>
                                        <span class="font-medium text-text-primary" x-text="item.name"></span>
                                    </div>
                                </td>
                                <td class="table-cell font-mono text-xs" x-text="item.nik"></td>
                                <td class="table-cell font-mono text-xs" x-text="item.kk"></td>
                                <td class="table-cell" x-text="item.alamat"></td>
                                <td class="table-cell">
                                    <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" :class="statusClass(item.status)" x-text="item.status"></span>
                                </td>
                                <td class="table-cell" x-text="item.phone"></td>
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
                        </template>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 px-4 sm:px-6 py-3 border-t border-border" x-show="filteredItems.length > 0">
                <p class="text-sm text-text-muted">
                    Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> warga
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
</x-layouts.rt>
