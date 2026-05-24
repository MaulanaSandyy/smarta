export default function dataKas(items, perPage) {
    return {
        page: 1,
        perPage: perPage,
        search: '',
        kategoriFilter: '',
        typeFilter: '',
        items: items,
        selectedItem: null,
        get filteredItems() {
            var self = this;
            return self.items.filter(function(item) {
                var q = self.search.toLowerCase();
                var matchSearch = !self.search || item.ket.toLowerCase().includes(q);
                var matchKat = !self.kategoriFilter || item.kategori === self.kategoriFilter;
                var matchType = !self.typeFilter ||
                    (self.typeFilter === 'masuk' && item.masuk > 0) ||
                    (self.typeFilter === 'keluar' && item.keluar > 0);
                return matchSearch && matchKat && matchType;
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
        get kategoriList() {
            var list = [];
            for (var i = 0; i < this.items.length; i++) {
                if (list.indexOf(this.items[i].kategori) === -1) {
                    list.push(this.items[i].kategori);
                }
            }
            return list;
        },
        get totalMasuk() {
            var sum = 0;
            for (var i = 0; i < this.items.length; i++) {
                sum += this.items[i].masuk;
            }
            return sum;
        },
        get totalKeluar() {
            var sum = 0;
            for (var i = 0; i < this.items.length; i++) {
                sum += this.items[i].keluar;
            }
            return sum;
        },
        get saldo() {
            return this.totalMasuk - this.totalKeluar;
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
        setFilter: function(field, value) {
            this[field] = value;
            this.page = 1;
        },
        goTo: function(p) {
            if (p >= 1 && p <= this.totalPages) { this.page = p; }
        },
        prev: function() { this.goTo(this.page - 1); },
        next: function() { this.goTo(this.page + 1); },
        resetFilters: function() {
            this.search = '';
            this.kategoriFilter = '';
            this.typeFilter = '';
            this.page = 1;
        },
        detail: function(item) {
            this.selectedItem = item;
            if (window['modal-detail-kas']) {
                window['modal-detail-kas'].open();
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
            var h = '<table border=\"1\" cellpadding=\"6\" cellspacing=\"0\" style=\"border-collapse:collapse;width:100%;font-family:Arial,sans-serif;font-size:12px\"><thead><tr style=\"background:#4f46e5;color:white\">' + th('Tanggal') + th('Keterangan') + th('Kategori') + th('Pemasukan') + th('Pengeluaran') + '<\/tr><\/thead><tbody>';
            var r = self.filteredItems.map(function(item) {
                return '<tr>' +
                    td(esc(item.tgl)) +
                    td(esc(item.ket)) +
                    td(esc(item.kategori)) +
                    td(item.masuk > 0 ? self.formatRupiah(item.masuk) : '-') +
                    td(item.keluar > 0 ? self.formatRupiah(item.keluar) : '-') +
                    '<\/tr>';
            }).join('');
            var f = '<\/tbody><\/table>';
            var t = '<h2 style=\"font-family:Arial,sans-serif;margin-bottom:16px\">Riwayat Kas RT 01<\/h2>';
            if (includePrintStyles) {
                return '<div style=\"padding:20px\">' + t + '<p style=\"font-size:12px;color:#666;margin-bottom:12px\">Dicetak: ' + new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) + '<\/p>' + h + r + f + '<\/div>';
            }
            return h + r + f;
        },
        exportExcel: function() {
            var table = this.generateTableHTML();
            var html = '<html><head><meta charset=\"UTF-8\"><title>Riwayat Kas RT 01<\/title><\/head><body>' + table + '<\/body><\/html>';
            var blob = new Blob([html], { type: 'application/vnd.ms-excel' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'Riwayat_Kas_RT_01_' + new Date().toISOString().slice(0,10) + '.xls';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        },
        printPDF: function() {
            var content = this.generateTableHTML(true);
            var style = '@media print{body{margin:0;padding:0}}';
            var win = window.open('', '_blank');
            var doc = '<!DOCTYPE html><html><head><meta charset=\"UTF-8\"><title>Riwayat Kas RT 01<\/title><style>' + style + '<\/style><\/head><body>' + content + '<\/body><\/html>';
            win.document.write(doc);
            win.document.close();
            win.focus();
            setTimeout(function() { win.print(); win.close(); }, 400);
        }
    };
}
