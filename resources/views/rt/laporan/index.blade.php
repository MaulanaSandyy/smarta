<x-layouts.rt>
    <x-slot:title>Laporan & Aspirasi</x-slot:title>
    <x-slot:subtitle>Laporan dan aspirasi dari warga RT 01</x-slot:subtitle>

    <div x-data="dataLaporan({{ Js::from($laporan->items()) }}, {{ $laporan->perPage() }})">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Left: Daftar Laporan --}}
            <div class="lg:col-span-2 space-y-4">
                {{-- Filter Bar --}}
                <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm">
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <div class="relative flex-1 max-w-xs">
                            <svg class="absolute left-3 inset-y-0 my-auto w-4 h-4 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                            <input type="text" placeholder="Cari judul atau warga..." class="input pl-10" x-model="search" @input="page = 1">
                        </div>
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <button @click="setFilter('')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="statusFilter === '' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Semua</button>
                            <button @click="setFilter('Menunggu')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="statusFilter === 'Menunggu' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Menunggu</button>
                            <button @click="setFilter('Diproses')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="statusFilter === 'Diproses' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Diproses</button>
                            <button @click="setFilter('Selesai')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="statusFilter === 'Selesai' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Selesai</button>
                            <button @click="setFilter('Dibatalkan')" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors" :class="statusFilter === 'Dibatalkan' ? 'bg-primary-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">Dibatalkan</button>
                            <button @click="resetFilters()" class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors text-text-muted hover:text-rose-600 hover:bg-rose-50" x-show="search || statusFilter">
                                <svg class="w-3.5 h-3.5 inline-block mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Empty State --}}
                <template x-if="filteredItems.length === 0">
                    <div class="bg-(--surface) border border-border rounded-2xl p-8 text-center">
                        <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <p class="text-sm text-text-muted">Tidak ada laporan yang cocok</p>
                        <button @click="resetFilters()" class="btn-primary btn-sm mt-3">Reset Filter</button>
                    </div>
                </template>

                {{-- Laporan Cards --}}
                <template x-for="(item, index) in pagedItems" :key="index">
                    <div class="card">
                        <div class="card-body">
                            <div class="flex items-start gap-3 sm:gap-4">
                                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-sm font-semibold flex-shrink-0" x-text="item.warga.charAt(0)"></div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-2 mb-1">
                                        <div>
                                            <h3 class="text-sm font-semibold text-text-primary" x-text="item.judul"></h3>
                                            <p class="text-xs text-text-muted mt-0.5"><span x-text="item.warga"></span> &middot; <span x-text="item.tgl"></span></p>
                                        </div>
                                        <span class="text-[10px] px-2 py-0.5 rounded-full font-medium flex-shrink-0 whitespace-nowrap" :class="statusClass(item.status)" x-text="item.status"></span>
                                    </div>
                                    <p class="text-sm text-text-secondary mt-2 line-clamp-3" x-text="item.isi"></p>
                                    <div class="flex items-center gap-2 mt-3">
                                        <span class="badge-primary text-[10px] px-2 py-0.5" x-text="item.kategori"></span>
                                        <button @click="tanggapi(item)" class="text-sm text-primary-600 hover:text-primary-700 font-medium ml-auto transition-colors">Tanggapi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- Pagination --}}
                <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm" x-show="filteredItems.length > 0">
                    <div class="flex flex-col items-center gap-3">
                        <p class="text-sm text-text-muted">
                            Menampilkan <span x-text="start"></span>-<span x-text="end"></span> dari <span x-text="filteredItems.length"></span> laporan
                        </p>
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

            {{-- Right: Sidebar --}}
            <div class="space-y-6">
                {{-- Statistik --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-base font-semibold text-text-primary">Statistik</h3>
                    </div>
                    <div class="card-body space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-text-secondary">Total Laporan</span>
                            <span class="text-sm font-semibold text-text-primary" x-text="items.length"></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-text-secondary">Selesai</span>
                            <span class="text-sm font-semibold text-emerald-600" x-text="totalSelesai"></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-text-secondary">Diproses</span>
                            <span class="text-sm font-semibold text-amber-600" x-text="totalDiproses"></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-text-secondary">Menunggu</span>
                            <span class="text-sm font-semibold text-text-muted" x-text="totalMenunggu"></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-text-secondary">Dibatalkan</span>
                            <span class="text-sm font-semibold text-rose-600" x-text="totalDibatalkan"></span>
                        </div>
                    </div>
                </div>

                {{-- Kategori --}}
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-base font-semibold text-text-primary">Kategori</h3>
                    </div>
                    <div class="card-body space-y-3">
                        <template x-for="k in ['Infrastruktur', 'Kebersihan', 'Keamanan', 'Kesehatan', 'Lainnya']" :key="k">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full" :class="{
                                        'bg-blue-500': k === 'Infrastruktur',
                                        'bg-emerald-500': k === 'Kebersihan',
                                        'bg-rose-500': k === 'Keamanan',
                                        'bg-cyan-500': k === 'Kesehatan',
                                        'bg-slate-400': k === 'Lainnya'
                                    }"></div>
                                    <span class="text-sm text-text-secondary" x-text="k"></span>
                                </div>
                                <span class="text-sm font-medium text-text-primary" x-text="items.filter(i => i.kategori === k).length"></span>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Tanggapi Laporan --}}
        <x-ui.modal name="tanggapi-laporan" header="Tanggapi Laporan">
            <div x-show="selectedItem" class="space-y-5">
                {{-- Detail Laporan --}}
                <div class="bg-surface-secondary rounded-xl p-4 space-y-2 text-sm">
                    <div>
                        <span class="text-text-muted text-xs block">Judul</span>
                        <span class="text-text-primary font-medium" x-text="selectedItem.judul"></span>
                    </div>
                    <div>
                        <span class="text-text-muted text-xs block">Warga</span>
                        <span class="text-text-primary" x-text="selectedItem.warga"></span>
                    </div>
                    <div>
                        <span class="text-text-muted text-xs block">Isi Laporan</span>
                        <p class="text-text-secondary mt-0.5" x-text="selectedItem.isi"></p>
                    </div>
                </div>

                {{-- Tanggapan Sebelumnya --}}
                <div x-show="selectedItem.tanggapan && selectedItem.tanggapan !== ''">
                    <span class="text-xs text-text-muted block mb-1.5">Tanggapan Sebelumnya</span>
                    <div class="bg-primary-50 dark:bg-primary-900/20 border border-primary-100 dark:border-primary-800 rounded-xl p-3">
                        <p class="text-sm text-text-secondary" x-text="selectedItem.tanggapan"></p>
                    </div>
                </div>

                {{-- Form Tanggapan --}}
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Tanggapan Baru</label>
                    <textarea x-model="tanggapanText" rows="4" class="input w-full resize-none" placeholder="Tulis tanggapan untuk laporan ini..."></textarea>
                </div>

                {{-- Status --}}
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Ubah Status</label>
                    <select x-model="tanggapanStatus" class="input w-full">
                        <template x-for="s in statuses" :key="s">
                            <option :value="s" x-text="s" :selected="s === selectedItem.status"></option>
                        </template>
                    </select>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-2 justify-end pt-2 border-t border-border">
                    <button class="btn-secondary" @click="window['modal-tanggapi-laporan'].close()">Batal</button>
                    <button class="btn-primary" @click="kirimTanggapan()">Kirim Tanggapan</button>
                </div>
            </div>
        </x-ui.modal>
    </div>
</x-layouts.rt>
