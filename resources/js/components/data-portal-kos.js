export default function dataPortalKos() {
    return {
        itemsKos: [
            { name: 'Andi Pratama', usia: '22', pekerjaan: 'Mahasiswa', masa: '6 bulan', kontak: '081234567901', darurat: '081234567911' },
            { name: 'Bella Sari', usia: '24', pekerjaan: 'Karyawan Swasta', masa: '1 tahun', kontak: '081234567902', darurat: '081234567912' },
            { name: 'Cahyo Nugroho', usia: '23', pekerjaan: 'Freelancer', masa: '3 bulan', kontak: '081234567903', darurat: '081234567913' },
            { name: 'Diana Putri', usia: '21', pekerjaan: 'Mahasiswa', masa: '8 bulan', kontak: '081234567904', darurat: '081234567914' },
            { name: 'Eko Prasetyo', usia: '25', pekerjaan: 'Karyawan BUMN', masa: '2 tahun', kontak: '081234567905', darurat: '081234567915' },
        ],
        itemsKontrakan: [
            { alamat: 'Jl. Merdeka No. 3', penghuni: 'Rina Wijaya', pemilik: 'H. Ahmad', masa: '1 tahun', status: 'Aktif' },
            { alamat: 'Jl. Merdeka No. 7', penghuni: 'Fajar Hidayat (keluarga)', pemilik: 'Ibu Dewi', masa: '2 tahun', status: 'Aktif' },
            { alamat: 'Jl. Merdeka No. 9', penghuni: 'Gilang Ramadhan', pemilik: 'Pak RT', masa: '6 bulan', status: 'Aktif' },
            { alamat: 'Jl. Merdeka No. 12', penghuni: '-', pemilik: 'Bpk. Suharto', masa: '-', status: 'Kosong' },
            { alamat: 'Jl. Merdeka No. 15', penghuni: 'Hesti Nurani', pemilik: 'Ibu Ani', masa: '1 tahun', status: 'Aktif' },
        ],
        selectedKos: null,
        selectedKontrakan: null,
        formKos: { name: '', usia: '', pekerjaan: '', masa: '', kontak: '', darurat: '' },
        formKontrakan: { alamat: '', penghuni: '', pemilik: '', masa: '', status: 'Aktif' },
        get totalKos() { return this.itemsKos.length; },
        get totalKontrakan() { return this.itemsKontrakan.length; },
        get totalPemilik() {
            var list = [];
            for (var i = 0; i < this.itemsKontrakan.length; i++) {
                var p = this.itemsKontrakan[i].pemilik;
                if (list.indexOf(p) === -1) list.push(p);
            }
            return list.length;
        },
        detailKos: function(item) {
            this.selectedKos = item;
            if (window['modal-detail-kos']) window['modal-detail-kos'].open();
        },
        detailKontrakan: function(item) {
            this.selectedKontrakan = item;
            if (window['modal-detail-kontrakan']) window['modal-detail-kontrakan'].open();
        },
        bukaFormKos: function() {
            this.formKos = { name: '', usia: '', pekerjaan: '', masa: '', kontak: '', darurat: '' };
            if (window['modal-tambah-kos']) window['modal-tambah-kos'].open();
        },
        bukaFormKontrakan: function() {
            this.formKontrakan = { alamat: '', penghuni: '', pemilik: '', masa: '', status: 'Aktif' };
            if (window['modal-tambah-kontrakan']) window['modal-tambah-kontrakan'].open();
        },
        tambahKos: function() {
            if (!this.formKos.name) return;
            this.itemsKos.push({ ...this.formKos });
            this.formKos = { name: '', usia: '', pekerjaan: '', masa: '', kontak: '', darurat: '' };
            if (window['modal-tambah-kos']) window['modal-tambah-kos'].close();
        },
        tambahKontrakan: function() {
            if (!this.formKontrakan.alamat) return;
            this.itemsKontrakan.push({ ...this.formKontrakan });
            this.formKontrakan = { alamat: '', penghuni: '', pemilik: '', masa: '', status: 'Aktif' };
            if (window['modal-tambah-kontrakan']) window['modal-tambah-kontrakan'].close();
        },
        hapusKos: function(id) {
            this.itemsKos.splice(id, 1);
            if (window['modal-detail-kos']) window['modal-detail-kos'].close();
        },
        hapusKontrakan: function(id) {
            this.itemsKontrakan.splice(id, 1);
            if (window['modal-detail-kontrakan']) window['modal-detail-kontrakan'].close();
        },
    };
}
