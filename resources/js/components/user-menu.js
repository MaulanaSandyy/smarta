export default function userMenu() {
    return {
        open: false,
        name: 'Admin RT',
        title: 'Ketua RT 01',
        email: 'admin@smarta.test',
        initial: 'A',
        init() {
            const saved = localStorage.getItem('smarta_user');
            if (saved) {
                try {
                    const user = JSON.parse(saved);
                    this.name = user.name || 'Admin RT';
                    this.title = user.title || 'Ketua RT 01';
                    this.email = user.email || 'admin@smarta.test';
                    this.initial = user.initial || 'A';
                } catch (e) {}
            }
        }
    }
}
