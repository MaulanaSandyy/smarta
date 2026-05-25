<x-layouts.masjid>
    <x-slot:title>Dashboard Masjid</x-slot:title>
    <x-slot:subtitle>Selamat datang kembali, <span x-text="userName">Admin</span></x-slot:subtitle>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-ui.stats-card value="{{ number_format($totalJamaah, 0, ',', '.') }}" label="Total Jamaah" iconClass="bg-emerald-100 text-emerald-600" :trend="['positive' => true, 'value' => '+15']">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="Rp {{ number_format($totalKeuangan, 0, ',', '.') }}" label="Saldo Kas Masjid" iconClass="bg-blue-100 text-blue-600" :trend="['positive' => true, 'value' => '+Rp 2.3jt']">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="Rp {{ number_format($totalDonasi, 0, ',', '.') }}" label="Donasi Bulan Ini" iconClass="bg-amber-100 text-amber-600" :trend="['positive' => true, 'value' => '+Rp 850rb']">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg></x-slot:icon>
        </x-ui.stats-card>
        <x-ui.stats-card value="{{ $totalKajian }}" label="Kajian Bulan Ini" iconClass="bg-cyan-100 text-cyan-600" :trend="['positive' => false, 'value' => '-2']">
            <x-slot:icon><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></x-slot:icon>
        </x-ui.stats-card>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <x-ui.card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Aktivitas Terbaru</h3>
                        <button @click="window['modal-aktivitas'].open()" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium transition-colors">Lihat Semua</button>
                    </div>
                </x-slot:header>
                <div class="space-y-4">
                    @forelse ($transaksiTerbaru as $item)
                        <div class="flex items-start gap-3 pb-4 {{ !$loop->last ? 'border-b border-border' : '' }}">
                            <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-semibold flex-shrink-0">
                                {{ substr($item->ket, 0, 1) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-text-primary">
                                    <span class="font-medium">{{ $item->kategori }}</span>
                                    <span class="text-text-secondary"> {{ $item->ket }}</span>
                                </p>
                                <p class="text-xs text-text-muted mt-0.5">{{ $item->tgl }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-text-muted text-center py-4">Belum ada aktivitas terbaru</p>
                    @endforelse
                </div>
            </x-ui.card>
        </div>

        <div class="space-y-6">
            <x-ui.card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Kajian Mendatang</h3>
                        <span class="badge-success">Selanjutnya</span>
                    </div>
                </x-slot:header>
                <div class="space-y-2">
                    @forelse ($kajianMendatang as $kajian)
                        <div class="flex items-center justify-between py-2 {{ !$loop->last ? 'border-b border-border' : '' }}">
                            <span class="text-sm font-medium text-text-primary">{{ $kajian->judul }}</span>
                            <div class="text-right">
                                <span class="text-sm text-text-primary">{{ $kajian->tanggal ? \Carbon\Carbon::parse($kajian->tanggal)->format('d/m') : '' }}</span>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-text-muted text-center py-4">Belum ada kajian mendatang</p>
                    @endforelse
                </div>
            </x-ui.card>

            <x-ui.card>
                <x-slot:header>
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-text-primary">Donasi Terbaru</h3>
                        <span class="badge-primary">Hari Ini</span>
                    </div>
                </x-slot:header>
                <div class="space-y-2">
                    @forelse ($transaksiTerbaru as $item)
                        <div class="flex items-center justify-between py-2">
                            <div>
                                <p class="text-sm font-medium text-text-primary">{{ $item->ket }}</p>
                                <span class="badge-slate text-[10px]">{{ $item->kategori }}</span>
                            </div>
                            <span class="text-sm font-semibold text-emerald-600">Rp {{ number_format($item->masuk > 0 ? $item->masuk : $item->keluar, 0, ',', '.') }}</span>
                        </div>
                    @empty
                        <p class="text-sm text-text-muted text-center py-4">Belum ada donasi</p>
                    @endforelse
                </div>
            </x-ui.card>
        </div>
    </div>

    {{-- Modal Aktivitas --}}
    <x-ui.modal name="aktivitas" header="Semua Aktivitas">
        <div class="space-y-4">
            @forelse ($transaksiTerbaru as $item)
                <div class="flex items-start gap-3 pb-4 {{ !$loop->last ? 'border-b border-border' : '' }}">
                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-semibold flex-shrink-0">
                        {{ substr($item->ket, 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-text-primary">
                            <span class="font-medium">{{ $item->kategori }}</span>
                            <span class="text-text-secondary"> {{ $item->ket }}</span>
                        </p>
                        <p class="text-xs text-text-muted mt-0.5">{{ $item->tgl }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-text-muted text-center py-4">Belum ada aktivitas</p>
            @endforelse
        </div>
    </x-ui.modal>
</x-layouts.masjid>
