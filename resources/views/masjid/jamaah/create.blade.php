<x-layouts.masjid>
    <x-slot:title>Tambah Jamaah</x-slot:title>
    <x-slot:subtitle>Data jamaah baru</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <form action="{{ route('masjid.jamaah.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Nama <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" class="input w-full" value="{{ old('name') }}" maxlength="255" required>
                    @error('name')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Email <span class="text-rose-500">*</span></label>
                    <input type="email" name="email" class="input w-full" value="{{ old('email') }}" required>
                    @error('email')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1">Password <span class="text-rose-500">*</span></label>
                    <input type="password" name="password" class="input w-full" minlength="8" required>
                    <p class="text-xs text-text-muted mt-1">Minimal 8 karakter</p>
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
