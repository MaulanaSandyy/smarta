<x-layouts.masjid>
    <x-slot:title>Edit Jamaah</x-slot:title>
    <x-slot:subtitle>Ubah data jamaah</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('masjid.jamaah.update', $jamaah) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nama <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" class="input w-full" value="{{ old('name', $jamaah->name) }}" maxlength="255" required>
                    @error('name')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Email <span class="text-rose-500">*</span></label>
                    <input type="email" name="email" class="input w-full" value="{{ old('email', $jamaah->email) }}" required>
                    @error('email')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Password</label>
                    <input type="password" name="password" class="input w-full" minlength="8">
                    <p class="text-xs text-text-muted mt-1">Kosongkan jika tidak ingin mengubah password</p>
                    @error('password')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-end gap-2 pt-4 border-t border-border">
                    <a href="{{ route('masjid.jamaah.index') }}" class="btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.masjid>
