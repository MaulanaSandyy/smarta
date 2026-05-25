export default function () {
    return {
        items: [
            { name: 'Sajadah Besar', kategori: 'Perabotan', jumlah: 50, kondisi: 'Baik', lokasi: 'Ruang Utama', nilai: 5000000 },
            { name: 'Mikrofon Wireless', kategori: 'Elektronik', jumlah: 4, kondisi: 'Baik', lokasi: 'Ruang Imam', nilai: 2000000 },
            { name: 'Sound System', kategori: 'Elektronik', jumlah: 2, kondisi: 'Rusak Ringan', lokasi: 'Ruang Utama', nilai: 15000000 },
            { name: 'Lemari Al-Quran', kategori: 'Perabotan', jumlah: 3, kondisi: 'Baik', lokasi: 'Ruang Utama', nilai: 4500000 },
            { name: 'Kipas Angin', kategori: 'Elektronik', jumlah: 8, kondisi: 'Perlu Perbaikan', lokasi: 'Ruang Utama', nilai: 3200000 },
            { name: 'Karpet', kategori: 'Perabotan', jumlah: 20, kondisi: 'Baik', lokasi: 'Ruang Wanita', nilai: 8000000 },
            { name: 'AC', kategori: 'Elektronik', jumlah: 3, kondisi: 'Rusak', lokasi: 'Ruang Utama', nilai: 27000000 },
            { name: 'Rak Buku', kategori: 'Perabotan', jumlah: 5, kondisi: 'Baik', lokasi: 'Perpustakaan', nilai: 3500000 },
            { name: 'Proyektor', kategori: 'Elektronik', jumlah: 1, kondisi: 'Baik', lokasi: 'Ruang Utama', nilai: 4500000 },
            { name: 'Tempat Wudhu', kategori: 'Bangunan', jumlah: 12, kondisi: 'Perlu Perbaikan', lokasi: 'Area Wudhu', nilai: 8000000 },
            { name: 'Al-Quran', kategori: 'Perabotan', jumlah: 30, kondisi: 'Baik', lokasi: 'Ruang Utama', nilai: 3000000 },
            { name: 'Kursi Lipat', kategori: 'Perabotan', jumlah: 40, kondisi: 'Rusak Ringan', lokasi: 'Gudang', nilai: 2000000 },
        ],
        search: '',
        filterKategori: 'Semua',
        perPage: 6,
        page: 1,
        selectedItem: null,
        form: { name: '', kategori: 'Perabotan', jumlah: 1, kondisi: 'Baik', lokasi: '', nilai: 0 },

        get kategoriList() {
            return [...new Set(this.items.map(i => i.kategori))];
        },

        get filtered() {
            let result = this.items;
            if (this.search) {
                const q = this.search.toLowerCase();
                result = result.filter(i => i.name.toLowerCase().includes(q) || i.lokasi.toLowerCase().includes(q));
            }
            if (this.filterKategori !== 'Semua') {
                result = result.filter(i => i.kategori === this.filterKategori);
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

        get totalAset() { return this.items.length; },
        get totalPerluPerbaikan() { return this.items.filter(i => i.kondisi === 'Perlu Perbaikan' || i.kondisi === 'Rusak Ringan' || i.kondisi === 'Rusak').length; },
        get totalKategori() { return this.kategoriList.length; },

        formatNilai(n) {
            if (n >= 1000000000) return 'Rp' + (n / 1000000000).toFixed(1) + 'M';
            if (n >= 1000000) return 'Rp' + (n / 1000000).toFixed(0) + 'jt';
            if (n >= 1000) return 'Rp' + (n / 1000).toFixed(0) + 'rb';
            return 'Rp' + n;
        },

        get totalNilai() {
            return this.items.reduce((sum, i) => sum + i.nilai, 0);
        },

        kondisiClass(kondisi) {
            const map = { 'Baik': 'badge-success', 'Rusak Ringan': 'badge-warning', 'Perlu Perbaikan': 'badge-warning', 'Rusak': 'badge-danger' };
            return map[kondisi] || 'badge-slate';
        },

        detail(item) {
            this.selectedItem = item;
            window['modal-detail-aset'].open();
        },

        bukaTambah() {
            this.form = { name: '', kategori: 'Perabotan', jumlah: 1, kondisi: 'Baik', lokasi: '', nilai: 0 };
            window['modal-tambah-aset'].open();
        },

        simpanAset() {
            if (!this.form.name) return;
            this.items.push({ ...this.form });
            window['modal-tambah-aset'].close();
        },

        formatRupiah(n) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(n);
        },
    };
}
