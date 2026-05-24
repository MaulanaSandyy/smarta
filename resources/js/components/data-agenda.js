export default function dataAgenda(items, bulan, tahun) {
    return {
        items: items,
        bulan: bulan,
        tahun: tahun,
        form: {
            judul: '',
            tgl: '',
            waktu: '',
            tempat: '',
            desc: '',
            kategori: 'Kegiatan',
        },
        namaBulan: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        namaHari: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        kategoriList: ['Kesehatan', 'Rapat', 'Kegiatan', 'Keagamaan', 'Olahraga', 'Lainnya'],
        badgeClass: function(kat) {
            var map = { 'Kesehatan': 'badge-success', 'Rapat': 'badge-primary', 'Kegiatan': 'badge-warning', 'Keagamaan': 'badge-primary', 'Olahraga': 'badge-success', 'Lainnya': 'badge-slate' };
            return map[kat] || 'badge-primary';
        },
        resetForm: function() {
            this.form = { judul: '', tgl: '', waktu: '', tempat: '', desc: '', kategori: 'Kegiatan' };
        },
        bukaForm: function() {
            this.resetForm();
            if (window['modal-tambah-agenda']) {
                window['modal-tambah-agenda'].open();
            }
        },
        tambahKegiatan: function() {
            if (!this.form.judul || !this.form.tgl) return;
            var dayName = '-';
            var dayNum = parseInt(this.form.tgl);
            if (!isNaN(dayNum)) {
                var d = new Date(this.tahun, this.bulan - 1, dayNum);
                if (!isNaN(d.getTime())) dayName = this.namaHari[d.getDay()];
            }
            var item = {
                tgl: this.form.tgl,
                hari: dayName,
                bulan: this.namaBulan[this.bulan - 1],
                judul: this.form.judul,
                waktu: this.form.waktu || '-',
                tempat: this.form.tempat || '-',
                desc: this.form.desc || '-',
                badge: this.form.kategori,
                badgeClass: this.badgeClass(this.form.kategori),
            };
            this.items.unshift(item);
            this.resetForm();
            if (window['modal-tambah-agenda']) {
                window['modal-tambah-agenda'].close();
            }
        }
    };
}
