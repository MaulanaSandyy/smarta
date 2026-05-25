@php
$menuItems = [
    [
        'label' => 'Dashboard',
        'icon' => 'grid',
        'route' => 'masjid.dashboard',
        'active' => request()->routeIs('masjid.dashboard'),
    ],
    [
        'label' => 'Manajemen Jamaah',
        'icon' => 'users',
        'route' => 'masjid.jamaah.index',
        'active' => request()->routeIs('masjid.jamaah*'),
    ],
    [
        'label' => 'Keuangan Masjid',
        'icon' => 'banknote',
        'route' => 'masjid.keuangan.index',
        'active' => request()->routeIs('masjid.keuangan*'),
    ],
    [
        'label' => 'Donasi & Zakat',
        'icon' => 'gift',
        'route' => 'masjid.donasi.index',
        'active' => request()->routeIs('masjid.donasi*'),
    ],
    [
        'label' => 'Jadwal Kajian & Sholat',
        'icon' => 'book-open',
        'route' => 'masjid.kajian.index',
        'active' => request()->routeIs('masjid.kajian*'),
    ],
    [
        'label' => 'Inventaris Masjid',
        'icon' => 'package',
        'route' => 'masjid.inventaris.index',
        'active' => request()->routeIs('masjid.inventaris*'),
    ],
    [
        'label' => 'Kalender Kegiatan',
        'icon' => 'calendar',
        'route' => 'masjid.kalender.index',
        'active' => request()->routeIs('masjid.kalender*'),
    ],
    [
        'label' => 'Galeri & Informasi',
        'icon' => 'image',
        'route' => 'masjid.galeri.index',
        'active' => request()->routeIs('masjid.galeri*'),
    ],
];
@endphp

@foreach ($menuItems as $item)
    @php
        $isActive = $item['active'];
    @endphp
    <a href="{{ route($item['route']) }}"
       class="{{ $isActive ? 'masjid-sidebar-link-active' : 'masjid-sidebar-link' }}"
       x-data
       @click="close()">
        <x-dynamic-component :component="'icons.' . $item['icon']" class="w-5 h-5 flex-shrink-0" />
        <span x-show="!isCollapsed || window.innerWidth < 1024" x-cloak>{{ $item['label'] }}</span>
    </a>
@endforeach
