<x-layouts.rt>
    <x-slot:title>Tambah Event</x-slot:title>
    <x-slot:subtitle>Buat event kalender baru</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.kalender.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Judul <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" class="input w-full" value="{{ old('judul') }}">
                    @error('judul')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal" class="input w-full" value="{{ old('tanggal') }}">
                    @error('tanggal')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Waktu</label>
                    <input type="time" name="waktu" class="input w-full" value="{{ old('waktu') }}">
                    @error('waktu')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Lokasi</label>
                    <input type="text" name="lokasi" class="input w-full" value="{{ old('lokasi') }}">
                    @error('lokasi')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <select name="kategori" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="kerja_bakti" @selected(old('kategori') == 'kerja_bakti')>Kerja Bakti</option>
                        <option value="posyandu" @selected(old('kategori') == 'posyandu')>Posyandu</option>
                        <option value="pengajian" @selected(old('kategori') == 'pengajian')>Pengajian</option>
                        <option value="ronda" @selected(old('kategori') == 'ronda')>Ronda</option>
                        <option value="lomba" @selected(old('kategori') == 'lomba')>Lomba</option>
                        <option value="lainnya" @selected(old('kategori') == 'lainnya')>Lainnya</option>
                    </select>
                    @error('kategori')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="input w-full" rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Warna</label>
                    <input type="text" name="warna" class="input w-full" value="{{ old('warna') }}" placeholder="Hex color code, e.g. #3b82f6">
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
