export default function dataRonda(jadwal, posList) {
    return {
        jadwal: jadwal,
        posList: posList,
        laporan: [],
        editForm: { hari: '', petugas: '', waktu: '', pos: '' },
        editingDay: null,
        laporanForm: { tgl: '', judul: '', deskripsi: '', status: 'Aman', pelapor: '' },
        tambahForm: { nama: '', petugas: '', waktu: '22:00 - 05:00', pos: '' },
        showTambahForm: false,
        get totalInsiden() {
            var count = 0;
            for (var i = 0; i < this.laporan.length; i++) {
                if (this.laporan[i].status === 'Tidak Aman') count++;
            }
            return count;
        },
        get totalLaporan() { return this.laporan.length; },
        bukaAturJadwal: function() {
            this.editingDay = null;
            this.editForm = { hari: '', petugas: '', waktu: '', pos: '' };
            if (window['modal-atur-jadwal']) {
                window['modal-atur-jadwal'].open();
            }
        },
        editDay: function(index) {
            this.editingDay = index;
            var day = this.jadwal[index];
            this.editForm = {
                hari: day.hari,
                petugas: day.petugas,
                waktu: day.waktu,
                pos: day.pos
            };
        },
        batalEdit: function() {
            this.editingDay = null;
            this.editForm = { hari: '', petugas: '', waktu: '', pos: '' };
        },
        simpanEdit: function() {
            if (this.editingDay !== null && this.editForm.petugas) {
                this.jadwal[this.editingDay].petugas = this.editForm.petugas;
                this.jadwal[this.editingDay].waktu = this.editForm.waktu;
                this.jadwal[this.editingDay].pos = this.editForm.pos;
                this.batalEdit();
            }
        },
        bukaBuatLaporan: function() {
            var now = new Date();
            var dd = String(now.getDate()).padStart(2, '0');
            var mm = String(now.getMonth() + 1).padStart(2, '0');
            var yyyy = now.getFullYear();
            this.laporanForm = { tgl: dd + '/' + mm + '/' + yyyy, judul: '', deskripsi: '', status: 'Aman', pelapor: '' };
            if (window['modal-buat-laporan']) {
                window['modal-buat-laporan'].open();
            }
        },
        kirimLaporan: function() {
            if (!this.laporanForm.judul) return;
            this.laporan.unshift({
                tgl: this.laporanForm.tgl,
                judul: this.laporanForm.judul,
                deskripsi: this.laporanForm.deskripsi,
                status: this.laporanForm.status,
                pelapor: this.laporanForm.pelapor || 'Petugas Ronda'
            });
            if (window['modal-buat-laporan']) {
                window['modal-buat-laporan'].close();
            }
        },
        bukaTambahJadwal: function() {
            this.showTambahForm = true;
            this.tambahForm = { nama: '', petugas: '', waktu: '22:00 - 05:00', pos: this.posList[0] || 'Pos 1' };
        },
        batalTambah: function() {
            this.showTambahForm = false;
            this.tambahForm = { nama: '', petugas: '', waktu: '22:00 - 05:00', pos: '' };
        },
        tambahJadwal: function() {
            if (!this.tambahForm.nama || !this.tambahForm.petugas) return;
            this.jadwal.push({
                hari: this.tambahForm.nama,
                petugas: this.tambahForm.petugas,
                waktu: this.tambahForm.waktu,
                pos: this.tambahForm.pos
            });
            this.batalTambah();
        },
        statusClass: function(s) {
            return s === 'Aman' ? 'badge-success' : 'badge-danger';
        },
        statusIcon: function(s) {
            return s === 'Aman' ? 'text-emerald-400' : 'text-rose-400';
        }
    };
}
