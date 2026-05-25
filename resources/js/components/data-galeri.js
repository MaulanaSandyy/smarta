export default function () {
    return {
        items: [
            { title: 'Kajian Tafsir Al-Quran', desc: 'Kegiatan kajian tafsir rutin setiap Senin ba\'da Maghrib', date: '25 Mei 2026', type: 'Foto', count: '12 foto' },
            { title: 'Bakti Sosial Ramadhan', desc: 'Pembagian paket sembako untuk warga kurang mampu', date: '20 Mei 2026', type: 'Foto', count: '24 foto' },
            { title: 'Pengajian Akbar', desc: 'Pengajian akbar dengan tema "Memperkuat Ukhuwah Islamiyah"', date: '15 Mei 2026', type: 'Video', count: '2 video' },
            { title: 'Peringatan Isra Miraj', desc: 'Peringatan Isra Miraj Nabi Muhammad SAW 1447 H', date: '10 Mei 2026', type: 'Foto', count: '18 foto' },
            { title: 'Khotbah Jumat Spesial', desc: 'Khotbah Jumat dengan Ustadz tamu dari Jakarta', date: '8 Mei 2026', type: 'Video', count: '1 video' },
            { title: 'Gotong Royong Masjid', desc: 'Kegiatan gotong royong membersihkan dan merawat masjid', date: '5 Mei 2026', type: 'Foto', count: '8 foto' },
            { title: 'Artikel: Keutamaan Sholat', desc: 'Sholat berjamaah memiliki keutamaan 27 derajat dibanding sholat sendirian...', date: '24 Mei 2026', type: 'Artikel', count: 'Baca' },
            { title: 'Jadwal Kajian Bulan Juni', desc: 'Berikut adalah jadwal lengkap kajian dan kegiatan masjid selama bulan Juni 2026...', date: '23 Mei 2026', type: 'Artikel', count: 'Baca' },
            { title: 'Laporan Keuangan Bulanan', desc: 'Laporan keuangan masjid periode Mei 2026 telah selesai dan dapat diakses...', date: '22 Mei 2026', type: 'Artikel', count: 'Baca' },
        ],
        filterType: 'Semua',
        selectedItem: null,
        form: { title: '', desc: '', date: '', type: 'Foto' },

        get filtered() {
            if (this.filterType === 'Semua') return this.items;
            return this.items.filter(i => i.type === this.filterType);
        },

        get totalFoto() { return this.items.filter(i => i.type === 'Foto').length; },
        get totalVideo() { return this.items.filter(i => i.type === 'Video').length; },
        get totalArtikel() { return this.items.filter(i => i.type === 'Artikel').length; },

        colorClass(type) {
            const map = { Foto: 'bg-emerald-500', Video: 'bg-purple-500', Artikel: 'bg-blue-500' };
            return map[type] || 'bg-slate-500';
        },

        setFilter(t) {
            this.filterType = t;
        },

        lihat(item) {
            this.selectedItem = item;
            window['modal-detail-galeri'].open();
        },

        bukaUnggah() {
            this.form = { title: '', desc: '', date: '', type: 'Foto' };
            window['modal-unggah'].open();
        },

        unggah() {
            if (!this.form.title) return;
            this.items.unshift({ ...this.form, count: 'Baru' });
            window['modal-unggah'].close();
        },
    };
}
