<x-layouts.rt>
    <x-slot:title>Riwayat Pembayaran Iuran</x-slot:title>
    <x-slot:subtitle>Daftar pembayaran iuran warga</x-slot:subtitle>

    <div class="bg-(--surface) border border-border rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-border">
                        <th class="table-header">Warga</th>
                        <th class="table-header">Iuran</th>
                        <th class="table-header">Jumlah</th>
                        <th class="table-header">Bulan</th>
                        <th class="table-header">Tanggal Bayar</th>
                        <th class="table-header">Metode</th>
                        <th class="table-header">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($pembayaran as $item)
                    <tr class="hover:bg-surface-secondary transition-colors">
                        <td class="table-cell">{{ $item->warga->nama ?? 'Warga' }}</td>
                        <td class="table-cell">{{ $item->iuran->nama ?? '-' }}</td>
                        <td class="table-cell font-mono">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        <td class="table-cell">{{ $item->bulan }}</td>
                        <td class="table-cell">{{ $item->tanggal_bayar ? \Carbon\Carbon::parse($item->tanggal_bayar)->format('d/m/Y') : '-' }}</td>
                        <td class="table-cell">{{ ucfirst($item->metode) }}</td>
                        <td class="table-cell">
                            @if($item->dikonfirmasi)
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Lunas</span>
                            @else
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">Menunggu</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="table-cell text-center py-12">
                            <p class="text-sm text-text-muted">Belum ada pembayaran</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 sm:px-6 py-3 border-t border-border">
            {{ $pembayaran->links() }}
        </div>
    </div>
</x-layouts.rt>
