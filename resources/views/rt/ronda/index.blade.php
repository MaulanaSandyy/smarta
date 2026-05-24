<x-layouts.rt>
    <x-slot:title>Jadwal Ronda</x-slot:title>
    <x-slot:subtitle>Sistem jadwal ronda malam digital RT 01</x-slot:subtitle>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-ui.stats-card value="32" label="Warga Aktif Ronda" iconClass="bg-blue-100 text-blue-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="100%" label="Kehadiran Minggu Ini" iconClass="bg-emerald-100 text-emerald-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="8" label="Pos Ronda Aktif" iconClass="bg-amber-100 text-amber-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="0" label="Insiden Minggu Ini" iconClass="bg-rose-100 text-rose-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg></x-slot:icon>
        </x-ui.stats-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Jadwal Ronda --}}
        <x-ui.card>
            <x-slot:header>
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-semibold text-text-primary">Jadwal Ronda Minggu Ini</h3>
                    <button class="btn-primary btn-sm">Atur Jadwal</button>
                </div>
            </x-slot:header>
            <div class="space-y-3">
                @php
                    $ronda = [
                        ['hari' => 'Senin', 'waktu' => '22:00 - 05:00', 'petugas' => 'Ahmad Fauzi, Budi Santoso, Doni Prasetyo', 'pos' => 'Pos 1'],
                        ['hari' => 'Selasa', 'waktu' => '22:00 - 05:00', 'petugas' => 'Siti Rahma, Rina Wijaya, Desi Ratnasari', 'pos' => 'Pos 2'],
                        ['hari' => 'Rabu', 'waktu' => '22:00 - 05:00', 'petugas' => 'Budi Santoso, Ahmad Fauzi, Doni Prasetyo', 'pos' => 'Pos 1'],
                        ['hari' => 'Kamis', 'waktu' => '22:00 - 05:00', 'petugas' => 'Rina Wijaya, Siti Rahma, Desi Ratnasari', 'pos' => 'Pos 2'],
                        ['hari' => 'Jumat', 'waktu' => '22:00 - 05:00', 'petugas' => 'Doni Prasetyo, Budi Santoso, Ahmad Fauzi', 'pos' => 'Pos 1'],
                        ['hari' => 'Sabtu', 'waktu' => '22:00 - 05:00', 'petugas' => 'Desi Ratnasari, Rina Wijaya, Siti Rahma', 'pos' => 'Pos 2'],
                        ['hari' => 'Minggu', 'waktu' => '22:00 - 05:00', 'petugas' => 'Semua warga giliran', 'pos' => 'Semua Pos'],
                    ];
                @endphp
                @foreach ($ronda as $r)
                    <div class="flex items-center gap-4 p-3 rounded-xl bg-surface-secondary">
                        <div class="min-w-[60px] text-center">
                            <p class="text-xs font-semibold text-text-primary">{{ substr($r['hari'], 0, 3) }}</p>
                            <p class="text-[10px] text-text-muted">{{ $r['waktu'] }}</p>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-text-secondary truncate">{{ $r['petugas'] }}</p>
                        </div>
                        <span class="badge-slate text-[10px]">{{ $r['pos'] }}</span>
                    </div>
                @endforeach
            </div>
        </x-ui.card>

        {{-- Laporan Keamanan --}}
        <x-ui.card>
            <x-slot:header>
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-semibold text-text-primary">Laporan Keamanan</h3>
                    <button class="btn-secondary btn-sm">Buat Laporan</button>
                </div>
            </x-slot:header>
            <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-emerald-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <p class="text-base font-semibold text-text-primary">Aman Terkendali</p>
                <p class="text-sm text-text-muted mt-1">Tidak ada insiden keamanan minggu ini</p>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
