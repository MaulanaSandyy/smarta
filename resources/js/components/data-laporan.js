export default function dataLaporan(items, perPage) {
    return {
        page: 1,
        perPage: perPage,
        search: '',
        statusFilter: '',
        items: items,
        selectedItem: null,
        tanggapanText: '',
        tanggapanStatus: '',
        statuses: ['Menunggu', 'Diproses', 'Selesai', 'Dibatalkan'],
        get filteredItems() {
            var self = this;
            return self.items.filter(function(item) {
                var q = self.search.toLowerCase();
                var matchSearch = !self.search ||
                    item.judul.toLowerCase().includes(q) ||
                    item.warga.toLowerCase().includes(q);
                var matchStatus = !self.statusFilter || item.status === self.statusFilter;
                return matchSearch && matchStatus;
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
        get totalSelesai() { return this.items.filter(function(i) { return i.status === 'Selesai'; }).length; },
        get totalDiproses() { return this.items.filter(function(i) { return i.status === 'Diproses'; }).length; },
        get totalMenunggu() { return this.items.filter(function(i) { return i.status === 'Menunggu'; }).length; },
        get totalDibatalkan() { return this.items.filter(function(i) { return i.status === 'Dibatalkan'; }).length; },
        statusClass: function(s) {
            var map = { 'Selesai': 'badge-success', 'Diproses': 'badge-warning', 'Menunggu': 'badge-slate', 'Dibatalkan': 'badge-danger' };
            return map[s] || 'badge-slate';
        },
        statusColor: function(s) {
            var map = { 'Selesai': 'text-emerald-600', 'Diproses': 'text-amber-600', 'Menunggu': 'text-text-muted', 'Dibatalkan': 'text-rose-600' };
            return map[s] || 'text-text-muted';
        },
        setFilter: function(status) {
            this.statusFilter = status;
            this.page = 1;
        },
        goTo: function(p) {
            if (p >= 1 && p <= this.totalPages) { this.page = p; }
        },
        prev: function() { this.goTo(this.page - 1); },
        next: function() { this.goTo(this.page + 1); },
        resetFilters: function() {
            this.search = '';
            this.statusFilter = '';
            this.page = 1;
        },
        tanggapi: function(item) {
            this.selectedItem = item;
            this.tanggapanText = item.tanggapan || '';
            this.tanggapanStatus = item.status;
            if (window['modal-tanggapi-laporan']) {
                window['modal-tanggapi-laporan'].open();
            }
        },
        kirimTanggapan: function() {
            if (this.selectedItem) {
                this.selectedItem.tanggapan = this.tanggapanText;
                this.selectedItem.status = this.tanggapanStatus;
                if (window['modal-tanggapi-laporan']) {
                    window['modal-tanggapi-laporan'].close();
                }
                this.selectedItem = null;
            }
        }
    };
}
