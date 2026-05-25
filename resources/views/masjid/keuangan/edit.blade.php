<x-layouts.masjid>
    <x-slot:title>Edit Transaksi</x-slot:title>
    <x-slot:subtitle>Ubah transaksi keuangan</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('masjid.keuangan.update', $keuanganMasjid) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tipe <span class="text-rose-500">*</span></label>
                    <select name="tipe" class="input w-full" required>
                        <option value="">Pilih...</option>
                        <option value="pemasukan" @selected(old('tipe', $keuanganMasjid->tipe) == 'pemasukan')>Pemasukan</option>
                        <option value="pengeluaran" @selected(old('tipe', $keuanganMasjid->tipe) == 'pengeluaran')>Pengeluaran</option>
                    </select>
                    @error('tipe')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Jumlah <span class="text-rose-500">*</span></label>
                    <input type="number" name="jumlah" class="input w-full" value="{{ old('jumlah', $keuanganMasjid->jumlah) }}" step="0.01" min="0" required>
                    @error('jumlah')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <input type="text" name="kategori" class="input w-full" value="{{ old('kategori', $keuanganMasjid->kategori) }}" maxlength="255" required>
                    @error('kategori')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Keterangan</label>
                    <textarea name="keterangan" class="input w-full" rows="4">{{ old('keterangan', $keuanganMasjid->keterangan) }}</textarea>
                    @error('keterangan')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal" class="input w-full" value="{{ old('tanggal', $keuanganMasjid->tanggal) }}" required>
                    @error('tanggal')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Bukti</label>
                    <input type="text" name="bukti" class="input w-full" value="{{ old('bukti', $keuanganMasjid->bukti) }}" maxlength="255" placeholder="Link bukti transaksi">
                    @error('bukti')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('masjid.keuangan.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.masjid>
