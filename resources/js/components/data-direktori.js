export default function dataDirektori(items, perPage) {
    return {
        page: 1,
        perPage: perPage,
        search: '',
        kategoriFilter: '',
        items: items,
        selectedItem: null,
        get filteredItems() {
            var self = this;
            return self.items.filter(function(item) {
                var q = self.search.toLowerCase();
                var matchSearch = !self.search ||
                    item.name.toLowerCase().includes(q) ||
                    item.desc.toLowerCase().includes(q);
                var matchKat = !self.kategoriFilter || item.type === self.kategoriFilter;
                return matchSearch && matchKat;
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
        badgeClass: function(t) {
            var map = { 'UMKM': 'badge-success', 'Keahlian': 'badge-warning', 'Profesi': 'badge-primary' };
            return map[t] || 'badge-slate';
        },
        setFilter: function(kat) {
            this.kategoriFilter = kat;
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
            this.page = 1;
        },
        detail: function(item) {
            this.selectedItem = item;
            if (window['modal-detail-direktori']) {
                window['modal-detail-direktori'].open();
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
            var h = '<table border=\"1\" cellpadding=\"6\" cellspacing=\"0\" style=\"border-collapse:collapse;width:100%;font-family:Arial,sans-serif;font-size:12px\"><thead><tr style=\"background:#4f46e5;color:white\">' + th('Nama') + th('Kategori') + th('Deskripsi') + th('Kontak') + '<\/tr><\/thead><tbody>';
            var r = self.filteredItems.map(function(item) {
                return '<tr>' + td(esc(item.name)) + td(esc(item.type)) + td(esc(item.desc)) + td(esc(item.kontak)) + '<\/tr>';
            }).join('');
            var f = '<\/tbody><\/table>';
            var t = '<h2 style=\"font-family:Arial,sans-serif;margin-bottom:16px\">Direktori Warga RT 01<\/h2>';
            if (includePrintStyles) {
                return '<div style=\"padding:20px\">' + t + '<p style=\"font-size:12px;color:#666;margin-bottom:12px\">Dicetak: ' + new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) + '<\/p>' + h + r + f + '<\/div>';
            }
            return h + r + f;
        },
        exportExcel: function() {
            var table = this.generateTableHTML();
            var html = '<html><head><meta charset=\"UTF-8\"><title>Direktori Warga RT 01<\/title><\/head><body>' + table + '<\/body><\/html>';
            var blob = new Blob([html], { type: 'application/vnd.ms-excel' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'Direktori_Warga_RT_01_' + new Date().toISOString().slice(0,10) + '.xls';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        },
        printPDF: function() {
            var content = this.generateTableHTML(true);
            var style = '@media print{body{margin:0;padding:0}}';
            var win = window.open('', '_blank');
            var doc = '<!DOCTYPE html><html><head><meta charset=\"UTF-8\"><title>Direktori Warga RT 01<\/title><style>' + style + '<\/style><\/head><body>' + content + '<\/body><\/html>';
            win.document.write(doc);
            win.document.close();
            win.focus();
            setTimeout(function() { win.print(); win.close(); }, 400);
        }
    };
}
