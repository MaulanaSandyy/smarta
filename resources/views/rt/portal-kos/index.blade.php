<x-layouts.rt>
    <x-slot:title>Portal Anak Kos & Kontrakan</x-slot:title>
    <x-slot:subtitle>Data penghuni kontrakan dan anak kos di RT 01</x-slot:subtitle>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <x-ui.stats-card value="12" label="Penghuni Kos" iconClass="bg-blue-100 text-blue-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="8" label="Keluarga Kontrakan" iconClass="bg-amber-100 text-amber-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="5" label="Pemilik Kontrakan" iconClass="bg-emerald-100 text-emerald-600">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg></x-slot:icon>
        </x-ui.stats-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Anak Kos --}}
        <x-ui.card>
            <x-slot:header>
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-semibold text-text-primary">Data Anak Kos</h3>
                    <button class="btn-primary btn-sm">Tambah</button>
                </div>
            </x-slot:header>
            <div class="space-y-3">
                @php
                    $kos = [
                        ['name' => 'Andi Pratama', 'usia' => '22', 'pekerjaan' => 'Mahasiswa', 'masa' => '6 bulan', 'kontak' => '081234567901', 'darurat' => '081234567911'],
                        ['name' => 'Bella Sari', 'usia' => '24', 'pekerjaan' => 'Karyawan Swasta', 'masa' => '1 tahun', 'kontak' => '081234567902', 'darurat' => '081234567912'],
                        ['name' => 'Cahyo Nugroho', 'usia' => '23', 'pekerjaan' => 'Freelancer', 'masa' => '3 bulan', 'kontak' => '081234567903', 'darurat' => '081234567913'],
                        ['name' => 'Diana Putri', 'usia' => '21', 'pekerjaan' => 'Mahasiswa', 'masa' => '8 bulan', 'kontak' => '081234567904', 'darurat' => '081234567914'],
                        ['name' => 'Eko Prasetyo', 'usia' => '25', 'pekerjaan' => 'Karyawan BUMN', 'masa' => '2 tahun', 'kontak' => '081234567905', 'darurat' => '081234567915'],
                    ];
                @endphp
                @foreach ($kos as $k)
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-surface-secondary">
                        <div class="w-9 h-9 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center text-sm font-semibold">{{ substr($k['name'], 0, 1) }}</div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-text-primary">{{ $k['name'] }}</p>
                            <p class="text-xs text-text-muted">{{ $k['pekerjaan'] }} &middot; {{ $k['usia'] }} thn</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-text-muted">{{ $k['masa'] }}</p>
                            <span class="badge-slate text-[10px]">Kontak</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-ui.card>

        {{-- Kontrakan --}}
        <x-ui.card>
            <x-slot:header>
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-semibold text-text-primary">Data Kontrakan</h3>
                    <button class="btn-primary btn-sm">Tambah</button>
                </div>
            </x-slot:header>
            <div class="space-y-3">
                @php
                    $kontrakan = [
                        ['alamat' => 'Jl. Merdeka No. 3', 'penghuni' => 'Rina Wijaya', 'pemilik' => 'H. Ahmad', 'masa' => '1 tahun', 'status' => 'Aktif'],
                        ['alamat' => 'Jl. Merdeka No. 7', 'penghuni' => 'Fajar Hidayat (keluarga)', 'pemilik' => 'Ibu Dewi', 'masa' => '2 tahun', 'status' => 'Aktif'],
                        ['alamat' => 'Jl. Merdeka No. 9', 'penghuni' => 'Gilang Ramadhan', 'pemilik' => 'Pak RT', 'masa' => '6 bulan', 'status' => 'Aktif'],
                        ['alamat' => 'Jl. Merdeka No. 12', 'penghuni' => '-', 'pemilik' => 'Bpk. Suharto', 'masa' => '-', 'status' => 'Kosong'],
                        ['alamat' => 'Jl. Merdeka No. 15', 'penghuni' => 'Hesti Nurani', 'pemilik' => 'Ibu Ani', 'masa' => '1 tahun', 'status' => 'Aktif'],
                    ];
                @endphp
                @foreach ($kontrakan as $k)
                    <div class="p-3 rounded-xl bg-surface-secondary">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm font-medium text-text-primary">{{ $k['alamat'] }}</p>
                                <p class="text-xs text-text-muted mt-0.5">Penghuni: {{ $k['penghuni'] }}</p>
                                <p class="text-xs text-text-muted">Pemilik: {{ $k['pemilik'] }}</p>
                            </div>
                            <div class="text-right">
                                <span class="{{ $k['status'] === 'Aktif' ? 'badge-success' : 'badge-slate' }}">{{ $k['status'] }}</span>
                                <p class="text-xs text-text-muted mt-1">{{ $k['masa'] !== '-' ? $k['masa'] : '' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-ui.card>
    </div>

    {{-- Kontak Darurat --}}
    <x-ui.card class="mt-6">
        <x-slot:header>
            <h3 class="text-base font-semibold text-text-primary">Kontak Darurat</h3>
        </x-slot:header>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @php
                $darurat = [
                    ['label' => 'Polisi', 'kontak' => '110', 'icon' => 'shield', 'color' => 'bg-blue-600'],
                    ['label' => 'Pemadam Kebakaran', 'kontak' => '113', 'icon' => 'flame', 'color' => 'bg-rose-600'],
                    ['label' => 'Ambulans', 'kontak' => '118', 'icon' => 'ambulance', 'color' => 'bg-emerald-600'],
                    ['label' => 'PLN', 'kontak' => '123', 'icon' => 'zap', 'color' => 'bg-amber-600'],
                ];
            @endphp
            @foreach ($darurat as $d)
                <div class="flex items-center gap-3 p-3 rounded-xl bg-surface-secondary">
                    <div class="w-10 h-10 rounded-xl {{ $d['color'] }} flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($d['icon'] === 'shield')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            @elseif($d['icon'] === 'flame')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                            @elseif($d['icon'] === 'ambulance')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            @endif
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-text-primary">{{ $d['kontak'] }}</p>
                        <p class="text-xs text-text-muted">{{ $d['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-ui.card>
</x-layouts.rt>
