export default function dataSurat(items, perPage) {
    return {
        page: 1,
        perPage: perPage,
        search: '',
        statusFilter: '',
        items: items,
        get filteredItems() {
            var self = this;
            return self.items.filter(function(item) {
                var q = self.search.toLowerCase();
                var matchSearch = !self.search || item.no.toLowerCase().includes(q) || item.pemohon.toLowerCase().includes(q) || item.jenis.toLowerCase().includes(q);
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
        statusClass: function(s) {
            var map = { 'Selesai': 'badge-success', 'Diproses': 'badge-warning', 'Menunggu': 'badge-slate' };
            return map[s] || 'badge-slate';
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
        }
    };
}
