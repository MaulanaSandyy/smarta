<x-layouts.masjid>
    <x-slot:title>Kalender Kegiatan</x-slot:title>
    <x-slot:subtitle>Jadwal kegiatan harian, bulanan, dan tahunan masjid</x-slot:subtitle>

    <div class="flex items-center gap-4 mb-6">
        <span class="text-sm text-text-secondary">Legenda:</span>
        @php
            $legends = [
                ['color' => 'bg-emerald-500', 'label' => 'Kajian'],
                ['color' => 'bg-blue-500', 'label' => 'Sholat/Jumat'],
                ['color' => 'bg-amber-500', 'label' => 'Kegiatan Sosial'],
                ['color' => 'bg-rose-500', 'label' => 'Peringatan'],
                ['color' => 'bg-purple-500', 'label' => 'Ramadhan'],
            ];
        @endphp
        @foreach ($legends as $l)
            <div class="flex items-center gap-1.5">
                <div class="w-2.5 h-2.5 rounded-full {{ $l['color'] }}"></div>
                <span class="text-xs text-text-muted">{{ $l['label'] }}</span>
            </div>
        @endforeach
    </div>

    <x-ui.card>
        <div class="grid grid-cols-7 gap-px bg-border">
            @php
                $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                $events = [
                    1 => ['label' => 'Kajian Tafsir', 'color' => 'bg-emerald-500'],
                    2 => ['label' => 'Khotbah Jumat', 'color' => 'bg-blue-500'],
                    5 => ['label' => 'Posyandu', 'color' => 'bg-amber-500'],
                    8 => ['label' => 'Kajian Fiqih', 'color' => 'bg-emerald-500'],
                    12 => ['label' => 'Pengajian Akbar', 'color' => 'bg-purple-500'],
                    15 => ['label' => 'Bakti Sosial', 'color' => 'bg-amber-500'],
                    19 => ['label' => 'Kajian Remaja', 'color' => 'bg-emerald-500'],
                    22 => ['label' => 'Khotbah Jumat', 'color' => 'bg-blue-500'],
                    26 => ['label' => 'Isra Miraj', 'color' => 'bg-rose-500'],
                    29 => ['label' => 'Kajian Tafsir', 'color' => 'bg-emerald-500'],
                ];
            @endphp
            @foreach ($days as $day)
                <div class="bg-surface-secondary px-3 py-2 text-center">
                    <span class="text-xs font-semibold text-text-muted">{{ $day }}</span>
                </div>
            @endforeach

            @for ($i = 0; $i < 5; $i++)
                <div class="bg-(--surface) min-h-[100px] p-2"></div>
            @endfor

            @for ($day = 1; $day <= 31; $day++)
                <div class="bg-(--surface) min-h-[100px] p-2 hover:bg-surface-secondary transition-colors">
                    <span class="text-sm font-medium {{ isset($events[$day]) ? 'text-emerald-600' : 'text-text-primary' }}">{{ $day }}</span>
                    @if (isset($events[$day]))
                        <div class="mt-1">
                            <span class="inline-block px-1.5 py-0.5 rounded text-[10px] text-white {{ $events[$day]['color'] }}">{{ $events[$day]['label'] }}</span>
                        </div>
                    @endif
                </div>
            @endfor
        </div>
    </x-ui.card>

    <div class="mt-6">
        <h3 class="text-base font-semibold text-text-primary mb-4">Kegiatan Mendatang</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @php
                $upcoming = [
                    ['date' => '28 Mei 2026', 'title' => 'Kajian Tafsir Al-Quran', 'time' => 'Ba\'da Maghrib', 'loc' => 'Masjid Al-Barakah', 'color' => 'emerald'],
                    ['date' => '30 Mei 2026', 'title' => 'Bakti Sosial Lingkungan', 'time' => '07:00 - 12:00', 'loc' => 'Lingkungan Masjid', 'color' => 'amber'],
                    ['date' => '1 Juni 2026', 'title' => 'Pengajian Akbar Bulanan', 'time' => '07:00 - 10:00', 'loc' => 'Halaman Masjid', 'color' => 'purple'],
                ];
            @endphp
            @foreach ($upcoming as $u)
                <x-ui.card>
                    <div class="flex items-start gap-3">
                        <div class="w-1 h-12 rounded-full {{ match($u['color']) { 'emerald' => 'bg-emerald-500', 'amber' => 'bg-amber-500', 'purple' => 'bg-purple-500', default => 'bg-slate-500' } }}"></div>
                        <div>
                            <p class="text-xs text-text-muted">{{ $u['date'] }}</p>
                            <h4 class="text-sm font-semibold text-text-primary mt-0.5">{{ $u['title'] }}</h4>
                            <div class="flex items-center gap-3 mt-1 text-xs text-text-muted">
                                <span>{{ $u['time'] }}</span>
                                <span>{{ $u['loc'] }}</span>
                            </div>
                        </div>
                    </div>
                </x-ui.card>
            @endforeach
        </div>
    </div>
</x-layouts.masjid>
