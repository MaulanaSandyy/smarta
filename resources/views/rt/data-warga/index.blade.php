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
        $total = count($warga);
        $perPage = 6;
    @endphp

    <div x-data="{
        page: 1,
        perPage: {{ $perPage }},
        items: {{ Js::from($warga) }},
        get totalPages() { return Math.ceil(this.items.length / this.perPage) },
        get pagedItems() { return this.items.slice((this.page - 1) * this.perPage, this.page * this.perPage) },
        get start() { return (this.page - 1) * this.perPage + 1 },
        get end() { return Math.min(this.page * this.perPage, this.items.length) },
        get pages() {
            const p = [];
            for (let i = 1; i <= this.totalPages; i++) p.push(i);
            return p;
        },
        statusClass(s) {
            const map = { 'Tetap': 'badge-primary', 'Kontrakan': 'badge-warning', 'Kos': 'badge-slate' };
            return map[s] || 'badge-slate';
        },
        goTo(p) { if (p >= 1 && p <= this.totalPages) { this.page = p; this.$el.scrollIntoView({ behavior: 'smooth', block: 'start' }) } },
        prev() { this.goTo(this.page - 1) },
        next() { this.goTo(this.page + 1) }
    }">
        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 mb-6">
            <div class="flex items-center gap-3 flex-1 max-w-md">
                <div class="relative flex-1">
                    <svg class="absolute left-3 inset-y-0 my-auto w-4 h-4 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    <input type="text" placeholder="Cari warga..." class="input pl-10">
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button class="btn-secondary btn-sm flex-1 sm:flex-none justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Export
                </button>
                <button class="btn-primary btn-sm flex-1 sm:flex-none justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Warga
                </button>
            </div>
        </div>

        {{-- Mobile Card View --}}
        <div class="block sm:hidden space-y-3 mb-6">
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
            <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm">
                <div class="flex flex-col items-center gap-3">
                    <p class="text-sm text-text-muted">
                        Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="items.length"></span> warga
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
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 px-4 sm:px-6 py-3 border-t border-border">
                <p class="text-sm text-text-muted">
                    Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="items.length"></span> warga
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
