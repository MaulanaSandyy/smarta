export default () => ({
    isDark: false,

    init() {
        const saved = localStorage.getItem('theme');
        if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            this.isDark = true;
            document.documentElement.classList.add('dark');
        }
    },

    toggle() {
        this.isDark = !this.isDark;
        document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
    },
});
