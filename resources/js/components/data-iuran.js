export default function dataIuran(items, perPage) {
    return {
        page: 1,
        perPage: perPage,
        search: '',
        dayFilter: '',
        statusFilter: '',
        monthFilter: '',
        yearFilter: '',
        items: items,
        selectedItem: null,
        get filteredItems() {
            var self = this;
            return self.items.filter(function(item) {
                var q = self.search.toLowerCase();
                var matchSearch = !self.search || item.keluarga.toLowerCase().includes(q);
                var matchDay = !self.dayFilter || (item.tgl && item.tgl.toLowerCase().includes(self.dayFilter.toLowerCase()));
                var matchStatus = !self.statusFilter || item.status === self.statusFilter;
                var matchMonth = !self.monthFilter || (item.bulan && item.bulan === self.monthFilter);
                var matchYear = !self.yearFilter || (item.tahun && item.tahun === self.yearFilter);
                return matchSearch && matchDay && matchStatus && matchMonth && matchYear;
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
        get totalLunas() {
            return this.items.filter(function(i) { return i.status === 'Lunas'; }).length;
        },
        get totalBelum() {
            return this.items.filter(function(i) { return i.status === 'Belum'; }).length;
        },
        get totalIuranBulanIni() {
            var bulanIni = this.items.length > 0 ? this.items[0].bulan : 'Mei';
            var lunasBulanIni = this.items.filter(function(i) {
                return i.bulan === bulanIni && i.status === 'Lunas';
            });
            var total = 0;
            for (var j = 0; j < lunasBulanIni.length; j++) {
                total += parseJumlah(lunasBulanIni[j].jumlah);
            }
            return total;
        },
        get persentaseLunas() {
            var total = this.totalLunas + this.totalBelum;
            return total > 0 ? Math.round((this.totalLunas / total) * 100) : 0;
        },
        statusClass: function(s) {
            return s === 'Lunas' ? 'badge-success' : 'badge-danger';
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
            this.dayFilter = '';
            this.statusFilter = '';
            this.monthFilter = '';
            this.yearFilter = '';
            this.page = 1;
        },
        formatRupiah: function(num) {
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
        bayar: function(item) {
            this.selectedItem = item;
            if (window['modal-bayar-iuran']) {
                window['modal-bayar-iuran'].open();
            }
        },
        konfirmasiBayar: function() {
            if (this.selectedItem) {
                this.selectedItem.status = 'Lunas';
                var now = new Date();
                var dd = String(now.getDate()).padStart(2, '0');
                var mm = String(now.getMonth() + 1).padStart(2, '0');
                var yyyy = now.getFullYear();
                this.selectedItem.tgl = dd + '/' + mm + '/' + yyyy;
                this.selectedItem.metode = 'Tunai';
                if (window['modal-bayar-iuran']) {
                    window['modal-bayar-iuran'].close();
                }
                this.selectedItem = null;
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
            var h = '<table border=\"1\" cellpadding=\"6\" cellspacing=\"0\" style=\"border-collapse:collapse;width:100%;font-family:Arial,sans-serif;font-size:12px\"><thead><tr style=\"background:#4f46e5;color:white\">' + th('Keluarga') + th('Jumlah') + th('Tanggal') + th('Metode') + th('Status') + '<\/tr><\/thead><tbody>';
            var r = self.filteredItems.map(function(item) { return '<tr>' + td(esc(item.keluarga)) + td(esc(item.jumlah)) + td(esc(item.tgl)) + td(esc(item.metode)) + td(esc(item.status)) + '<\/tr>'; }).join('');
            var f = '<\/tbody><\/table>';
            var t = '<h2 style=\"font-family:Arial,sans-serif;margin-bottom:16px\">Iuran Warga RT 01<\/h2>';
            if (includePrintStyles) {
                return '<div style=\"padding:20px\">' + t + '<p style=\"font-size:12px;color:#666;margin-bottom:12px\">Dicetak: ' + new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) + '<\/p>' + h + r + f + '<\/div>';
            }
            return h + r + f;
        },
        exportExcel: function() {
            var table = this.generateTableHTML();
            var html = '<html><head><meta charset=\"UTF-8\"><title>Iuran Warga RT 01<\/title><\/head><body>' + table + '<\/body><\/html>';
            var blob = new Blob([html], { type: 'application/vnd.ms-excel' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'Iuran_Warga_RT_01_' + new Date().toISOString().slice(0,10) + '.xls';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        },
        printPDF: function() {
            var content = this.generateTableHTML(true);
            var style = '@media print{body{margin:0;padding:0}}';
            var win = window.open('', '_blank');
            var doc = '<!DOCTYPE html><html><head><meta charset=\"UTF-8\"><title>Iuran Warga RT 01<\/title><style>' + style + '<\/style><\/head><body>' + content + '<\/body><\/html>';
            win.document.write(doc);
            win.document.close();
            win.focus();
            setTimeout(function() { win.print(); win.close(); }, 400);
        }
    };
}

function parseJumlah(str) {
    return parseInt(String(str).replace(/[^\d]/g, '')) || 0;
}
