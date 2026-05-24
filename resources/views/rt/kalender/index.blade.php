<x-layouts.rt>
    <x-slot:title>Kalender Lingkungan</x-slot:title>
    <x-slot:subtitle>Jadwal kegiatan rutin lingkungan RT 01</x-slot:subtitle>

    <div x-data="dataKalenderLingkungan()">
        {{-- Header + Tambah --}}
        <div class="flex items-center justify-between gap-2 mb-6">
            <div class="flex items-center gap-1 sm:gap-2">
                <button class="btn-ghost btn-sm p-1.5 shrink-0" @click="prevMonth()" title="Bulan sebelumnya">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <h2 class="text-base sm:text-lg font-semibold text-text-primary text-center whitespace-nowrap" x-text="namaBulan[bulan - 1] + ' ' + tahun"></h2>
                <button class="btn-ghost btn-sm p-1.5 shrink-0" @click="nextMonth()" title="Bulan berikutnya">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
            <button class="btn-primary btn-sm justify-center shrink-0" @click="bukaForm()">
                <svg class="w-4 h-4 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span class="hidden sm:inline">Tambah Agenda</span>
            </button>
        </div>

        {{-- Legend --}}
        <div class="flex items-center gap-4 mb-4 flex-wrap">
            <span class="text-sm text-text-secondary">Legenda:</span>
            <template x-for="k in kategoriList" :key="k">
                <div class="flex items-center gap-1.5">
                    <div class="w-2.5 h-2.5 rounded-full" :class="warnaKategori(k)"></div>
                    <span class="text-xs text-text-muted" x-text="k"></span>
                </div>
            </template>
        </div>

        {{-- Calendar Grid --}}
        <div class="bg-(--surface) border border-border rounded-2xl shadow-sm overflow-hidden">
            <div class="grid grid-cols-7 gap-px bg-border">
                {{-- Day headers --}}
                <template x-for="(nama, i) in namaHari" :key="i">
                    <div class="bg-surface-secondary px-2 py-2 text-center">
                        <span class="text-xs font-semibold text-text-muted" x-text="nama"></span>
                    </div>
                </template>

                {{-- Calendar cells --}}
                <template x-for="(day, i) in calendarGrid" :key="i">
                    <div class="bg-(--surface) min-h-[80px] sm:min-h-[110px] p-1 sm:p-2 transition-colors relative"
                         :class="{
                            'ring-2 ring-primary-500 ring-inset': day !== null && isToday(day),
                            'hover:bg-surface-secondary cursor-pointer': day !== null && eventsForDay(day).length > 0,
                         }"
                         @click="day !== null && eventsForDay(day).length > 0 && bukaDetailHari(day)">
                        <template x-if="day !== null">
                            <div>
                                <span class="text-sm font-medium"
                                      :class="isToday(day) ? 'inline-flex items-center justify-center w-6 h-6 rounded-full bg-primary-600 text-white text-xs' : 'text-text-primary'"
                                      x-text="day"></span>
                                <div class="mt-1 space-y-0.5">
                                    <template x-for="ev in eventsForDay(day).slice(0, 2)" :key="ev.id">
                                        <div class="flex items-center gap-1 group">
                                            <span class="inline-block w-1.5 h-1.5 rounded-full shrink-0" :class="warnaKategori(ev.kategori)"></span>
                                            <span class="text-[9px] sm:text-[10px] text-text-primary truncate leading-tight" x-text="ev.judul"></span>
                                        </div>
                                    </template>
                                    <template x-if="eventsForDay(day).length > 2">
                                        <span class="text-[9px] text-text-muted font-medium" x-text="'+' + (eventsForDay(day).length - 2) + ' lagi'"></span>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </div>

        {{-- Upcoming Events --}}
        <div class="mt-6" x-show="upcomingEvents.length > 0">
            <h3 class="text-base font-semibold text-text-primary mb-4">Kegiatan Mendatang</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <template x-for="ev in upcomingEvents" :key="ev.id">
                    <div class="bg-(--surface) border border-border rounded-2xl p-4 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="flex items-start gap-3">
                            <div class="w-1 h-12 rounded-full shrink-0" :class="warnaKategori(ev.kategori)"></div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <p class="text-xs text-text-muted" x-text="formatTanggal(ev.tanggal)"></p>
                                        <h4 class="text-sm font-semibold text-text-primary mt-0.5 truncate" x-text="ev.judul"></h4>
                                    </div>
                                    <button class="btn-ghost btn-sm p-1 shrink-0 text-rose-500 hover:text-rose-700 opacity-0 group-hover:opacity-100 transition-opacity" @click="hapusAgenda(ev.id)" title="Hapus">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                                <div class="flex items-center gap-3 mt-1.5 text-xs text-text-muted flex-wrap">
                                    <template x-if="ev.waktu && ev.waktu !== '-'">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            <span x-text="ev.waktu"></span>
                                        </span>
                                    </template>
                                    <template x-if="ev.lokasi && ev.lokasi !== '-'">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            <span x-text="ev.lokasi"></span>
                                        </span>
                                    </template>
                                    <span class="text-[10px] px-2 py-0.5 rounded-full text-white font-medium" :class="warnaKategori(ev.kategori)" x-text="ev.kategori"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- Modal Detail Hari --}}
        <x-ui.modal name="detail-hari">
            <div x-show="selectedDay">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 rounded-xl bg-primary-100 text-primary-600 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-text-primary" x-text="formatTanggal(selectedDay)"></p>
                        <p class="text-sm text-text-muted" x-text="getDayName(selectedDay)"></p>
                    </div>
                </div>
                <div class="space-y-3" x-show="selectedDayEvents.length > 0">
                    <template x-for="ev in selectedDayEvents" :key="ev.id">
                        <div class="bg-surface-secondary rounded-xl p-3 sm:p-4">
                            <div class="flex items-start justify-between gap-2">
                                <div class="flex items-start gap-3 min-w-0">
                                    <div class="w-2 h-full min-h-[40px] rounded-full shrink-0 mt-0.5" :class="warnaKategori(ev.kategori)"></div>
                                    <div class="min-w-0">
                                        <h4 class="text-sm font-semibold text-text-primary" x-text="ev.judul"></h4>
                                        <div class="flex flex-wrap items-center gap-x-3 gap-y-1 mt-1.5 text-xs text-text-muted">
                                            <template x-if="ev.waktu && ev.waktu !== '-'">
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    <span x-text="ev.waktu"></span>
                                                </span>
                                            </template>
                                            <template x-if="ev.lokasi && ev.lokasi !== '-'">
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                    <span x-text="ev.lokasi"></span>
                                                </span>
                                            </template>
                                            <span class="text-[10px] px-2 py-0.5 rounded-full text-white font-medium" :class="warnaKategori(ev.kategori)" x-text="ev.kategori"></span>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn-ghost btn-sm p-1.5 shrink-0 text-rose-500 hover:text-rose-700" @click="hapusAgenda(ev.id); selectedDay = null; window['modal-detail-hari'].close()" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="text-center py-8" x-show="selectedDayEvents.length === 0">
                    <svg class="w-10 h-10 mx-auto text-text-muted mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <p class="text-sm text-text-muted">Tidak ada kegiatan di hari ini</p>
                </div>
            </div>
        </x-ui.modal>

        {{-- Modal Tambah Agenda --}}
        <x-ui.modal name="tambah-agenda" header="Tambah Agenda">
            <form class="space-y-4" @submit.prevent="tambahAgenda">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Judul <span class="text-rose-500">*</span></label>
                    <input type="text" class="input w-full" placeholder="Nama kegiatan" x-model="form.judul" required>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Tanggal <span class="text-rose-500">*</span></label>
                        <input type="date" class="input w-full" x-model="form.tanggal" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Waktu</label>
                        <input type="time" class="input w-full" x-model="form.waktu">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Lokasi</label>
                    <input type="text" class="input w-full" placeholder="Tempat kegiatan" x-model="form.lokasi">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori</label>
                    <select class="input w-full" x-model="form.kategori">
                        <template x-for="k in kategoriList" :key="k">
                            <option :value="k" x-text="k"></option>
                        </template>
                    </select>
                </div>
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" class="btn-secondary btn-sm" @click="window['modal-tambah-agenda'].close()">Batal</button>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.modal>
    </div>
</x-layouts.rt>
