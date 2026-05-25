export default function () {
    return {
        today: new Date(),
        month: new Date().getMonth(),
        year: new Date().getFullYear(),
        events: [
            { date: 1, label: 'Kajian Tafsir', color: 'emerald' },
            { date: 2, label: 'Khotbah Jumat', color: 'blue' },
            { date: 5, label: 'Posyandu', color: 'amber' },
            { date: 8, label: 'Kajian Fiqih', color: 'emerald' },
            { date: 12, label: 'Pengajian Akbar', color: 'purple' },
            { date: 15, label: 'Bakti Sosial', color: 'amber' },
            { date: 19, label: 'Kajian Remaja', color: 'emerald' },
            { date: 22, label: 'Khotbah Jumat', color: 'blue' },
            { date: 26, label: 'Isra Miraj', color: 'rose' },
            { date: 29, label: 'Kajian Tafsir', color: 'emerald' },
        ],
        upcoming: [
            { date: '28 Mei 2026', title: 'Kajian Tafsir Al-Quran', time: "Ba'da Maghrib", loc: 'Masjid Al-Barakah', color: 'emerald' },
            { date: '30 Mei 2026', title: 'Bakti Sosial Lingkungan', time: '07:00 - 12:00', loc: 'Lingkungan Masjid', color: 'amber' },
            { date: '1 Juni 2026', title: 'Pengajian Akbar Bulanan', time: '07:00 - 10:00', loc: 'Halaman Masjid', color: 'purple' },
        ],
        selectedDate: null,
        form: { judul: '', tanggal: '', waktu: '', lokasi: '', kategori: 'Kajian' },

        colorMap: { emerald: 'bg-emerald-500', blue: 'bg-blue-500', amber: 'bg-amber-500', rose: 'bg-rose-500', purple: 'bg-purple-500' },

        get monthName() {
            return ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'][this.month];
        },

        get daysInMonth() {
            return new Date(this.year, this.month + 1, 0).getDate();
        },

        get firstDay() {
            return new Date(this.year, this.month, 1).getDay();
        },

        get kalenderGrid() {
            const grid = [];
            for (let i = 0; i < this.firstDay; i++) grid.push(null);
            for (let d = 1; d <= this.daysInMonth; d++) grid.push(d);
            return grid;
        },

        dateStr(d) {
            return this.year + '-' + String(this.month + 1).padStart(2, '0') + '-' + String(d).padStart(2, '0');
        },

        eventsOn(d) {
            return this.events.filter(e => e.date === d);
        },

        eventsOnDate(dateStr) {
            const d = parseInt(dateStr.split('-')[2]);
            return this.events.filter(e => e.date === d && new Date(this.year, this.month, e.date).getMonth() === this.month);
        },

        isToday(d) {
            const t = this.today;
            return d === t.getDate() && this.month === t.getMonth() && this.year === t.getFullYear();
        },

        prevMonth() {
            if (this.month === 0) { this.month = 11; this.year--; }
            else { this.month--; }
        },

        nextMonth() {
            if (this.month === 11) { this.month = 0; this.year++; }
            else { this.month++; }
        },

        klikHari(d) {
            if (!d) return;
            this.selectedDate = this.dateStr(d);
            window['modal-detail-hari'].open();
        },

        colorClass(color) {
            return this.colorMap[color] || 'bg-slate-500';
        },

        upcomingColorClass(color) {
            const m = { emerald: 'bg-emerald-500', amber: 'bg-amber-500', purple: 'bg-purple-500' };
            return m[color] || 'bg-slate-500';
        },

        bukaTambah() {
            this.form = { judul: '', tanggal: '', waktu: '', lokasi: '', kategori: 'Kajian' };
            window['modal-tambah-agenda'].open();
        },

        tambahAgenda() {
            if (!this.form.judul || !this.form.tanggal) return;
            const d = new Date(this.form.tanggal);
            this.events.push({ date: d.getDate(), label: this.form.judul, color: this.form.kategori });
            this.upcoming.push({ date: this.form.tanggal, title: this.form.judul, time: this.form.waktu || '-', loc: this.form.lokasi || '-', color: this.form.kategori });
            window['modal-tambah-agenda'].close();
        },

        hapusEvent(idx) {
            this.events.splice(idx, 1);
        },

        hapusUpcoming(idx) {
            this.upcoming.splice(idx, 1);
        },
    };
}
