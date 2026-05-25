<x-layouts.rt>
    <x-slot:title>Pengajuan Surat</x-slot:title>
    <x-slot:subtitle>Kelola pengajuan surat warga</x-slot:subtitle>

    <div x-data="dataSurat({{ Js::from($pengajuanSurat->items()) }}, {{ $pengajuanSurat->perPage() }})">
        {{-- Filters --}}
        <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm mb-6">
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <div class="relative flex-1 max-w-md">
                    <svg class="absolute left-3 inset-y-0 my-auto w-4 h-4 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    <input type="text" placeholder="Cari nomor, pemohon, atau jenis surat..." class="input pl-10" x-model="search" @input="page = 1">
                </div>
                <div class="flex items-center gap-1.5 flex-wrap">
                    <button @click="setFilter('')"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            :class="statusFilter === '' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                        Semua
                    </button>
                    <button @click="setFilter('Menunggu')"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            :class="statusFilter === 'Menunggu' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                        Menunggu
                    </button>
                    <button @click="setFilter('Diproses')"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            :class="statusFilter === 'Diproses' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                        Diproses
                    </button>
                    <button @click="setFilter('Selesai')"
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            :class="statusFilter === 'Selesai' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                        Selesai
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
                    <p class="text-sm text-text-muted">Tidak ada surat yang cocok dengan filter</p>
                    <button @click="resetFilters()" class="btn-primary btn-sm mt-3">Reset Filter</button>
                </div>
            </template>
            <template x-for="(item, index) in pagedItems" :key="index">
                <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm">
                    <div class="flex items-start gap-3 mb-3">
                        <div class="w-10 h-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-sm font-semibold flex-shrink-0" x-text="item.pemohon.charAt(0)"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-mono font-medium text-primary-600" x-text="item.no"></p>
                            <p class="text-sm font-semibold text-text-primary mt-0.5" x-text="item.pemohon"></p>
                            <span class="text-[10px] px-2 py-0.5 rounded-full font-medium inline-block mt-1" :class="statusClass(item.status)" x-text="item.status"></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <div>
                            <span class="text-text-muted block">Jenis Surat</span>
                            <span class="text-text-primary" x-text="item.jenis"></span>
                        </div>
                        <div>
                            <span class="text-text-muted block">Tanggal</span>
                            <span class="text-text-primary" x-text="item.tgl"></span>
                        </div>
                    </div>
                </div>
            </template>

            <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm" x-show="filteredItems.length > 0">
                <div class="flex flex-col items-center gap-3">
                    <p class="text-sm text-text-muted">
                        Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> surat
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
                            <th class="table-header">No. Surat</th>
                            <th class="table-header">Pemohon</th>
                            <th class="table-header">Jenis Surat</th>
                            <th class="table-header">Tanggal</th>
                            <th class="table-header">Status</th>
                            <th class="table-header text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <template x-if="filteredItems.length === 0">
                            <tr>
                                <td colspan="6" class="table-cell text-center py-12">
                                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    <p class="text-sm text-text-muted">Tidak ada surat yang cocok dengan filter</p>
                                    <button @click="resetFilters()" class="btn-primary btn-sm mt-2">Reset Filter</button>
                                </td>
                            </tr>
                        </template>
                        <template x-for="(item, index) in pagedItems" :key="index">
                            <tr class="hover:bg-surface-secondary transition-colors">
                                <td class="table-cell font-mono text-xs font-medium text-text-primary" x-text="item.no"></td>
                                <td class="table-cell">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-xs font-semibold" x-text="item.pemohon.charAt(0)"></div>
                                        <span class="text-text-primary" x-text="item.pemohon"></span>
                                    </div>
                                </td>
                                <td class="table-cell" x-text="item.jenis"></td>
                                <td class="table-cell" x-text="item.tgl"></td>
                                <td class="table-cell">
                                    <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" :class="statusClass(item.status)" x-text="item.status"></span>
                                </td>
                                <td class="table-cell text-right">
                                    <button class="btn-ghost btn-sm">Detail</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 px-4 sm:px-6 py-3 border-t border-border" x-show="filteredItems.length > 0">
                <p class="text-sm text-text-muted">
                    Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> surat
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
