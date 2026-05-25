<x-layouts.rt>
    <x-slot:title>Edit Pengajuan Surat</x-slot:title>
    <x-slot:subtitle>Ubah pengajuan surat</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.surat.update', $pengajuanSurat) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" value="{{ old('user_id', $pengajuanSurat->user_id) }}">

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Warga <span class="text-rose-500">*</span></label>
                    <input type="text" name="warga_id" class="input w-full" value="{{ old('warga_id', $pengajuanSurat->warga_id) }}">
                    @error('warga_id')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Jenis Surat <span class="text-rose-500">*</span></label>
                    <input type="text" name="jenis_surat" class="input w-full" value="{{ old('jenis_surat', $pengajuanSurat->jenis_surat) }}">
                    @error('jenis_surat')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="input w-full" value="{{ old('nomor_surat', $pengajuanSurat->nomor_surat) }}">
                    @error('nomor_surat')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Keperluan <span class="text-rose-500">*</span></label>
                    <textarea name="keperluan" class="input w-full" rows="4">{{ old('keperluan', $pengajuanSurat->keperluan) }}</textarea>
                    @error('keperluan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Keterangan</label>
                    <textarea name="keterangan" class="input w-full" rows="4">{{ old('keterangan', $pengajuanSurat->keterangan) }}</textarea>
                    @error('keterangan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Status <span class="text-rose-500">*</span></label>
                    <select name="status" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="pending" @selected(old('status', $pengajuanSurat->status) == 'pending')>Pending</option>
                        <option value="disetujui" @selected(old('status', $pengajuanSurat->status) == 'disetujui')>Disetujui</option>
                        <option value="ditolak" @selected(old('status', $pengajuanSurat->status) == 'ditolak')>Ditolak</option>
                        <option value="selesai" @selected(old('status', $pengajuanSurat->status) == 'selesai')>Selesai</option>
                    </select>
                    @error('status')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Catatan</label>
                    <textarea name="catatan" class="input w-full" rows="3">{{ old('catatan', $pengajuanSurat->catatan) }}</textarea>
                    @error('catatan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Pengajuan <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal_pengajuan" class="input w-full" value="{{ old('tanggal_pengajuan', $pengajuanSurat->tanggal_pengajuan) }}">
                    @error('tanggal_pengajuan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="input w-full" value="{{ old('tanggal_selesai', $pengajuanSurat->tanggal_selesai) }}">
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
