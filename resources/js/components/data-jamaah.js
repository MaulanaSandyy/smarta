export default function dataJamaah(items, perPage) {
    return {
        page: 1,
        perPage: perPage,
        search: '',
        roleFilter: '',
        items: items,
        selectedItem: null,
        selectedRole: null,
        form: {
            name: '',
            role: '',
            phone: '',
            alamat: '',
            status: 'Aktif',
        },
        get filteredItems() {
            var self = this;
            return self.items.filter(function(item) {
                var q = self.search.toLowerCase();
                var matchSearch = !self.search ||
                    item.name.toLowerCase().includes(q) ||
                    item.phone.includes(q) ||
                    item.alamat.toLowerCase().includes(q);
                var matchRole = !self.roleFilter || item.role === self.roleFilter;
                return matchSearch && matchRole;
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
        get roleList() {
            var list = [];
            for (var i = 0; i < this.items.length; i++) {
                if (list.indexOf(this.items[i].role) === -1) {
                    list.push(this.items[i].role);
                }
            }
            return list;
        },
        get totalAktif() {
            return this.items.filter(function(i) { return i.status === 'Aktif'; }).length;
        },
        get totalPengurus() {
            return this.items.filter(function(i) { return i.role !== 'Jamaah'; }).length;
        },
        setFilter: function(value) {
            this.roleFilter = value;
            this.page = 1;
        },
        goTo: function(p) {
            if (p >= 1 && p <= this.totalPages) { this.page = p; }
        },
        prev: function() { this.goTo(this.page - 1); },
        next: function() { this.goTo(this.page + 1); },
        resetFilters: function() {
            this.search = '';
            this.roleFilter = '';
            this.page = 1;
        },
        detail: function(item) {
            this.selectedItem = item;
            if (window['modal-detail-jamaah']) {
                window['modal-detail-jamaah'].open();
            }
        },
        bukaForm: function() {
            this.form = { name: '', role: '', phone: '', alamat: '', status: 'Aktif' };
            if (window['modal-tambah-jamaah']) {
                window['modal-tambah-jamaah'].open();
            }
        },
        tambahJamaah: function() {
            if (!this.form.name) return;
            this.items.push({ ...this.form });
            this.form = { name: '', role: '', phone: '', alamat: '', status: 'Aktif' };
            if (window['modal-tambah-jamaah']) {
                window['modal-tambah-jamaah'].close();
            }
        },
        roleBadge: function(r) {
            var map = { 'Ketua DKM': 'badge-primary', 'Imam': 'badge-success', 'Bendahara': 'badge-warning', 'Sekretaris': 'badge-primary', 'Marbot': 'badge-slate', 'Jamaah': 'badge-slate' };
            return map[r] || 'badge-slate';
        },
    };
}
