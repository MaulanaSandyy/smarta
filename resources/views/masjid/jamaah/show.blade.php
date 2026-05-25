<x-layouts.masjid>
    <x-slot:title>Detail Jamaah</x-slot:title>
    <x-slot:subtitle>{{ $jamaah->name }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Nama</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $jamaah->name }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Email</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $jamaah->email }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Terdaftar</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $jamaah->created_at ? \Carbon\Carbon::parse($jamaah->created_at)->format('d/m/Y') : '-' }}</span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('masjid.jamaah.edit', $jamaah) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('masjid.jamaah.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.masjid>
