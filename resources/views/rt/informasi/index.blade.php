<x-layouts.rt>
    <x-slot:title>Informasi & Pengumuman</x-slot:title>
    <x-slot:subtitle>Pengumuman dan informasi terbaru untuk warga RT 01</x-slot:subtitle>

    <div class="flex justify-end mb-6">
        <button class="btn-primary btn-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Buat Pengumuman
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @php
            $informasi = [
                ['title' => 'Kerja Bakti Lingkungan', 'desc' => 'Kegiatan kerja bakti akan dilaksanakan pada hari Minggu, 28 Mei 2026 pukul 07.00 WIB. Diharapkan semua warga berpartisipasi. Kegiatan meliputi pembersihan selokan, pengecatan pagar balai RT, dan penanaman pohon di area sekitar. Mohon membawa peralatan kebersihan masing-masing.', 'date' => '25 Mei 2026', 'author' => 'Ketua RT', 'badge' => 'Kegiatan', 'badgeClass' => 'badge-primary'],
                ['title' => 'Pembayaran Iuran Bulanan', 'desc' => 'Pembayaran iuran bulan Juni 2026 dibuka mulai tanggal 1-10 Juni. Pembayaran dapat dilakukan melalui Bendahara RT atau transfer ke rekening kas RT. Iuran bulan ini Rp 50.000 per KK. Mohon dibayar tepat waktu untuk kelancaran kegiatan RT.', 'date' => '24 Mei 2026', 'author' => 'Bendahara', 'badge' => 'Penting', 'badgeClass' => 'badge-danger'],
                ['title' => 'Jadwal Posyandu Balita', 'desc' => 'Posyandu balita dilaksanakan setiap hari Rabu pukul 08.00-11.00 WIB di Balai RT. Bawa KMS balita masing-masing. Layanan meliputi penimbangan, pengukuran, imunisasi, dan konsultasi gizi. Untuk balita yang belum lengkap imunisasinya, segera datang ke posyandu.', 'date' => '23 Mei 2026', 'author' => 'Sekretaris', 'badge' => 'Kesehatan', 'badgeClass' => 'badge-success'],
                ['title' => 'Pengajian Rutin Malam Jumat', 'desc' => 'Pengajian rutin malam Jumat akan diadakan di Masjid Al-Barakah. Dimulai ba\'da Maghrib dengan kajian kitab kuning yang dibawakan oleh Ustadz H. Ahmad. Dilanjutkan dengan shalat Isya berjamaah dan tanya jawab seputar fiqih ibadah sehari-hari.', 'date' => '22 Mei 2026', 'author' => 'Ketua RT', 'badge' => 'Keagamaan', 'badgeClass' => 'badge-warning'],
                ['title' => 'Lomba 17-an Persiapan', 'desc' => 'Persiapan lomba 17 Agustus sudah dimulai. Silakan daftar ke panitia untuk setiap cabang lomba yang diminati. Cabang lomba yang tersedia: balap karung, makan kerupuk, panjat pinang, lomba kelereng, dan fashion show. Pendaftaran ditutup 10 Agustus 2026.', 'date' => '21 Mei 2026', 'author' => 'Panitia', 'badge' => 'Kegiatan', 'badgeClass' => 'badge-primary'],
                ['title' => 'Pemberitahuan Pemadaman Listrik', 'desc' => 'Akan ada pemadaman listrik bergilir di wilayah RT 01 pada hari Sabtu, 27 Mei 2026 pukul 09.00-15.00 WIB. Mohon warga mempersiapkan diri. Untuk informasi lebih lanjut hubungi PLN atau operator setempat. Charger power bank dan baterai darurat sebelum pemadaman.', 'date' => '20 Mei 2026', 'author' => 'Operator', 'badge' => 'Info', 'badgeClass' => 'badge-slate'],
            ];
        @endphp
        @foreach ($informasi as $i => $info)
            <x-ui.card class="hover:shadow-md transition-shadow cursor-pointer" @click="window['modal-info-{{ $i }}'].open()">
                <div class="flex flex-col h-full">
                    <div class="flex items-start justify-between mb-3">
                        <span class="{{ $info['badgeClass'] }}">{{ $info['badge'] }}</span>
                        <span class="text-xs text-text-muted">{{ $info['date'] }}</span>
                    </div>
                    <h3 class="text-base font-semibold text-text-primary mb-2">{{ $info['title'] }}</h3>
                    <p class="text-sm text-text-secondary leading-relaxed flex-1 line-clamp-3">{{ $info['desc'] }}</p>
                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-border">
                        <span class="text-xs text-text-muted">Oleh: {{ $info['author'] }}</span>
                        <button @click.stop="window['modal-info-{{ $i }}'].open()" class="text-sm text-primary-600 hover:text-primary-700 font-medium">Baca</button>
                    </div>
                </div>
            </x-ui.card>

            <x-ui.modal name="info-{{ $i }}" header="{{ $info['title'] }}">
                <div class="space-y-4">
                    <div class="flex items-center gap-3 flex-wrap">
                        <span class="{{ $info['badgeClass'] }}">{{ $info['badge'] }}</span>
                        <span class="text-xs text-text-muted">{{ $info['date'] }}</span>
                        <span class="text-xs text-text-muted">Oleh: {{ $info['author'] }}</span>
                    </div>
                    <div class="prose prose-sm max-w-none text-text-secondary leading-relaxed">
                        {{ $info['desc'] }}
                    </div>
                </div>
            </x-ui.modal>
        @endforeach
    </div>
</x-layouts.rt>
