<x-layouts.rt>
    <x-slot:title>Detail Agenda</x-slot:title>
    <x-slot:subtitle>{{ $agenda->judul }}</x-slot:subtitle>

    <div class="max-w-2xl">
        <x-ui.card>
            <div class="space-y-4">
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Judul</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $agenda->judul }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tanggal</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $agenda->tanggal ? \Carbon\Carbon::parse($agenda->tanggal)->format('d/m/Y') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Waktu</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $agenda->waktu ? \Carbon\Carbon::parse($agenda->waktu)->format('H:i') : '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Tempat</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $agenda->tempat ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Kategori</span>
                    <span class="text-text-primary font-medium mt-0.5 block">{{ $agenda->kategori }}</span>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider mb-1">Deskripsi</span>
                    <div class="text-text-primary whitespace-pre-line leading-relaxed">{{ $agenda->deskripsi }}</div>
                </div>
                <div>
                    <span class="block text-xs font-medium text-text-muted uppercase tracking-wider">Status</span>
                    @php
                        $statusAgendaClasses = [
                            'direncanakan' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
                            'berlangsung' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
                            'selesai' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                            'dibatalkan' => 'bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400',
                        ];
                        $class = $statusAgendaClasses[$agenda->status] ?? 'bg-gray-100 text-gray-700';
                    @endphp
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $class }}">
                        {{ ucfirst($agenda->status) }}
                    </span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-6 pt-4 border-t border-border">
                <a href="{{ route('rt.agenda.edit', $agenda) }}" class="btn-primary btn-sm">Edit</a>
                <a href="{{ route('rt.agenda.index') }}" class="btn-secondary btn-sm">Kembali</a>
            </div>
        </x-ui.card>
    </div>
</x-layouts.rt>
