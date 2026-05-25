<x-layouts.masjid>
    <x-slot:title>Tambah Galeri</x-slot:title>
    <x-slot:subtitle>Upload foto/video/artikel baru</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('masjid.galeri.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Judul <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" class="input w-full" value="{{ old('judul') }}" maxlength="255" required>
                    @error('judul')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tipe <span class="text-rose-500">*</span></label>
                    <select name="tipe" class="input w-full" required>
                        <option value="">Pilih...</option>
                        <option value="foto" @selected(old('tipe') == 'foto')>Foto</option>
                        <option value="video" @selected(old('tipe') == 'video')>Video</option>
                        <option value="artikel" @selected(old('tipe') == 'artikel')>Artikel</option>
                    </select>
                    @error('tipe')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">URL</label>
                    <input type="url" name="url" class="input w-full" value="{{ old('url') }}" placeholder="Link untuk video/artikel">
                    @error('url')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="input w-full" rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal" class="input w-full" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    @error('tanggal')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Status <span class="text-rose-500">*</span></label>
                    <select name="status" class="input w-full" required>
                        <option value="">Pilih...</option>
                        <option value="draft" @selected(old('status') == 'draft')>Draft</option>
                        <option value="terbit" @selected(old('status') == 'terbit')>Terbit</option>
                        <option value="arsip" @selected(old('status') == 'arsip')>Arsip</option>
                    </select>
                    @error('status')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('masjid.galeri.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.masjid>
