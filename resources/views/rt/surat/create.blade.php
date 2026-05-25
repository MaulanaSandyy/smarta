<x-layouts.rt>
    <x-slot:title>Buat Pengajuan Surat</x-slot:title>
    <x-slot:subtitle>Buat pengajuan surat baru</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.surat.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">ID Warga <span class="text-rose-500">*</span></label>
                    <input type="text" name="warga_id" class="input w-full" value="{{ old('warga_id') }}" placeholder="Masukkan ID warga">
                    @error('warga_id')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Jenis Surat <span class="text-rose-500">*</span></label>
                    <input type="text" name="jenis_surat" class="input w-full" value="{{ old('jenis_surat') }}">
                    @error('jenis_surat')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="input w-full" value="{{ old('nomor_surat') }}">
                    @error('nomor_surat')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Keperluan <span class="text-rose-500">*</span></label>
                    <textarea name="keperluan" class="input w-full" rows="4">{{ old('keperluan') }}</textarea>
                    @error('keperluan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Keterangan</label>
                    <textarea name="keterangan" class="input w-full" rows="4">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Status <span class="text-rose-500">*</span></label>
                    <select name="status" class="input w-full">
                        <option value="pending" @selected(old('status') == 'pending')>Pending</option>
                        <option value="disetujui" @selected(old('status') == 'disetujui')>Disetujui</option>
                        <option value="ditolak" @selected(old('status') == 'ditolak')>Ditolak</option>
                        <option value="selesai" @selected(old('status') == 'selesai')>Selesai</option>
                    </select>
                    @error('status')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Catatan</label>
                    <textarea name="catatan" class="input w-full" rows="4">{{ old('catatan') }}</textarea>
                    @error('catatan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Pengajuan <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal_pengajuan" class="input w-full" value="{{ old('tanggal_pengajuan', date('Y-m-d')) }}">
                    @error('tanggal_pengajuan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="input w-full" value="{{ old('tanggal_selesai') }}">
                    @error('tanggal_selesai')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('rt.surat.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.rt>
