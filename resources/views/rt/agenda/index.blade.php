<x-layouts.rt>
    <x-slot:title>Agenda Kegiatan</x-slot:title>
    <x-slot:subtitle>Jadwal kegiatan lingkungan RT 01</x-slot:subtitle>

    @php
        $agenda = [
            ['tgl' => '25', 'hari' => 'Senin', 'bulan' => 'Mei', 'judul' => 'Posyandu Balita', 'waktu' => '08:00 - 11:00', 'tempat' => 'Balai RT', 'desc' => 'Pelayanan posyandu untuk balita dan ibu hamil.', 'badge' => 'Kesehatan', 'badgeClass' => 'badge-success'],
            ['tgl' => '26', 'hari' => 'Selasa', 'bulan' => 'Mei', 'judul' => 'Rapat RT Bulanan', 'waktu' => '19:00 - 21:00', 'tempat' => 'Rumah Ketua RT', 'desc' => 'Rapat evaluasi kegiatan bulan ini dan perencanaan bulan depan.', 'badge' => 'Rapat', 'badgeClass' => 'badge-primary'],
            ['tgl' => '28', 'hari' => 'Kamis', 'bulan' => 'Mei', 'judul' => 'Kerja Bakti Lingkungan', 'waktu' => '07:00 - 10:00', 'tempat' => 'Lingkungan RT 01', 'desc' => 'Kerja bakti membersihkan selokan dan lingkungan sekitar.', 'badge' => 'Kegiatan', 'badgeClass' => 'badge-warning'],
            ['tgl' => '30', 'hari' => 'Sabtu', 'bulan' => 'Mei', 'judul' => 'Pengajian Akbar', 'waktu' => 'Ba\'da Maghrib', 'tempat' => 'Masjid Al-Barakah', 'desc' => 'Pengajian akbar dengan tema "Memperkuat Silaturahmi Antar Warga".', 'badge' => 'Keagamaan', 'badgeClass' => 'badge-primary'],
            ['tgl' => '31', 'hari' => 'Minggu', 'bulan' => 'Mei', 'judul' => 'Senam Pagi Bersama', 'waktu' => '06:00 - 07:30', 'tempat' => 'Lapangan RT', 'desc' => 'Senam pagi bersama untuk menjaga kesehatan warga.', 'badge' => 'Olahraga', 'badgeClass' => 'badge-success'],
        ];
        $bulan = 5;
        $tahun = 2026;
    @endphp

    <div x-data="dataAgenda({{ Js::from($agenda) }}, {{ $bulan }}, {{ $tahun }})">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-2">
                <button class="btn-secondary btn-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Bulan Sebelumnya
                </button>
                <h3 class="text-lg font-semibold text-text-primary px-3">Mei 2026</h3>
                <button class="btn-secondary btn-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    Bulan Berikutnya
                </button>
            </div>
            <button class="btn-primary btn-sm" @click="bukaForm()">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Kegiatan
            </button>
        </div>

        {{-- Timeline --}}
        <div class="space-y-4">
            <template x-if="items.length === 0">
                <div class="bg-(--surface) border border-border rounded-2xl p-8 text-center">
                    <svg class="w-12 h-12 mx-auto text-text-muted mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <p class="text-sm text-text-muted">Belum ada kegiatan</p>
                    <button @click="bukaForm()" class="btn-primary btn-sm mt-3">Tambah Kegiatan</button>
                </div>
            </template>
            <template x-for="(item, index) in items" :key="index">
                <div class="card">
                    <div class="card-body">
                        <div class="flex items-start gap-4">
                            <div class="text-center min-w-[48px]">
                                <div class="text-2xl font-bold text-primary-600" x-text="item.tgl"></div>
                                <div class="text-xs text-text-muted" x-text="item.hari"></div>
                                <div class="text-xs text-text-muted" x-text="item.bulan"></div>
                            </div>
                            <div class="w-px h-auto bg-border self-stretch"></div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2">
                                    <div>
                                        <h3 class="text-base font-semibold text-text-primary" x-text="item.judul"></h3>
                                        <div class="flex items-center gap-3 mt-1 text-xs text-text-muted">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <span x-text="item.waktu"></span>
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                <span x-text="item.tempat"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="text-[10px] px-2 py-0.5 rounded-full font-medium" :class="item.badgeClass" x-text="item.badge"></span>
                                </div>
                                <p class="text-sm text-text-secondary mt-2" x-text="item.desc"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- Modal Tambah Kegiatan --}}
        <x-ui.modal name="tambah-agenda" header="Tambah Kegiatan Baru">
            <div class="space-y-4">
                {{-- Judul --}}
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Judul Kegiatan <span class="text-rose-500">*</span></label>
                    <input type="text" class="input w-full" x-model="form.judul" placeholder="Masukkan judul kegiatan">
                </div>

                {{-- Tanggal --}}
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Tanggal <span class="text-rose-500">*</span></label>
                    <input type="number" class="input w-full" x-model="form.tgl" min="1" max="31" placeholder="1 - 31">
                </div>

                {{-- Waktu --}}
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Waktu</label>
                    <input type="text" class="input w-full" x-model="form.waktu" placeholder="Contoh: 08:00 - 11:00">
                </div>

                {{-- Tempat --}}
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Tempat</label>
                    <input type="text" class="input w-full" x-model="form.tempat" placeholder="Masukkan lokasi kegiatan">
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Kategori</label>
                    <select class="input w-full" x-model="form.kategori">
                        <template x-for="k in kategoriList" :key="k">
                            <option :value="k" x-text="k"></option>
                        </template>
                    </select>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="text-xs text-text-muted block mb-1.5">Deskripsi</label>
                    <textarea class="input w-full resize-none" rows="3" x-model="form.desc" placeholder="Deskripsi kegiatan..."></textarea>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-2 justify-end pt-2 border-t border-border">
                    <button class="btn-secondary" @click="window['modal-tambah-agenda'].close()">Batal</button>
                    <button class="btn-primary" @click="tambahKegiatan()">Simpan Kegiatan</button>
                </div>
            </div>
        </x-ui.modal>
    </div>
</x-layouts.rt>
