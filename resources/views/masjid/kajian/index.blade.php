<x-layouts.masjid>
    <x-slot:title>Jadwal Kajian & Sholat</x-slot:title>
    <x-slot:subtitle>Kelola jadwal imam, khatib, dan kajian rutin</x-slot:subtitle>

    <div x-data="dataKajian()" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6">
                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <div class="relative flex-1 sm:flex-initial">
                        <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" x-model="search" placeholder="Cari kajian..." class="input pl-10 text-sm py-1.5 w-full sm:w-48">
                    </div>
                    <select x-model="filterBadge" class="input text-sm py-1.5 w-auto">
                        <option value="Semua">Semua</option>
                        <template x-for="b in badgeList" :key="b">
                            <option x-text="b" :value="b"></option>
                        </template>
                    </select>
                </div>
                <button @click="bukaTambah()" class="btn-primary btn-sm w-full sm:w-auto">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span class="hidden sm:inline">Tambah Kajian</span>
                    <span class="sm:hidden">Tambah</span>
                </button>
            </div>

            <div class="space-y-4">
                <template x-for="item in paginated" :key="item.judul">
                    <div class="card p-4">
                        <div class="flex items-start gap-4">
                            <div class="min-w-[60px] text-center">
                                <p class="text-xs font-semibold text-text-muted uppercase" x-text="item.hari.substring(0, 3)"></p>
                                <div class="w-px h-8 bg-border mx-auto mt-2"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <h3 class="text-sm font-semibold text-text-primary" x-text="item.judul"></h3>
                                        <div class="flex items-center gap-3 mt-1 text-xs text-text-muted flex-wrap">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <span x-text="item.waktu"></span>
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                                <span x-text="item.pemateri"></span>
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                <span x-text="item.tempat"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="shrink-0" x-text="item.badge" :class="badgeClass(item.badge)"></span>
                                </div>
                                <div class="mt-2 flex gap-2">
                                    <button @click="lihat(item)" class="text-xs text-emerald-600 hover:text-emerald-700 font-medium">Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template x-if="filtered.length === 0">
                    <div class="text-center py-12">
                        <svg class="w-12 h-12 mx-auto text-text-muted/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        <p class="text-text-muted mt-3 text-sm">Tidak ada kajian ditemukan</p>
                    </div>
                </template>
            </div>

            <div class="flex items-center justify-between mt-4" x-show="filtered.length > perPage">
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

        <div class="space-y-6">
            <div class="card p-4">
                <div class="flex items-center gap-2 mb-3">
                    <div class="flex-1 h-2 rounded-full bg-surface-secondary overflow-hidden">
                        <div class="h-full rounded-full bg-emerald-500" :style="'width: ' + (totalKajian > 0 ? (totalRutin / totalKajian * 100) : 0) + '%'"></div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-3 text-center mb-4">
                    <div>
                        <p class="text-lg font-bold text-text-primary" x-text="totalKajian"></p>
                        <p class="text-[10px] text-text-muted">Total</p>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-emerald-600" x-text="totalRutin"></p>
                        <p class="text-[10px] text-text-muted">Rutin</p>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-amber-600" x-text="totalMingguan"></p>
                        <p class="text-[10px] text-text-muted">Berkala</p>
                    </div>
                </div>
                <h3 class="text-base font-semibold text-text-primary mb-3">Jadwal Sholat Hari Ini</h3>
                <div class="space-y-3">
                    <template x-for="(s, i) in sholat" :key="s.name">
                        <div class="flex items-center justify-between py-2" :class="i < sholat.length - 1 ? 'border-b border-border' : ''">
                            <div>
                                <p class="text-sm font-medium text-text-primary" x-text="s.name"></p>
                                <p class="text-xs text-text-muted">Imam: <span x-text="s.imam"></span></p>
                            </div>
                            <span class="text-lg font-bold text-emerald-600" x-text="s.time"></span>
                        </div>
                    </template>
                </div>
            </div>

            <div class="card p-4">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-base font-semibold text-text-primary">Jadwal Khatib</h3>
                    <button @click="bukaKhatib()" class="btn-secondary btn-sm">Atur</button>
                </div>
                <div class="space-y-2">
                    <template x-for="(k, i) in khatib" :key="i">
                        <div class="p-3 rounded-xl bg-surface-secondary">
                            <div class="flex items-center justify-between">
                                <span class="badge-slate text-[10px]" x-text="k.tgl"></span>
                                <span class="badge-primary text-[10px]">Jumat</span>
                            </div>
                            <p class="text-sm font-medium text-text-primary mt-2" x-text="k.khatib"></p>
                            <p class="text-xs text-text-muted mt-0.5" x-text="k.tema"></p>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <x-ui.modal name="detail-kajian" header="Detail Kajian">
            <template x-if="selectedItem">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-lg font-bold" x-text="selectedItem.judul.charAt(0)"></div>
                        <div>
                            <h3 class="text-lg font-semibold text-text-primary" x-text="selectedItem.judul"></h3>
                            <span x-text="selectedItem.badge" :class="badgeClass(selectedItem.badge)" class="inline-block mt-1"></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div><span class="text-text-muted">Hari</span><p class="font-medium text-text-primary" x-text="selectedItem.hari"></p></div>
                        <div><span class="text-text-muted">Waktu</span><p class="font-medium text-text-primary" x-text="selectedItem.waktu"></p></div>
                        <div><span class="text-text-muted">Pemateri</span><p class="font-medium text-text-primary" x-text="selectedItem.pemateri"></p></div>
                        <div><span class="text-text-muted">Tempat</span><p class="font-medium text-text-primary" x-text="selectedItem.tempat"></p></div>
                    </div>
                </div>
            </template>
        </x-ui.modal>

        <x-ui.modal name="tambah-kajian" header="Tambah Kajian">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Hari *</label>
                    <select x-model="form.hari" class="input w-full text-sm">
                        <option value="">Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Judul Kajian *</label>
                    <input type="text" x-model="form.judul" class="input w-full text-sm" placeholder="Masukkan judul">
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Waktu</label>
                    <input type="text" x-model="form.waktu" class="input w-full text-sm" placeholder="Contoh: Ba'da Maghrib">
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Pemateri</label>
                    <input type="text" x-model="form.pemateri" class="input w-full text-sm" placeholder="Nama pemateri">
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Tempat</label>
                    <input type="text" x-model="form.tempat" class="input w-full text-sm" placeholder="Lokasi kajian">
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Kategori</label>
                    <select x-model="form.badge" class="input w-full text-sm">
                        <option value="Rutin">Rutin</option>
                        <option value="Remaja">Remaja</option>
                        <option value="Khatib">Khatib</option>
                        <option value="Mingguan">Mingguan</option>
                        <option value="Bulanan">Bulanan</option>
                    </select>
                </div>
                <div class="flex gap-2 justify-end pt-2">
                    <button @click="window['modal-tambah-kajian'].close()" class="btn-secondary btn-sm">Batal</button>
                    <button @click="simpanKajian()" class="btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </x-ui.modal>

        <x-ui.modal name="atur-khatib" header="Atur Jadwal Khatib">
            <div class="space-y-4">
                <template x-for="(k, i) in khatib" :key="i">
                    <div class="flex items-center justify-between p-3 rounded-xl bg-surface-secondary">
                        <div>
                            <p class="text-sm font-medium text-text-primary" x-text="k.khatib"></p>
                            <p class="text-xs text-text-muted" x-text="k.tgl + ' — ' + k.tema"></p>
                        </div>
                        <button class="text-xs text-rose-600 hover:text-rose-700 font-medium">Hapus</button>
                    </div>
                </template>
                <p class="text-xs text-text-muted text-center">Fitur kelola khatib akan datang</p>
            </div>
        </x-ui.modal>
    </div>
</x-layouts.masjid>
