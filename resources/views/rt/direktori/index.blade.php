<x-layouts.rt>
    <x-slot:title>Direktori Warga</x-slot:title>
    <x-slot:subtitle>Direktori keahlian dan UMKM warga RT 01</x-slot:subtitle>

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3 flex-1 max-w-md">
            <div class="relative flex-1">
                <svg class="absolute left-3 inset-y-0 my-auto w-4 h-4 text-text-muted pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                <input type="text" placeholder="Cari warga, keahlian, atau UMKM..." class="input pl-10">
            </div>
        </div>
        <div class="flex items-center gap-2">
            <select class="input text-sm py-1.5 w-auto">
                <option>Semua Kategori</option>
                <option>UMKM</option>
                <option>Keahlian</option>
                <option>Profesi</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @php
            $direktori = [
                ['name' => 'Budi Santoso', 'type' => 'UMKM', 'desc' => 'Warung Sembako', 'kontak' => '081234567890', 'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', 'color' => 'bg-emerald-100 text-emerald-600'],
                ['name' => 'Ahmad Fauzi', 'type' => 'Keahlian', 'desc' => 'Tukang Listrik', 'kontak' => '081234567892', 'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'color' => 'bg-blue-100 text-blue-600'],
                ['name' => 'Siti Rahma', 'type' => 'UMKM', 'desc' => 'Katering Rumahan', 'kontak' => '081234567891', 'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4', 'color' => 'bg-amber-100 text-amber-600'],
                ['name' => 'Rina Wijaya', 'type' => 'Profesi', 'desc' => 'Dokter Umum', 'kontak' => '081234567893', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'color' => 'bg-cyan-100 text-cyan-600'],
                ['name' => 'Doni Prasetyo', 'type' => 'Keahlian', 'desc' => 'Mekanik Motor', 'kontak' => '081234567894', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z', 'color' => 'bg-purple-100 text-purple-600'],
                ['name' => 'Desi Ratnasari', 'type' => 'UMKM', 'desc' => 'Laundry & Setrika', 'kontak' => '081234567895', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'color' => 'bg-rose-100 text-rose-600'],
                ['name' => 'Pak RT', 'type' => 'Profesi', 'desc' => 'Guru SD', 'kontak' => '081234567896', 'icon' => 'M12 14l9-5-9-5-9 5 9 5z', 'color' => 'bg-indigo-100 text-indigo-600'],
                ['name' => 'Bu Sekretaris', 'type' => 'UMKM', 'desc' => 'Toko Kue', 'kontak' => '081234567897', 'icon' => 'M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5', 'color' => 'bg-pink-100 text-pink-600'],
            ];
        @endphp
        @foreach ($direktori as $d)
            <x-ui.card class="hover:shadow-md transition-shadow">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl {{ $d['color'] }} flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $d['icon'] }}"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-sm font-semibold text-text-primary">{{ $d['name'] }}</h3>
                        <span class="{{ $d['type'] === 'UMKM' ? 'badge-success' : ($d['type'] === 'Keahlian' ? 'badge-warning' : 'badge-primary') }} text-[10px] mt-1">{{ $d['type'] }}</span>
                        <p class="text-sm text-text-secondary mt-1">{{ $d['desc'] }}</p>
                        <p class="text-xs text-text-muted mt-1">{{ $d['kontak'] }}</p>
                    </div>
                </div>
            </x-ui.card>
        @endforeach
    </div>
</x-layouts.rt>
