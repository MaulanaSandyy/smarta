<x-layouts.masjid>
    <x-slot:title>Edit Kajian</x-slot:title>
    <x-slot:subtitle>Ubah jadwal kajian</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('masjid.kajian.update', $kajian) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Judul <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" class="input w-full" value="{{ old('judul', $kajian->judul) }}" maxlength="255" required>
                    @error('judul')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Hari <span class="text-rose-500">*</span></label>
                    <select name="hari" class="input w-full" required>
                        <option value="">Pilih...</option>
                        <option value="Senin" @selected(old('hari', $kajian->hari) == 'Senin')>Senin</option>
                        <option value="Selasa" @selected(old('hari', $kajian->hari) == 'Selasa')>Selasa</option>
                        <option value="Rabu" @selected(old('hari', $kajian->hari) == 'Rabu')>Rabu</option>
                        <option value="Kamis" @selected(old('hari', $kajian->hari) == 'Kamis')>Kamis</option>
                        <option value="Jumat" @selected(old('hari', $kajian->hari) == 'Jumat')>Jumat</option>
                        <option value="Sabtu" @selected(old('hari', $kajian->hari) == 'Sabtu')>Sabtu</option>
                        <option value="Minggu" @selected(old('hari', $kajian->hari) == 'Minggu')>Minggu</option>
                    </select>
                    @error('hari')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Waktu <span class="text-rose-500">*</span></label>
                    <input type="time" name="waktu" class="input w-full" value="{{ old('waktu', $kajian->waktu) }}" required>
                    @error('waktu')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Pemateri <span class="text-rose-500">*</span></label>
                    <input type="text" name="pemateri" class="input w-full" value="{{ old('pemateri', $kajian->pemateri) }}" maxlength="255" required>
                    @error('pemateri')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tempat <span class="text-rose-500">*</span></label>
                    <input type="text" name="tempat" class="input w-full" value="{{ old('tempat', $kajian->tempat) }}" maxlength="255" required>
                    @error('tempat')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <select name="kategori" class="input w-full" required>
                        <option value="">Pilih...</option>
                        <option value="umum" @selected(old('kategori', $kajian->kategori) == 'umum')>Umum</option>
                        <option value="fiqih" @selected(old('kategori', $kajian->kategori) == 'fiqih')>Fiqih</option>
                        <option value="tauhid" @selected(old('kategori', $kajian->kategori) == 'tauhid')>Tauhid</option>
                        <option value="tafsir" @selected(old('kategori', $kajian->kategori) == 'tafsir')>Tafsir</option>
                        <option value="sirah" @selected(old('kategori', $kajian->kategori) == 'sirah')>Sirah</option>
                        <option value="akhlak" @selected(old('kategori', $kajian->kategori) == 'akhlak')>Akhlak</option>
                        <option value="lainnya" @selected(old('kategori', $kajian->kategori) == 'lainnya')>Lainnya</option>
                    </select>
                    @error('kategori')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="input w-full" rows="4">{{ old('deskripsi', $kajian->deskripsi) }}</textarea>
                    @error('deskripsi')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="aktif" value="1" class="rounded" @checked(old('aktif', $kajian->aktif))>
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
