<x-layouts.masjid>
    <x-slot:title>Edit Donasi</x-slot:title>
    <x-slot:subtitle>Ubah data donasi</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('masjid.donasi.update', $donasi) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Donatur</label>
                    <input type="text" name="donatur" class="input w-full" value="{{ old('donatur', $donasi->donatur) }}" maxlength="255">
                    @error('donatur')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal" class="input w-full" value="{{ old('tanggal', $donasi->tanggal) }}" required>
                    @error('tanggal')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Jenis <span class="text-rose-500">*</span></label>
                    <select name="jenis" class="input w-full" required>
                        <option value="">Pilih...</option>
                        <option value="uang" @selected(old('jenis', $donasi->jenis) == 'uang')>Uang</option>
                        <option value="makanan" @selected(old('jenis', $donasi->jenis) == 'makanan')>Makanan</option>
                        <option value="sembako" @selected(old('jenis', $donasi->jenis) == 'sembako')>Sembako</option>
                        <option value="pakaian" @selected(old('jenis', $donasi->jenis) == 'pakaian')>Pakaian</option>
                        <option value="lainnya" @selected(old('jenis', $donasi->jenis) == 'lainnya')>Lainnya</option>
                    </select>
                    @error('jenis')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Jumlah <span class="text-rose-500">*</span></label>
                    <input type="number" name="jumlah" class="input w-full" value="{{ old('jumlah', $donasi->jumlah) }}" step="0.01" min="0" required>
                    @error('jumlah')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Status <span class="text-rose-500">*</span></label>
                    <select name="status" class="input w-full" required>
                        <option value="">Pilih...</option>
                        <option value="diterima" @selected(old('status', $donasi->status) == 'diterima')>Diterima</option>
                        <option value="tertunda" @selected(old('status', $donasi->status) == 'tertunda')>Tertunda</option>
                        <option value="disalurkan" @selected(old('status', $donasi->status) == 'disalurkan')>Disalurkan</option>
                    </select>
                    @error('status')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Keterangan</label>
                    <textarea name="keterangan" class="input w-full" rows="4">{{ old('keterangan', $donasi->keterangan) }}</textarea>
                    @error('keterangan')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Bukti</label>
                    <input type="text" name="bukti" class="input w-full" value="{{ old('bukti', $donasi->bukti) }}" maxlength="255">
                    @error('bukti')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('masjid.donasi.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.masjid>
