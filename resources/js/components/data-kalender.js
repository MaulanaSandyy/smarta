export default function dataKalender() {
    var now = new Date();
    var todayStr = now.getFullYear() + '-' + String(now.getMonth() + 1).padStart(2, '0') + '-' + String(now.getDate()).padStart(2, '0');
    return {
        bulan: now.getMonth() + 1,
        tahun: now.getFullYear(),
        today: todayStr,
        events: [
            { id: 1, judul: 'Kerja Bakti', tanggal: todayStr, waktu: '07:00', lokasi: 'Lingkungan RT', kategori: 'Kegiatan' },
            { id: 2, judul: 'Posyandu', tanggal: '2026-05-28', waktu: '08:00', lokasi: 'Posyandu RT', kategori: 'Kesehatan' },
            { id: 3, judul: 'Pengajian Malam Jumat', tanggal: '2026-05-29', waktu: '19:00', lokasi: 'Masjid Al-Barakah', kategori: 'Keagamaan' },
        ],
        form: {
            judul: '',
            tanggal: todayStr,
            waktu: String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0'),
            lokasi: '',
            kategori: 'Kegiatan',
        },
        namaBulan: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        namaHari: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        kategoriList: ['Kegiatan', 'Kesehatan', 'Kebersihan', 'Keamanan', 'Keagamaan'],
        warnaKategori: function(k) {
            var map = { 'Kegiatan': 'bg-blue-500', 'Kesehatan': 'bg-emerald-500', 'Kebersihan': 'bg-amber-500', 'Keamanan': 'bg-rose-500', 'Keagamaan': 'bg-purple-500' };
            return map[k] || 'bg-slate-500';
        },
        warnaKategoriRing: function(k) {
            var map = { 'Kegiatan': 'ring-blue-500', 'Kesehatan': 'ring-emerald-500', 'Kebersihan': 'ring-amber-500', 'Keamanan': 'ring-rose-500', 'Keagamaan': 'ring-purple-500' };
            return map[k] || 'ring-slate-500';
        },
        get firstDayOfMonth() {
            return new Date(this.tahun, this.bulan - 1, 1).getDay();
        },
        get daysInMonth() {
            return new Date(this.tahun, this.bulan, 0).getDate();
        },
        get calendarGrid() {
            var grid = [];
            for (var i = 0; i < this.firstDayOfMonth; i++) {
                grid.push(null);
            }
            for (var d = 1; d <= this.daysInMonth; d++) {
                grid.push(d);
            }
            return grid;
        },
        eventsForDay: function(day) {
            var dateStr = this.tahun + '-' + String(this.bulan).padStart(2, '0') + '-' + String(day).padStart(2, '0');
            return this.events.filter(function(e) { return e.tanggal === dateStr; });
        },
        isToday: function(day) {
            var dateStr = this.tahun + '-' + String(this.bulan).padStart(2, '0') + '-' + String(day).padStart(2, '0');
            return dateStr === this.today;
        },
        get upcomingEvents() {
            var self = this;
            var sorted = self.events.slice().sort(function(a, b) { return a.tanggal.localeCompare(b.tanggal); });
            return sorted.filter(function(e) { return e.tanggal >= self.today; });
        },
        formatTanggal: function(dateStr) {
            if (!dateStr) return '-';
            var parts = dateStr.split('-');
            var d = new Date(parseInt(parts[0]), parseInt(parts[1]) - 1, parseInt(parts[2]));
            return String(parseInt(parts[2])) + ' ' + this.namaBulan[parseInt(parts[1]) - 1] + ' ' + parts[0];
        },
        prevMonth: function() {
            if (this.bulan === 1) { this.bulan = 12; this.tahun--; }
            else { this.bulan--; }
        },
        nextMonth: function() {
            if (this.bulan === 12) { this.bulan = 1; this.tahun++; }
            else { this.bulan++; }
        },
        resetForm: function() {
            var now = new Date();
            var todayStr = now.getFullYear() + '-' + String(now.getMonth() + 1).padStart(2, '0') + '-' + String(now.getDate()).padStart(2, '0');
            this.form = {
                judul: '',
                tanggal: todayStr,
                waktu: String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0'),
                lokasi: '',
                kategori: 'Kegiatan',
            };
        },
        bukaForm: function() {
            this.resetForm();
            if (window['modal-tambah-agenda']) {
                window['modal-tambah-agenda'].open();
            }
        },
        tambahAgenda: function() {
            if (!this.form.judul || !this.form.tanggal) return;
            var newId = Date.now();
            this.events.push({
                id: newId,
                judul: this.form.judul,
                tanggal: this.form.tanggal,
                waktu: this.form.waktu || '-',
                lokasi: this.form.lokasi || '-',
                kategori: this.form.kategori,
            });
            this.resetForm();
            if (window['modal-tambah-agenda']) {
                window['modal-tambah-agenda'].close();
            }
        },
        hapusAgenda: function(id) {
            this.events = this.events.filter(function(e) { return e.id !== id; });
        },
    };
}
