export default function dataDonasi(items, perPage) {
    return {
        page: 1,
        perPage: perPage,
        search: '',
        jenisFilter: '',
        items: items,
        selectedItem: null,
        form: {
            tgl: '',
            donatur: '',
            jenis: 'Infaq',
            jumlah: '',
            status: 'Menunggu',
        },
        get filteredItems() {
            var self = this;
            return self.items.filter(function(item) {
                var q = self.search.toLowerCase();
                var matchSearch = !self.search ||
                    item.donatur.toLowerCase().includes(q) ||
                    item.jenis.toLowerCase().includes(q);
                var matchJenis = !self.jenisFilter || item.jenis === self.jenisFilter;
                return matchSearch && matchJenis;
            });
        },
        get totalPages() { return Math.ceil(this.filteredItems.length / this.perPage) || 1; },
        get pagedItems() { return this.filteredItems.slice((this.page - 1) * this.perPage, this.page * this.perPage); },
        get start() { return this.filteredItems.length ? (this.page - 1) * this.perPage + 1 : 0; },
        get end() { return Math.min(this.page * this.perPage, this.filteredItems.length); },
        get pages() {
            var p = [];
            for (var i = 1; i <= this.totalPages; i++) p.push(i);
            return p;
        },
        get jenisList() {
            var list = [];
            for (var i = 0; i < this.items.length; i++) {
                if (list.indexOf(this.items[i].jenis) === -1) {
                    list.push(this.items[i].jenis);
                }
            }
            return list;
        },
        get totalDonasi() {
            var sum = 0;
            for (var i = 0; i < this.items.length; i++) {
                sum += this.items[i].jumlah;
            }
            return sum;
        },
        get totalZakat() {
            var sum = 0;
            for (var i = 0; i < this.items.length; i++) {
                if (this.items[i].jenis.toLowerCase().indexOf('zakat') !== -1) {
                    sum += this.items[i].jumlah;
                }
            }
            return sum;
        },
        get donaturAktif() {
            var list = [];
            for (var i = 0; i < this.items.length; i++) {
                var d = this.items[i].donatur;
                if (d !== 'Anonim' && list.indexOf(d) === -1) {
                    list.push(d);
                }
            }
            return list.length;
        },
        formatRupiah: function(num) {
            if (num == null || isNaN(num)) return '-';
            var s = String(num);
            var r = '';
            var count = 0;
            for (var i = s.length - 1; i >= 0; i--) {
                count++;
                r = s[i] + r;
                if (count % 3 === 0 && i !== 0) r = '.' + r;
            }
            return 'Rp ' + r;
        },
        statusClass: function(s) {
            return s === 'Terkonfirmasi' ? 'badge-success' : 'badge-warning';
        },
        setFilter: function(value) {
            this.jenisFilter = value;
            this.page = 1;
        },
        goTo: function(p) {
            if (p >= 1 && p <= this.totalPages) { this.page = p; }
        },
        prev: function() { this.goTo(this.page - 1); },
        next: function() { this.goTo(this.page + 1); },
        resetFilters: function() {
            this.search = '';
            this.jenisFilter = '';
            this.page = 1;
        },
        detail: function(item) {
            this.selectedItem = item;
            if (window['modal-detail-donasi']) {
                window['modal-detail-donasi'].open();
            }
        },
        bukaForm: function() {
            var now = new Date();
            var today = String(now.getDate()).padStart(2, '0') + '/' + String(now.getMonth() + 1).padStart(2, '0') + '/' + now.getFullYear();
            this.form = { tgl: today, donatur: '', jenis: 'Infaq', jumlah: '', status: 'Menunggu' };
            if (window['modal-tambah-donasi']) {
                window['modal-tambah-donasi'].open();
            }
        },
        catatDonasi: function() {
            if (!this.form.donatur || !this.form.jumlah) return;
            this.items.push({
                tgl: this.form.tgl,
                donatur: this.form.donatur,
                jenis: this.form.jenis,
                jumlah: parseInt(this.form.jumlah) || 0,
                status: this.form.status,
            });
            this.form = { tgl: '', donatur: '', jenis: 'Infaq', jumlah: '', status: 'Menunggu' };
            if (window['modal-tambah-donasi']) {
                window['modal-tambah-donasi'].close();
            }
        },
        generateTableHTML: function(includePrintStyles) {
            var self = this;
            var th = function(s) { return '<th style=\"text-align:left;padding:8px\">' + s + '<\/th>'; };
            var td = function(s) { return '<td style=\"padding:6px;border:1px solid #ddd\">' + s + '<\/td>'; };
            var esc = function(str) {
                if (str == null) return '';
                var d = document.createElement('div');
                d.textContent = String(str);
                return d.innerHTML;
            };
            var h = '<table border=\"1\" cellpadding=\"6\" cellspacing=\"0\" style=\"border-collapse:collapse;width:100%;font-family:Arial,sans-serif;font-size:12px\"><thead><tr style=\"background:#059669;color:white\">' + th('Tanggal') + th('Donatur') + th('Jenis') + th('Jumlah') + th('Status') + '<\/tr><\/thead><tbody>';
            var r = self.filteredItems.map(function(item) {
                return '<tr>' +
                    td(esc(item.tgl)) +
                    td(esc(item.donatur)) +
                    td(esc(item.jenis)) +
                    td(self.formatRupiah(item.jumlah)) +
                    td(esc(item.status)) +
                    '<\/tr>';
            }).join('');
            var f = '<\/tbody><\/table>';
            var t = '<h2 style=\"font-family:Arial,sans-serif;margin-bottom:16px\">Donasi & Zakat Masjid Al-Barakah<\/h2>';
            if (includePrintStyles) {
                return '<div style=\"padding:20px\">' + t + '<p style=\"font-size:12px;color:#666;margin-bottom:12px\">Dicetak: ' + new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) + '<\/p>' + h + r + f + '<\/div>';
            }
            return h + r + f;
        },
        printPDF: function() {
            var content = this.generateTableHTML(true);
            var style = '@media print{body{margin:0;padding:0}}';
            var win = window.open('', '_blank');
            var doc = '<!DOCTYPE html><html><head><meta charset=\"UTF-8\"><title>Donasi & Zakat<\/title><style>' + style + '<\/style><\/head><body>' + content + '<\/body><\/html>';
            win.document.write(doc);
            win.document.close();
            win.focus();
            setTimeout(function() { win.print(); win.close(); }, 400);
        },
    };
}
