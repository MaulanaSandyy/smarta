export default function () {
    return {
        items: [
            { hari: 'Senin', judul: 'Tafsir Al-Quran', waktu: "Ba'da Maghrib", pemateri: 'Ustadz Abdurrahman', tempat: 'Ruang Utama', badge: 'Rutin' },
            { hari: 'Selasa', judul: 'Fiqih Ibadah', waktu: "Ba'da Subuh", pemateri: 'Ustadz Hafidz', tempat: 'Ruang Utama', badge: 'Rutin' },
            { hari: 'Rabu', judul: 'Kajian Remaja', waktu: '16:00 - 17:30', pemateri: 'Ustadz Fauzi', tempat: 'Aula', badge: 'Remaja' },
            { hari: 'Kamis', judul: 'Tahsin & Tahfidz', waktu: "Ba'da Maghrib", pemateri: 'Ustadzah Aminah', tempat: 'Ruang Wanita', badge: 'Rutin' },
            { hari: 'Jumat', judul: 'Khotbah Jumat', waktu: '12:00', pemateri: 'Bergilir', tempat: 'Ruang Utama', badge: 'Khatib' },
            { hari: 'Sabtu', judul: 'Kajian Ahad Pagi', waktu: '06:00 - 08:00', pemateri: 'Ustadz Abdurrahman', tempat: 'Ruang Utama', badge: 'Mingguan' },
            { hari: 'Minggu', judul: 'Pengajian Akbar', waktu: '07:00 - 09:00', pemateri: 'Ustadz Tamu', tempat: 'Halaman Masjid', badge: 'Bulanan' },
        ],
        sholat: [
            { name: 'Subuh', time: '04:30', imam: 'Ustadz Hafidz' },
            { name: 'Dzuhur', time: '11:55', imam: 'H. Ahmad' },
            { name: 'Ashar', time: '15:10', imam: 'Ustadz Abdurrahman' },
            { name: 'Maghrib', time: '17:45', imam: 'Ustadz Fauzi' },
            { name: 'Isya', time: '19:00', imam: 'H. Ahmad' },
        ],
        khatib: [
            { tgl: '26 Mei', khatib: 'Ustadz Abdurrahman', tema: 'Keutamaan Sholat Berjamaah' },
            { tgl: '2 Juni', khatib: 'Ustadz Hafidz', tema: 'Pentingnya Sedekah' },
            { tgl: '9 Juni', khatib: 'Ustadz Tamu', tema: 'TBD' },
        ],
        search: '',
        filterBadge: 'Semua',
        perPage: 5,
        page: 1,
        selectedItem: null,
        form: { hari: '', judul: '', waktu: '', pemateri: '', tempat: '', badge: 'Rutin' },

        get badgeList() {
            return [...new Set(this.items.map(i => i.badge))];
        },

        get filtered() {
            let result = this.items;
            if (this.search) {
                const q = this.search.toLowerCase();
                result = result.filter(i => i.judul.toLowerCase().includes(q) || i.pemateri.toLowerCase().includes(q));
            }
            if (this.filterBadge !== 'Semua') {
                result = result.filter(i => i.badge === this.filterBadge);
            }
            return result;
        },

        get totalPages() {
            return Math.ceil(this.filtered.length / this.perPage) || 1;
        },

        get paginated() {
            const start = (this.page - 1) * this.perPage;
            return this.filtered.slice(start, start + this.perPage);
        },

        get totalKajian() { return this.items.length; },
        get totalRutin() { return this.items.filter(i => i.badge === 'Rutin').length; },
        get totalMingguan() { return this.items.filter(i => ['Mingguan', 'Bulanan'].includes(i.badge)).length; },

        badgeClass(badge) {
            const map = { Rutin: 'badge-success', Remaja: 'badge-primary', Khatib: 'badge-warning', Mingguan: 'badge-primary', Bulanan: 'badge-warning' };
            return map[badge] || 'badge-slate';
        },

        lihat(item) {
            this.selectedItem = item;
            window['modal-detail-kajian'].open();
        },

        bukaTambah() {
            this.form = { hari: '', judul: '', waktu: '', pemateri: '', tempat: '', badge: 'Rutin' };
            window['modal-tambah-kajian'].open();
        },

        simpanKajian() {
            if (!this.form.judul || !this.form.hari) return;
            this.items.push({ ...this.form });
            window['modal-tambah-kajian'].close();
        },

        bukaKhatib() {
            window['modal-atur-khatib'].open();
        },
    };
}
