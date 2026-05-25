<x-layouts.masjid>
    <x-slot:title>Tambah Kajian</x-slot:title>
    <x-slot:subtitle>Buat jadwal kajian baru</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('masjid.kajian.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Judul <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" class="input w-full" value="{{ old('judul') }}" maxlength="255" required>
                    @error('judul')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Hari <span class="text-rose-500">*</span></label>
                    <select name="hari" class="input w-full" required>
                        <option value="">Pilih...</option>
                        <option value="Senin" @selected(old('hari') == 'Senin')>Senin</option>
                        <option value="Selasa" @selected(old('hari') == 'Selasa')>Selasa</option>
                        <option value="Rabu" @selected(old('hari') == 'Rabu')>Rabu</option>
                        <option value="Kamis" @selected(old('hari') == 'Kamis')>Kamis</option>
                        <option value="Jumat" @selected(old('hari') == 'Jumat')>Jumat</option>
                        <option value="Sabtu" @selected(old('hari') == 'Sabtu')>Sabtu</option>
                        <option value="Minggu" @selected(old('hari') == 'Minggu')>Minggu</option>
                    </select>
                    @error('hari')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Waktu <span class="text-rose-500">*</span></label>
                    <input type="time" name="waktu" class="input w-full" value="{{ old('waktu') }}" required>
                    @error('waktu')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Pemateri <span class="text-rose-500">*</span></label>
                    <input type="text" name="pemateri" class="input w-full" value="{{ old('pemateri') }}" maxlength="255" required>
                    @error('pemateri')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tempat <span class="text-rose-500">*</span></label>
                    <input type="text" name="tempat" class="input w-full" value="{{ old('tempat') }}" maxlength="255" required>
                    @error('tempat')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <select name="kategori" class="input w-full" required>
                        <option value="">Pilih...</option>
                        <option value="umum" @selected(old('kategori') == 'umum')>Umum</option>
                        <option value="fiqih" @selected(old('kategori') == 'fiqih')>Fiqih</option>
                        <option value="tauhid" @selected(old('kategori') == 'tauhid')>Tauhid</option>
                        <option value="tafsir" @selected(old('kategori') == 'tafsir')>Tafsir</option>
                        <option value="sirah" @selected(old('kategori') == 'sirah')>Sirah</option>
                        <option value="akhlak" @selected(old('kategori') == 'akhlak')>Akhlak</option>
                        <option value="lainnya" @selected(old('kategori') == 'lainnya')>Lainnya</option>
                    </select>
                    @error('kategori')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="input w-full" rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="aktif" value="1" class="rounded" @checked(old('aktif', true))>
                        <span class="text-sm text-text-primary">Aktif</span>
                    </label>
                    @error('aktif')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('masjid.kajian.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.masjid>
