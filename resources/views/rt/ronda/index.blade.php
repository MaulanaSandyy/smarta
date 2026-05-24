<x-layouts.rt>
    <x-slot:title>Jadwal Ronda</x-slot:title>
    <x-slot:subtitle>Sistem jadwal ronda malam digital RT 01</x-slot:subtitle>

    @php
        $jadwal = [
            ['hari' => 'Senin', 'waktu' => '22:00 - 05:00', 'petugas' => 'Ahmad Fauzi, Budi Santoso, Doni Prasetyo', 'pos' => 'Pos 1'],
            ['hari' => 'Selasa', 'waktu' => '22:00 - 05:00', 'petugas' => 'Siti Rahma, Rina Wijaya, Desi Ratnasari', 'pos' => 'Pos 2'],
            ['hari' => 'Rabu', 'waktu' => '22:00 - 05:00', 'petugas' => 'Budi Santoso, Ahmad Fauzi, Doni Prasetyo', 'pos' => 'Pos 1'],
            ['hari' => 'Kamis', 'waktu' => '22:00 - 05:00', 'petugas' => 'Rina Wijaya, Siti Rahma, Desi Ratnasari', 'pos' => 'Pos 2'],
            ['hari' => 'Jumat', 'waktu' => '22:00 - 05:00', 'petugas' => 'Doni Prasetyo, Budi Santoso, Ahmad Fauzi', 'pos' => 'Pos 1'],
            ['hari' => 'Sabtu', 'waktu' => '22:00 - 05:00', 'petugas' => 'Desi Ratnasari, Rina Wijaya, Siti Rahma', 'pos' => 'Pos 2'],
            ['hari' => 'Minggu', 'waktu' => '22:00 - 05:00', 'petugas' => 'Semua warga giliran', 'pos' => 'Semua Pos'],
        ];
        $posList = ['Pos 1', 'Pos 2', 'Semua Pos'];
    @endphp

    <div x-data="dataRonda({{ Js::from($jadwal) }}, {{ Js::from($posList) }})">
        {{-- Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="card">
                <div class="card-body">
                    <div class="flex items-start justify-between mb-3">
                        <div class="stats-card-icon bg-blue-100 text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-text-primary">32</p>
                    <p class="text-sm text-text-muted mt-1">Warga Aktif Ronda</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="flex items-start justify-between mb-3">
                        <div class="stats-card-icon bg-emerald-100 text-emerald-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-text-primary">100%</p>
                    <p class="text-sm text-text-muted mt-1">Kehadiran Minggu Ini</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="flex items-start justify-between mb-3">
                        <div class="stats-card-icon bg-amber-100 text-amber-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-text-primary">8</p>
                    <p class="text-sm text-text-muted mt-1">Pos Ronda Aktif</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="flex items-start justify-between mb-3">
                        <div class="stats-card-icon bg-rose-100 text-rose-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-text-primary"><span x-text="totalInsiden"></span></p>
                    <p class="text-sm text-text-muted mt-1">Insiden Minggu Ini</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Jadwal Ronda --}}
            <div class="card">
                <div class="card-header">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Jadwal Ronda Minggu Ini</h3>
                        <button class="btn-primary btn-sm" @click="bukaAturJadwal()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="hidden sm:inline">Atur Jadwal</span>
                        </button>
                    </div>
                </div>
                <div class="card-body space-y-2">
                    <template x-for="(item, index) in jadwal" :key="index">
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-surface-secondary">
                            <div class="min-w-[50px] sm:min-w-[60px] text-center">
                                <p class="text-xs font-semibold text-text-primary" x-text="item.hari.slice(0,3)"></p>
                                <p class="text-[10px] text-text-muted leading-tight mt-0.5" x-text="item.waktu"></p>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-text-secondary truncate" x-text="item.petugas"></p>
                            </div>
                            <span class="badge-slate text-[10px] px-2 py-0.5 shrink-0" x-text="item.pos"></span>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Laporan Keamanan --}}
            <div class="card">
                <div class="card-header">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Laporan Keamanan</h3>
                        <button class="btn-secondary btn-sm" @click="bukaBuatLaporan()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            <span class="hidden sm:inline">Buat Laporan</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Empty state --}}
                    <template x-if="laporan.length === 0">
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 mx-auto text-emerald-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            <p class="text-base font-semibold text-text-primary">Aman Terkendali</p>
                            <p class="text-sm text-text-muted mt-1">Tidak ada insiden keamanan minggu ini</p>
                        </div>
                    </template>

                    {{-- Laporan list --}}
                    <template x-for="(item, index) in laporan" :key="index">
                        <div class="flex items-start gap-3 pb-3 mb-3 border-b border-border last:border-0 last:pb-0 last:mb-0">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0" :class="item.status === 'Aman' ? 'bg-emerald-100' : 'bg-rose-100'">
                                <svg class="w-4 h-4" :class="item.status === 'Aman' ? 'text-emerald-600' : 'text-rose-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <template x-if="item.status === 'Aman'">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </template>
                                    <template x-if="item.status !== 'Aman'">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                    </template>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <p class="text-sm font-medium text-text-primary" x-text="item.judul"></p>
                                        <p class="text-xs text-text-muted mt-0.5"><span x-text="item.pelapor"></span> &middot; <span x-text="item.tgl"></span></p>
                                    </div>
                                    <span class="text-[10px] px-2 py-0.5 rounded-full font-medium shrink-0" :class="item.status === 'Aman' ? 'badge-success' : 'badge-danger'" x-text="item.status"></span>
                                </div>
                                <p class="text-xs text-text-secondary mt-1.5 line-clamp-2" x-text="item.deskripsi"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        {{-- Modal Atur Jadwal --}}
        <x-ui.modal name="atur-jadwal" header="Atur Jadwal Ronda">
            <div class="space-y-3">
                <p class="text-xs text-text-muted mb-2">Klik tombol edit untuk mengubah jadwal harian</p>
                <template x-for="(item, index) in jadwal" :key="index">
                    <div class="rounded-xl border border-border overflow-hidden">
                        {{-- Day header --}}
                        <div class="flex items-center justify-between px-3 py-2 bg-surface-secondary">
                            <span class="text-sm font-semibold text-text-primary" x-text="item.hari"></span>
                            <button @click="editDay(index)" class="text-primary-600 hover:text-primary-700 text-xs font-medium" x-show="editingDay !== index">Edit</button>
                        </div>
                        {{-- Content --}}
                        <div class="px-3 py-2" x-show="editingDay !== index">
                            <p class="text-xs text-text-secondary" x-text="'Petugas: ' + item.petugas"></p>
                            <p class="text-xs text-text-secondary mt-0.5" x-text="item.waktu + ' - ' + item.pos"></p>
                        </div>
                        {{-- Edit form --}}
                        <div x-show="editingDay === index" class="px-3 py-3 space-y-3 bg-surface-secondary/50">
                            <div>
                                <label class="text-[10px] text-text-muted block mb-0.5">Petugas</label>
                                <input type="text" class="input text-sm w-full" x-model="editForm.petugas" placeholder="Nama petugas">
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label class="text-[10px] text-text-muted block mb-0.5">Waktu</label>
                                    <input type="text" class="input text-sm w-full" x-model="editForm.waktu" placeholder="22:00 - 05:00">
                                </div>
                                <div>
                                    <label class="text-[10px] text-text-muted block mb-0.5">Pos</label>
                                    <select class="input text-sm w-full" x-model="editForm.pos">
                                        <template x-for="p in posList" :key="p">
                                            <option :value="p" x-text="p"></option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 justify-end">
                                <button class="btn-ghost btn-xs text-xs" @click="batalEdit()">Batal</button>
                                <button class="btn-primary btn-xs text-xs" @click="simpanEdit()">Simpan</button>
                            </div>
                        </div>
                    </div>
                </template>

                {{-- Tambah Jadwal Baru --}}
                <div x-show="!showTambahForm" class="pt-2">
                    <button @click="bukaTambahJadwal()" class="btn-secondary btn-sm w-full justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Jadwal Baru
                    </button>
                </div>

                {{-- Form Tambah Jadwal --}}
                <div x-show="showTambahForm" class="rounded-xl border border-border overflow-hidden">
                    <div class="px-3 py-2 bg-surface-secondary">
                        <span class="text-sm font-semibold text-text-primary">Jadwal Baru</span>
                    </div>
                    <div class="px-3 py-3 space-y-3">
                        <div>
                            <label class="text-[10px] text-text-muted block mb-0.5">Nama / Hari <span class="text-rose-500">*</span></label>
                            <input type="text" class="input text-sm w-full" x-model="tambahForm.nama" placeholder="Contoh: Senin Kliwon / Patroli Khusus">
                        </div>
                        <div>
                            <label class="text-[10px] text-text-muted block mb-0.5">Petugas <span class="text-rose-500">*</span></label>
                            <input type="text" class="input text-sm w-full" x-model="tambahForm.petugas" placeholder="Nama petugas">
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="text-[10px] text-text-muted block mb-0.5">Waktu</label>
                                <input type="text" class="input text-sm w-full" x-model="tambahForm.waktu" placeholder="22:00 - 05:00">
                            </div>
                            <div>
                                <label class="text-[10px] text-text-muted block mb-0.5">Pos</label>
                                <select class="input text-sm w-full" x-model="tambahForm.pos">
                                    <template x-for="p in posList" :key="p">
                                        <option :value="p" x-text="p"></option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 justify-end">
                            <button class="btn-ghost btn-xs text-xs" @click="batalTambah()">Batal</button>
                            <button class="btn-primary btn-xs text-xs" @click="tambahJadwal()">Simpan</button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-2 border-t border-border">
                    <button class="btn-secondary" @click="window['modal-atur-jadwal'].close()">Tutup</button>
                </div>
            </div>
        </x-ui.modal>

        {{-- Modal Buat Laporan --}}
        <x-ui.modal name="buat-laporan" header="Buat Laporan Keamanan">
            <div class="space-y-4">
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Tanggal</label>
                    <input type="text" class="input w-full" x-model="laporanForm.tgl" placeholder="dd/mm/yyyy">
                </div>
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Judul Laporan <span class="text-rose-500">*</span></label>
                    <input type="text" class="input w-full" x-model="laporanForm.judul" placeholder="Contoh: Situasi aman terkendali">
                </div>
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Pelapor</label>
                    <input type="text" class="input w-full" x-model="laporanForm.pelapor" placeholder="Nama petugas">
                </div>
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Status</label>
                    <div class="flex items-center gap-2">
                        <button @click="laporanForm.status = 'Aman'" class="px-4 py-2 text-sm font-medium rounded-lg transition-colors" :class="laporanForm.status === 'Aman' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            Aman
                        </button>
                        <button @click="laporanForm.status = 'Tidak Aman'" class="px-4 py-2 text-sm font-medium rounded-lg transition-colors" :class="laporanForm.status === 'Tidak Aman' ? 'bg-rose-600 text-white shadow-sm' : 'bg-surface-secondary text-text-secondary hover:bg-surface-tertiary'">
                            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                            Tidak Aman
                        </button>
                    </div>
                </div>
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Deskripsi</label>
                    <textarea class="input w-full resize-none" rows="3" x-model="laporanForm.deskripsi" placeholder="Deskripsikan situasi..."></textarea>
                </div>
                <div class="flex items-center gap-2 justify-end pt-2 border-t border-border">
                    <button class="btn-secondary" @click="window['modal-buat-laporan'].close()">Batal</button>
                    <button class="btn-primary" @click="kirimLaporan()">Kirim Laporan</button>
                </div>
            </div>
        </x-ui.modal>
    </div>
</x-layouts.rt>
