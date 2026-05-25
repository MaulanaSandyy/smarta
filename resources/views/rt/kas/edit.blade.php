<x-layouts.rt>
    <x-slot:title>Edit Transaksi</x-slot:title>
    <x-slot:subtitle>Ubah transaksi kas</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('rt.kas.update', $kas) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tipe <span class="text-rose-500">*</span></label>
                    <select name="tipe" class="input w-full">
                        <option value="">- Pilih -</option>
                        <option value="pemasukan" @selected(old('tipe', $kas->tipe) == 'pemasukan')>Pemasukan</option>
                        <option value="pengeluaran" @selected(old('tipe', $kas->tipe) == 'pengeluaran')>Pengeluaran</option>
                    </select>
                    @error('tipe')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Warga</label>
                    <select name="warga_id" class="input w-full">
                        <option value="">- Pilih -</option>
                        @foreach($warga as $w)
                        <option value="{{ $w->id }}" @selected(old('warga_id', $kas->warga_id) == $w->id)>{{ $w->nama }}</option>
                        @endforeach
                    </select>
                    @error('warga_id')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Jumlah <span class="text-rose-500">*</span></label>
                    <input type="number" name="jumlah" class="input w-full" value="{{ old('jumlah', $kas->jumlah) }}" step="0.01">
                    @error('jumlah')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Kategori <span class="text-rose-500">*</span></label>
                    <input type="text" name="kategori" class="input w-full" value="{{ old('kategori', $kas->kategori) }}">
                    @error('kategori')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Keterangan</label>
                    <textarea name="keterangan" class="input w-full" rows="4">{{ old('keterangan', $kas->keterangan) }}</textarea>
                    @error('keterangan')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Tanggal <span class="text-rose-500">*</span></label>
                    <input type="date" name="tanggal" class="input w-full" value="{{ old('tanggal', $kas->tanggal) }}">
                    @error('tanggal')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Bukti</label>
                    <input type="text" name="bukti" class="input w-full" value="{{ old('bukti', $kas->bukti) }}">
                    @error('bukti')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('rt.kas.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.rt>
