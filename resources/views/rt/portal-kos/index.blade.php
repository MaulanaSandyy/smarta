<x-layouts.rt>
    <x-slot:title>Portal Anak Kos & Kontrakan</x-slot:title>
    <x-slot:subtitle>Data penghuni kontrakan dan anak kos di RT 01</x-slot:subtitle>

    <div x-data="dataPortalKos()">
        {{-- Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <x-ui.stats-card iconClass="bg-blue-100 text-blue-600">
                <x-slot:value><span x-text="totalKos"></span></x-slot:value>
                <x-slot:label>Penghuni Kos</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></x-slot:icon>
            </x-ui.stats-card>
            <x-ui.stats-card iconClass="bg-amber-100 text-amber-600">
                <x-slot:value><span x-text="totalKontrakan"></span></x-slot:value>
                <x-slot:label>Keluarga Kontrakan</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg></x-slot:icon>
            </x-ui.stats-card>
            <x-ui.stats-card iconClass="bg-emerald-100 text-emerald-600">
                <x-slot:value><span x-text="totalPemilik"></span></x-slot:value>
                <x-slot:label>Pemilik Kontrakan</x-slot:label>
                <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg></x-slot:icon>
            </x-ui.stats-card>
        </div>

        {{-- Anak Kos + Kontrakan --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Anak Kos --}}
            <div class="bg-(--surface) border border-border rounded-2xl shadow-sm overflow-hidden">
                <div class="flex items-center justify-between gap-2 px-4 sm:px-6 py-4 border-b border-border">
                    <h3 class="text-sm sm:text-base font-semibold text-text-primary truncate">Data Anak Kos</h3>
                    <button class="btn-primary btn-sm justify-center shrink-0" @click="bukaFormKos()">
                        <svg class="w-4 h-4 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <span class="hidden sm:inline">Tambah</span>
                    </button>
                </div>
                <div class="p-4 sm:p-6 space-y-3">
                    <template x-for="(item, index) in itemsKos" :key="index">
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-surface-secondary cursor-pointer hover:bg-surface-tertiary transition-colors" @click="detailKos(item)">
                            <div class="w-9 h-9 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-sm font-semibold shrink-0" x-text="item.name.charAt(0)"></div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-text-primary truncate" x-text="item.name"></p>
                                <p class="text-xs text-text-muted truncate" x-text="item.pekerjaan + ' \u00b7 ' + item.usia + ' thn'"></p>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="text-xs text-text-muted" x-text="item.masa"></p>
                                <span class="badge-slate text-[10px]">Kontak</span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Kontrakan --}}
            <div class="bg-(--surface) border border-border rounded-2xl shadow-sm overflow-hidden">
                <div class="flex items-center justify-between gap-2 px-4 sm:px-6 py-4 border-b border-border">
                    <h3 class="text-sm sm:text-base font-semibold text-text-primary truncate">Data Kontrakan</h3>
                    <button class="btn-primary btn-sm justify-center shrink-0" @click="bukaFormKontrakan()">
                        <svg class="w-4 h-4 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        <span class="hidden sm:inline">Tambah</span>
                    </button>
                </div>
                <div class="p-4 sm:p-6 space-y-3">
                    <template x-for="(item, index) in itemsKontrakan" :key="index">
                        <div class="p-3 rounded-xl bg-surface-secondary cursor-pointer hover:bg-surface-tertiary transition-colors" @click="detailKontrakan(item)">
                            <div class="flex items-start justify-between gap-2">
                                <div class="min-w-0">
                                    <p class="text-sm font-medium text-text-primary truncate" x-text="item.alamat"></p>
                                    <p class="text-xs text-text-muted mt-0.5 truncate" x-text="'Penghuni: ' + item.penghuni"></p>
                                    <p class="text-xs text-text-muted truncate" x-text="'Pemilik: ' + item.pemilik"></p>
                                </div>
                                <div class="text-right shrink-0">
                                    <span class="text-[10px] px-2 py-0.5 rounded-full font-medium inline-block" :class="item.status === 'Aktif' ? 'badge-success' : 'badge-slate'" x-text="item.status"></span>
                                    <p class="text-xs text-text-muted mt-1" x-text="item.masa !== '-' ? item.masa : ''"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        {{-- Kontak Darurat --}}
        <div class="bg-(--surface) border border-border rounded-2xl shadow-sm mt-6 overflow-hidden">
            <div class="px-4 sm:px-6 py-4 border-b border-border">
                <h3 class="text-sm sm:text-base font-semibold text-text-primary">Kontak Darurat</h3>
            </div>
            <div class="p-4 sm:p-6 grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                @php
                    $darurat = [
                        ['label' => 'Polisi', 'kontak' => '110', 'color' => 'bg-blue-600', 'path' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
                        ['label' => 'Pemadam Kebakaran', 'kontak' => '113', 'color' => 'bg-rose-600', 'path' => 'M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z'],
                        ['label' => 'Ambulans', 'kontak' => '118', 'color' => 'bg-emerald-600', 'path' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['label' => 'PLN', 'kontak' => '123', 'color' => 'bg-amber-600', 'path' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                    ];
                @endphp
                @foreach ($darurat as $d)
                    <a href="tel:{{ $d['kontak'] }}" class="flex items-center gap-3 p-3 rounded-xl bg-surface-secondary hover:bg-surface-tertiary transition-colors">
                        <div class="w-10 h-10 rounded-xl {{ $d['color'] }} flex items-center justify-center text-white shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $d['path'] }}"/></svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-text-primary">{{ $d['kontak'] }}</p>
                            <p class="text-xs text-text-muted truncate">{{ $d['label'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Modal Detail Kos --}}
        <x-ui.modal name="detail-kos" header="Detail Anak Kos">
            <div x-show="selectedKos" class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-xl font-bold shrink-0" x-text="selectedKos.name ? selectedKos.name.charAt(0) : ''"></div>
                    <div>
                        <p class="text-lg font-semibold text-text-primary" x-text="selectedKos.name"></p>
                        <p class="text-sm text-text-muted" x-text="selectedKos.pekerjaan"></p>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-text-muted block text-xs">Usia</span>
                        <span class="text-text-primary font-medium" x-text="selectedKos.usia + ' tahun'"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Masa Tinggal</span>
                        <span class="text-text-primary font-medium" x-text="selectedKos.masa"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Kontak</span>
                        <span class="text-text-primary font-medium" x-text="selectedKos.kontak"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Kontak Darurat</span>
                        <span class="text-text-primary font-medium" x-text="selectedKos.darurat"></span>
                    </div>
                </div>
                <div class="flex justify-end pt-2">
                    <button class="btn-secondary btn-sm text-rose-600 hover:bg-rose-50" @click="hapusKos(itemsKos.indexOf(selectedKos))">Hapus</button>
                </div>
            </div>
        </x-ui.modal>

        {{-- Modal Detail Kontrakan --}}
        <x-ui.modal name="detail-kontrakan" header="Detail Kontrakan">
            <div x-show="selectedKontrakan" class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-text-primary" x-text="selectedKontrakan.alamat"></p>
                        <span class="text-[10px] px-2 py-0.5 rounded-full font-medium inline-block mt-1" :class="selectedKontrakan.status === 'Aktif' ? 'badge-success' : 'badge-slate'" x-text="selectedKontrakan.status"></span>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-text-muted block text-xs">Penghuni</span>
                        <span class="text-text-primary font-medium" x-text="selectedKontrakan.penghuni"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Pemilik</span>
                        <span class="text-text-primary font-medium" x-text="selectedKontrakan.pemilik"></span>
                    </div>
                    <div>
                        <span class="text-text-muted block text-xs">Masa Kontrak</span>
                        <span class="text-text-primary font-medium" x-text="selectedKontrakan.masa"></span>
                    </div>
                </div>
                <div class="flex justify-end pt-2">
                    <button class="btn-secondary btn-sm text-rose-600 hover:bg-rose-50" @click="hapusKontrakan(itemsKontrakan.indexOf(selectedKontrakan))">Hapus</button>
                </div>
            </div>
        </x-ui.modal>

        {{-- Modal Tambah Kos --}}
        <x-ui.modal name="tambah-kos" header="Tambah Anak Kos">
            <form class="space-y-4" @submit.prevent="tambahKos">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-text-primary mb-1">Nama <span class="text-rose-500">*</span></label>
                        <input type="text" class="input w-full" placeholder="Nama lengkap" x-model="formKos.name" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Usia</label>
                        <input type="number" class="input w-full" placeholder="Usia" x-model="formKos.usia">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Pekerjaan</label>
                        <input type="text" class="input w-full" placeholder="Pekerjaan" x-model="formKos.pekerjaan">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Masa Tinggal</label>
                        <input type="text" class="input w-full" placeholder="Contoh: 6 bulan" x-model="formKos.masa">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Kontak</label>
                        <input type="tel" class="input w-full" placeholder="Nomor telepon" x-model="formKos.kontak">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-text-primary mb-1">Kontak Darurat</label>
                        <input type="tel" class="input w-full" placeholder="Nomor telepon darurat" x-model="formKos.darurat">
                    </div>
                </div>
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" class="btn-secondary btn-sm" @click="window['modal-tambah-kos'].close()">Batal</button>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.modal>

        {{-- Modal Tambah Kontrakan --}}
        <x-ui.modal name="tambah-kontrakan" header="Tambah Kontrakan">
            <form class="space-y-4" @submit.prevent="tambahKontrakan">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Alamat <span class="text-rose-500">*</span></label>
                    <input type="text" class="input w-full" placeholder="Alamat kontrakan" x-model="formKontrakan.alamat" required>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Penghuni</label>
                        <input type="text" class="input w-full" placeholder="Nama penghuni" x-model="formKontrakan.penghuni">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Pemilik</label>
                        <input type="text" class="input w-full" placeholder="Nama pemilik" x-model="formKontrakan.pemilik">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Masa Kontrak</label>
                        <input type="text" class="input w-full" placeholder="Contoh: 1 tahun" x-model="formKontrakan.masa">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-primary mb-1">Status</label>
                        <select class="input w-full" x-model="formKontrakan.status">
                            <option value="Aktif">Aktif</option>
                            <option value="Kosong">Kosong</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-2 pt-2">
                    <button type="button" class="btn-secondary btn-sm" @click="window['modal-tambah-kontrakan'].close()">Batal</button>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.modal>
    </div>
</x-layouts.rt>
