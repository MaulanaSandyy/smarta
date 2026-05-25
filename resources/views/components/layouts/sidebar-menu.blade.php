@php
$menuItems = [
    [
        'label' => 'Dashboard',
        'icon' => 'grid',
        'route' => 'rt.dashboard',
        'active' => request()->routeIs('rt.dashboard'),
    ],
    [
        'label' => 'Data Warga',
        'icon' => 'users',
        'route' => 'rt.data-warga.index',
        'active' => request()->routeIs('rt.data-warga*'),
    ],
    [
        'label' => 'Pengajuan Surat',
        'icon' => 'file-text',
        'route' => 'rt.surat.index',
        'active' => request()->routeIs('rt.surat*'),
    ],
    [
        'label' => 'Informasi & Pengumuman',
        'icon' => 'megaphone',
        'route' => 'rt.informasi.index',
        'active' => request()->routeIs('rt.informasi*'),
    ],
    [
        'label' => 'Pembayaran Iuran',
        'icon' => 'wallet',
        'route' => 'rt.iuran.index',
        'active' => request()->routeIs('rt.iuran*'),
    ],
    [
        'label' => 'Laporan & Aspirasi',
        'icon' => 'message-square',
        'route' => 'rt.laporan.index',
        'active' => request()->routeIs('rt.laporan*'),
    ],
    [
        'label' => 'Agenda Kegiatan',
        'icon' => 'calendar',
        'route' => 'rt.agenda.index',
        'active' => request()->routeIs('rt.agenda*'),
    ],
    [
        'label' => 'Sistem Kas',
        'icon' => 'banknote',
        'route' => 'rt.kas.index',
        'active' => request()->routeIs('rt.kas*'),
    ],
    [
        'label' => 'Jadwal Ronda',
        'icon' => 'shield',
        'route' => 'rt.ronda.index',
        'active' => request()->routeIs('rt.ronda*'),
    ],
    [
        'label' => 'Direktori Warga',
        'icon' => 'book-open',
        'route' => 'rt.direktori',
        'active' => request()->routeIs('rt.direktori'),
    ],
    [
        'label' => 'Kalender Lingkungan',
        'icon' => 'calendar-range',
        'route' => 'rt.kalender.index',
        'active' => request()->routeIs('rt.kalender*'),
    ],
    [
        'label' => 'Portal Anak Kos',
        'icon' => 'home',
        'route' => 'rt.portal-kos.index',
        'active' => request()->routeIs('rt.portal-kos*'),
    ],
];
@endphp

@foreach ($menuItems as $item)
    @php
        $isActive = $item['active'];
    @endphp
    <a href="{{ route($item['route']) }}"
       class="{{ $isActive ? 'sidebar-link-active' : 'sidebar-link' }}"
       x-data
       @click="close()">
        <x-dynamic-component :component="'icons.' . $item['icon']" class="w-5 h-5 flex-shrink-0" />
        <span x-show="!isCollapsed || window.innerWidth < 1024" x-cloak>{{ $item['label'] }}</span>
    </a>
@endforeach
