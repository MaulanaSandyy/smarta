export default () => ({
    isOpen: false,
    isMobileOpen: false,
    isCollapsed: false,
    activeDropdown: null,
    userName: 'Admin RT',
    userTitle: 'Ketua RT 01',
    userInitial: 'A',

    init() {
        this.isOpen = window.innerWidth >= 1024;
        this.isCollapsed = window.innerWidth < 1280;
        this.loadUser();

        window.addEventListener('resize', () => {
            if (window.innerWidth < 1024) {
                this.isOpen = false;
                this.isMobileOpen = false;
            }
        });
    },

    loadUser() {
        const saved = localStorage.getItem('smarta_user');
        if (saved) {
            try {
                const user = JSON.parse(saved);
                this.userName = user.name || 'Admin RT';
                this.userTitle = user.title || 'Ketua RT 01';
                this.userInitial = user.initial || 'A';
            } catch (e) {}
        }
    },

    toggle() {
        if (window.innerWidth < 1024) {
            this.isMobileOpen = !this.isMobileOpen;
        } else {
            this.isCollapsed = !this.isCollapsed;
        }
    },

    close() {
        this.isMobileOpen = false;
    },

    toggleDropdown(name) {
        this.activeDropdown = this.activeDropdown === name ? null : name;
    },

    isDropdownOpen(name) {
        return this.activeDropdown === name;
    },
});
