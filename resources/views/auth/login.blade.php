<x-layouts.guest>
    <div class="w-full max-w-md animate-fade-in">
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl bg-primary-600 flex items-center justify-center text-white font-bold text-2xl mx-auto mb-4 shadow-lg shadow-primary-600/25">
                S
            </div>
            <h1 class="text-2xl font-bold text-text-primary">Selamat Datang di SMARTA</h1>
            <p class="text-text-muted mt-1">Sistem Manajemen RT & Masjid Digital</p>
        </div>

        <div class="card p-6 sm:p-8">
            <form class="space-y-5" onsubmit="event.preventDefault(); loginWithEmail()">
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1.5">Email</label>
                    <input id="login-email" type="email" class="input" placeholder="admin@smarta.test" value="admin@smarta.test">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-primary mb-1.5">Password</label>
                    <input id="login-password" type="password" class="input" placeholder="Masukkan password" value="password">
                </div>
                <button type="submit" class="btn-primary w-full">
                    Masuk
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-border">
                <p class="text-xs text-text-muted text-center mb-3">Pilih role untuk demo:</p>
                <div class="grid grid-cols-2 gap-3">
                    <button onclick="loginAs('Super Admin', 'Super Administrator', 'superadmin@smarta.test', 'S')" class="role-btn">
                        <span class="role-btn-icon bg-primary-100 text-primary-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </span>
                        <span class="role-btn-text">Super Admin</span>
                    </button>
                    <button onclick="loginAs('Admin RT', 'Ketua RT 01', 'ketuart@smarta.test', 'A')" class="role-btn">
                        <span class="role-btn-icon bg-amber-100 text-amber-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </span>
                        <span class="role-btn-text">Ketua RT</span>
                    </button>
                    <button onclick="loginAs('Sekretaris', 'Sekretaris RT 01', 'sekretaris@smarta.test', 'S')" class="role-btn">
                        <span class="role-btn-icon bg-blue-100 text-blue-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </span>
                        <span class="role-btn-text">Sekretaris</span>
                    </button>
                    <button onclick="loginAs('Bendahara', 'Bendahara RT 01', 'bendahara@smarta.test', 'B')" class="role-btn">
                        <span class="role-btn-icon bg-emerald-100 text-emerald-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        </span>
                        <span class="role-btn-text">Bendahara</span>
                    </button>
                </div>
            </div>
        </div>

        <script>
            function loginAs(name, title, email, initial) {
                localStorage.setItem('smarta_user', JSON.stringify({ name, title, email, initial }));
                window.location.href = '{{ route('pilih-sistem') }}';
            }

            function loginWithEmail() {
                const email = document.getElementById('login-email').value;
                const roles = {
                    'superadmin@smarta.test': { name: 'Super Admin', title: 'Super Administrator', initial: 'S' },
                    'ketuart@smarta.test': { name: 'Admin RT', title: 'Ketua RT 01', initial: 'A' },
                    'sekretaris@smarta.test': { name: 'Sekretaris', title: 'Sekretaris RT 01', initial: 'S' },
                    'bendahara@smarta.test': { name: 'Bendahara', title: 'Bendahara RT 01', initial: 'B' },
                };
                const role = roles[email] || { name: 'Admin RT', title: 'Ketua RT 01', initial: 'A' };
                localStorage.setItem('smarta_user', JSON.stringify({ ...role, email }));
                window.location.href = '{{ route('pilih-sistem') }}';
            }

            (function() {
                const params = new URLSearchParams(window.location.search);
                if (params.get('logout')) {
                    localStorage.removeItem('smarta_user');
                }
                const saved = localStorage.getItem('smarta_user');
                if (saved) {
                    const user = JSON.parse(saved);
                    if (user.email) {
                        document.getElementById('login-email').value = user.email;
                    }
                }
            })();
        </script>

        <p class="text-center text-xs text-text-muted mt-6">
            &copy; {{ date('Y') }} SMARTA. All rights reserved.
        </p>
    </div>
</x-layouts.guest>
