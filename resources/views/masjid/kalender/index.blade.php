<x-layouts.masjid>
    <x-slot:title>Kalender Kegiatan</x-slot:title>
    <x-slot:subtitle>Jadwal kegiatan harian, bulanan, dan tahunan masjid</x-slot:subtitle>

    <div x-data="dataKalenderMasjid()">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6">
            <div class="flex items-center gap-4 flex-wrap">
                <span class="text-sm text-text-secondary">Legenda:</span>
                <div class="flex items-center gap-1.5"><div class="w-2.5 h-2.5 rounded-full bg-emerald-500"></div><span class="text-xs text-text-muted">Kajian</span></div>
                <div class="flex items-center gap-1.5"><div class="w-2.5 h-2.5 rounded-full bg-blue-500"></div><span class="text-xs text-text-muted">Sholat/Jumat</span></div>
                <div class="flex items-center gap-1.5"><div class="w-2.5 h-2.5 rounded-full bg-amber-500"></div><span class="text-xs text-text-muted">Kegiatan Sosial</span></div>
                <div class="flex items-center gap-1.5"><div class="w-2.5 h-2.5 rounded-full bg-rose-500"></div><span class="text-xs text-text-muted">Peringatan</span></div>
                <div class="flex items-center gap-1.5"><div class="w-2.5 h-2.5 rounded-full bg-purple-500"></div><span class="text-xs text-text-muted">Ramadhan</span></div>
            </div>
            <button @click="bukaTambah()" class="btn-primary btn-sm w-full sm:w-auto">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span class="hidden sm:inline">Tambah Agenda</span>
                <span class="sm:hidden">Tambah</span>
            </button>
        </div>

        <div class="card overflow-hidden">
            <div class="flex items-center justify-between px-4 py-3 border-b border-border">
                <button @click="prevMonth()" class="btn-ghost btn-sm px-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <h3 class="text-sm font-semibold text-text-primary" x-text="monthName + ' ' + year"></h3>
                <button @click="nextMonth()" class="btn-ghost btn-sm px-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
            <div class="grid grid-cols-7 gap-px bg-border">
                <template x-for="day in ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']" :key="day">
                    <div class="bg-surface-secondary px-3 py-2 text-center">
                        <span class="text-xs font-semibold text-text-muted" x-text="day"></span>
                    </div>
                </template>
                <template x-for="d in kalenderGrid" :key="d">
                    <div @click="klikHari(d)" class="bg-(--surface) min-h-[80px] sm:min-h-[100px] p-1.5 sm:p-2 hover:bg-surface-secondary transition-colors cursor-pointer"
                         :class="isToday(d) ? 'ring-2 ring-emerald-500 ring-inset' : ''">
                        <template x-if="d">
                            <div>
                                <span class="text-xs sm:text-sm font-medium" :class="isToday(d) ? 'text-emerald-600' : 'text-text-primary'" x-text="d"></span>
                                <div class="mt-1 space-y-0.5">
                                    <template x-for="(e, i) in eventsOn(d)" :key="i">
                                        <span class="inline-block px-1 py-0.5 rounded text-[9px] sm:text-[10px] text-white truncate max-w-full"
                                              :class="colorClass(e.color)" x-text="e.label.length > 12 ? e.label.substring(0, 12) + '...' : e.label"></span>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </div>

        <div class="mt-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-semibold text-text-primary">Kegiatan Mendatang</h3>
                <button @click="bukaTambah()" class="btn-primary btn-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <template x-for="(u, i) in upcoming" :key="i">
                    <div class="card p-4 relative group">
                        <button @click="hapusUpcoming(i)" class="absolute top-2 right-2 w-6 h-6 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                        <div class="flex items-start gap-3">
                            <div class="w-1 h-12 rounded-full shrink-0" :class="upcomingColorClass(u.color)"></div>
                            <div class="min-w-0">
                                <p class="text-xs text-text-muted" x-text="u.date"></p>
                                <h4 class="text-sm font-semibold text-text-primary mt-0.5" x-text="u.title"></h4>
                                <div class="flex items-center gap-3 mt-1 text-xs text-text-muted flex-wrap">
                                    <span x-text="u.time"></span>
                                    <span x-text="u.loc"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <x-ui.modal name="detail-hari" header="Detail Hari">
            <template x-if="selectedDate">
                <div>
                    <p class="text-sm text-text-muted mb-4" x-text="selectedDate"></p>
                    <template x-if="eventsOnDate(selectedDate).length > 0">
                        <div class="space-y-3">
                            <template x-for="(e, i) in eventsOnDate(selectedDate)" :key="i">
                                <div class="flex items-center justify-between p-3 rounded-xl bg-surface-secondary">
                                    <div class="flex items-center gap-3">
                                        <div class="w-2.5 h-2.5 rounded-full shrink-0" :class="colorClass(e.color)"></div>
                                        <span class="text-sm font-medium text-text-primary" x-text="e.label"></span>
                                    </div>
                                    <button @click="hapusEvent(i)" class="text-xs text-rose-600 hover:text-rose-700 font-medium">Hapus</button>
                                </div>
                            </template>
                        </div>
                    </template>
                    <template x-if="eventsOnDate(selectedDate).length === 0">
                        <p class="text-sm text-text-muted text-center py-6">Tidak ada kegiatan pada hari ini</p>
                    </template>
                </div>
            </template>
        </x-ui.modal>

        <x-ui.modal name="tambah-agenda" header="Tambah Agenda">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Judul *</label>
                    <input type="text" x-model="form.judul" class="input w-full text-sm" placeholder="Nama kegiatan">
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Tanggal *</label>
                    <input type="date" x-model="form.tanggal" class="input w-full text-sm">
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Waktu</label>
                    <input type="text" x-model="form.waktu" class="input w-full text-sm" placeholder="Contoh: 07:00 - 09:00">
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Lokasi</label>
                    <input type="text" x-model="form.lokasi" class="input w-full text-sm" placeholder="Tempat kegiatan">
                </div>
                <div>
                    <label class="block text-xs font-medium text-text-muted mb-1">Kategori</label>
                    <select x-model="form.kategori" class="input w-full text-sm">
                        <option value="emerald">Kajian</option>
                        <option value="blue">Sholat/Jumat</option>
                        <option value="amber">Kegiatan Sosial</option>
                        <option value="rose">Peringatan</option>
                        <option value="purple">Ramadhan</option>
                    </select>
                </div>
                <div class="flex gap-2 justify-end pt-2">
                    <button @click="window['modal-tambah-agenda'].close()" class="btn-secondary btn-sm">Batal</button>
                    <button @click="tambahAgenda()" class="btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </x-ui.modal>
    </div>
</x-layouts.masjid>
