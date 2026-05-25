<x-layouts.masjid>
    <x-slot:title>Galeri & Informasi</x-slot:title>
    <x-slot:subtitle>Dokumentasi kegiatan, pengumuman, dan artikel masjid</x-slot:subtitle>

    <div x-data="dataGaleri()">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6">
            <div class="flex items-center gap-2 flex-wrap">
                <button @click="setFilter('Semua')" class="btn-sm" :class="filterType === 'Semua' ? 'btn-primary' : 'btn-ghost'">Semua</button>
                <button @click="setFilter('Foto')" class="btn-sm" :class="filterType === 'Foto' ? 'btn-primary' : 'btn-ghost'">Foto</button>
                <button @click="setFilter('Video')" class="btn-sm" :class="filterType === 'Video' ? 'btn-primary' : 'btn-ghost'">Video</button>
                <button @click="setFilter('Artikel')" class="btn-sm" :class="filterType === 'Artikel' ? 'btn-primary' : 'btn-ghost'">Artikel</button>
            </div>
            <button @click="bukaUnggah()" class="btn-primary btn-sm w-full sm:w-auto">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Unggah
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
            <template x-for="(item, i) in filtered" :key="i">
                <div class="card p-0 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-40 flex items-center justify-center" :class="colorClass(item.type)">
                        <template x-if="item.type === 'Video'">
                            <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </template>
                        <template x-if="item.type === 'Foto'">
                            <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </template>
                        <template x-if="item.type === 'Artikel'">
                            <svg class="w-12 h-12 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        </template>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="badge-slate text-[10px]" x-text="item.type"></span>
                            <span class="text-xs text-text-muted" x-text="item.count"></span>
                        </div>
                        <h3 class="text-sm font-semibold text-text-primary" x-text="item.title"></h3>
                        <p class="text-xs text-text-secondary mt-1 line-clamp-2" x-text="item.desc"></p>
                        <div class="flex items-center justify-between mt-3 pt-2 border-t border-border">
                            <span class="text-xs text-text-muted" x-text="item.date"></span>
                            <button @click="lihat(item)" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium">Lihat</button>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <template x-if="filtered.length === 0">
            <div class="text-center py-12">
                <svg class="w-12 h-12 mx-auto text-text-muted/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <p class="text-text-muted mt-3 text-sm">Tidak ada konten ditemukan</p>
            </div>
        </template>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="card p-4">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-semibold text-text-primary">Artikel & Informasi</h3>
                    <button @click="bukaUnggah()" class="btn-primary btn-sm">Tulis Artikel</button>
                </div>
                <div class="space-y-4">
                    <template x-for="(item, i) in items.filter(i => i.type === 'Artikel')" :key="i">
                        <div class="pb-4" :class="i < items.filter(x => x.type === 'Artikel').length - 1 ? 'border-b border-border' : ''">
                            <h4 class="text-sm font-semibold text-text-primary" x-text="item.title"></h4>
                            <p class="text-xs text-text-secondary mt-1" x-text="item.desc"></p>
                            <div class="flex items-center gap-2 mt-2 text-xs text-text-muted">
                                <span>Oleh: DKM</span>
                                <span>&middot;</span>
                                <span x-text="item.date"></span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <div class="card p-4">
                <h3 class="text-base font-semibold text-text-primary mb-4">Informasi Masjid</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-text-primary">Alamat</p>
                            <p class="text-sm text-text-secondary">Jl. Masjid Al-Barakah No. 1, RT 01, Kel. Sukamaju</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-text-primary">Kontak</p>
                            <p class="text-sm text-text-secondary">0812-3456-7890 (Sekretariat)</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-text-primary">Jadwal</p>
                            <p class="text-sm text-text-secondary">Sholat 5 waktu &middot; Kajian setiap Senin-Kamis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-ui.modal name="detail-galeri" header="Detail">
            <template x-if="selectedItem">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-white font-bold text-lg" :class="colorClass(selectedItem.type)" x-text="selectedItem.title.charAt(0)"></div>
                        <div>
                            <h3 class="text-lg font-semibold text-text-primary" x-text="selectedItem.title"></h3>
                            <span class="badge-slate mt-1 inline-block" x-text="selectedItem.type"></span>
                        </div>
                    </div>
                    <p class="text-sm text-text-secondary" x-text="selectedItem.desc"></p>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div><span class="text-text-muted">Tanggal</span><p class="font-medium text-text-primary" x-text="selectedItem.date"></p></div>
                        <div><span class="text-text-muted">Jumlah</span><p class="font-medium text-text-primary" x-text="selectedItem.count"></p></div>
                    </div>
                </div>
            </template>
        </x-ui.modal>

        <x-ui.modal name="unggah" header="Unggah Baru">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Judul *</label>
                    <input type="text" x-model="form.title" class="input w-full text-sm" placeholder="Judul konten">
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Deskripsi</label>
                    <textarea x-model="form.desc" class="input w-full text-sm" rows="3" placeholder="Deskripsi"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-medium text-text-muted mb-1">Tanggal</label>
                        <input type="date" x-model="form.date" class="input w-full text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-text-muted mb-1">Tipe</label>
                        <select x-model="form.type" class="input w-full text-sm">
                            <option value="Foto">Foto</option>
                            <option value="Video">Video</option>
                            <option value="Artikel">Artikel</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-2 justify-end pt-2">
                    <button @click="window['modal-unggah'].close()" class="btn-secondary btn-sm">Batal</button>
                    <button @click="unggah()" class="btn-primary btn-sm">Unggah</button>
                </div>
            </div>
        </x-ui.modal>
    </div>
</x-layouts.masjid>
