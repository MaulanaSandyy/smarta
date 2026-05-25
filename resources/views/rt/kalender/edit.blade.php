<x-layouts.rt>
    <x-slot:title>Edit Event</x-slot:title>
    <x-slot:subtitle>Ubah event kalender</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.kalender.update', $kalenderEvent) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" value="{{ old('user_id', $kalenderEvent->user_id) }}">

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Judul <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" class="input w-full" value="{{ old('judul', $kalenderEvent->judul) }}">
                    @error('judul')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal" class="input w-full" value="{{ old('tanggal', $kalenderEvent->tanggal) }}">
                    @error('tanggal')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Waktu</label>
                    <input type="time" name="waktu" class="input w-full" value="{{ old('waktu', $kalenderEvent->waktu) }}">
                    @error('waktu')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Lokasi</label>
                    <input type="text" name="lokasi" class="input w-full" value="{{ old('lokasi', $kalenderEvent->lokasi) }}">
                    @error('lokasi')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <select name="kategori" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="kerja_bakti" @selected(old('kategori', $kalenderEvent->kategori) == 'kerja_bakti')>Kerja Bakti</option>
                        <option value="posyandu" @selected(old('kategori', $kalenderEvent->kategori) == 'posyandu')>Posyandu</option>
                        <option value="pengajian" @selected(old('kategori', $kalenderEvent->kategori) == 'pengajian')>Pengajian</option>
                        <option value="ronda" @selected(old('kategori', $kalenderEvent->kategori) == 'ronda')>Ronda</option>
                        <option value="lomba" @selected(old('kategori', $kalenderEvent->kategori) == 'lomba')>Lomba</option>
                        <option value="lainnya" @selected(old('kategori', $kalenderEvent->kategori) == 'lainnya')>Lainnya</option>
                    </select>
                    @error('kategori')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="input w-full" rows="4">{{ old('deskripsi', $kalenderEvent->deskripsi) }}</textarea>
                    @error('deskripsi')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Warna</label>
                    <input type="text" name="warna" class="input w-full" value="{{ old('warna', $kalenderEvent->warna) }}">
                    @error('warna')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('rt.kalender.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.rt>
