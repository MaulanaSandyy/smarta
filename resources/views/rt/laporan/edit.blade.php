<x-layouts.rt>
    <x-slot:title>Edit Laporan</x-slot:title>
    <x-slot:subtitle>Ubah laporan warga</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.laporan.update', $laporan) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" value="{{ old('user_id', $laporan->user_id) }}">

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Warga <span class="text-rose-500">*</span></label>
                    <input type="text" name="warga_id" class="input w-full" value="{{ old('warga_id', $laporan->warga_id) }}">
                    @error('warga_id')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Judul <span class="text-rose-500">*</span></label>
                    <input type="text" name="judul" class="input w-full" value="{{ old('judul', $laporan->judul) }}">
                    @error('judul')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Isi <span class="text-rose-500">*</span></label>
                    <textarea name="isi" class="input w-full" rows="5">{{ old('isi', $laporan->isi) }}</textarea>
                    @error('isi')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <select name="kategori" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="umum" @selected(old('kategori', $laporan->kategori) == 'umum')>Umum</option>
                        <option value="keamanan" @selected(old('kategori', $laporan->kategori) == 'keamanan')>Keamanan</option>
                        <option value="kebersihan" @selected(old('kategori', $laporan->kategori) == 'kebersihan')>Kebersihan</option>
                        <option value="kesehatan" @selected(old('kategori', $laporan->kategori) == 'kesehatan')>Kesehatan</option>
                        <option value="infrastruktur" @selected(old('kategori', $laporan->kategori) == 'infrastruktur')>Infrastruktur</option>
                        <option value="lainnya" @selected(old('kategori', $laporan->kategori) == 'lainnya')>Lainnya</option>
                    </select>
                    @error('kategori')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Status <span class="text-rose-500">*</span></label>
                    <select name="status" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="menunggu" @selected(old('status', $laporan->status) == 'menunggu')>Menunggu</option>
                        <option value="diproses" @selected(old('status', $laporan->status) == 'diproses')>Diproses</option>
                        <option value="selesai" @selected(old('status', $laporan->status) == 'selesai')>Selesai</option>
                        <option value="ditolak" @selected(old('status', $laporan->status) == 'ditolak')>Ditolak</option>
                    </select>
                    @error('status')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggapan</label>
                    <textarea name="tanggapan" class="input w-full" rows="4">{{ old('tanggapan', $laporan->tanggapan) }}</textarea>
                    @error('tanggapan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Laporan <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal_laporan" class="input w-full" value="{{ old('tanggal_laporan', $laporan->tanggal_laporan) }}">
                    @error('tanggal_laporan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Ditanggapi</label>
                    <input type="date" name="tanggal_ditanggapi" class="input w-full" value="{{ old('tanggal_ditanggapi', $laporan->tanggal_ditanggapi) }}">
                    @error('tanggal_ditanggapi')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('rt.laporan.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.rt>
