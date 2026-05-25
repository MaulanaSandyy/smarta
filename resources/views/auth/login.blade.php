<x-layouts.guest>
    <div class="text-center mb-6">
        <div class="w-14 h-14 rounded-2xl bg-indigo-600 flex items-center justify-center mx-auto mb-3">
            <span class="text-white font-bold text-xl">S</span>
        </div>
        <h1 class="text-xl font-bold text-text-primary">Masuk ke SMARTA</h1>
        <p class="text-sm text-text-muted mt-1">Sistem RT Digital & Manajemen Masjid</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-text-primary mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="input" placeholder="admin@smarta.test">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-text-primary mb-1">Password</label>
            <input id="password" type="password" name="password" required
                   class="input" placeholder="password">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="rounded border-border text-indigo-600 focus:ring-indigo-500">
                <span class="text-sm text-text-secondary">Ingat saya</span>
            </label>
            <button type="submit" class="btn-primary btn-lg px-8">
                Masuk
            </button>
        </div>
    </form>

    <div class="relative my-6">
        <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-border"></div></div>
        <div class="relative flex justify-center"><span class="px-3 text-xs text-text-muted bg-(--surface)">Atau akses cepat sebagai</span></div>
    </div>

    <div class="space-y-2">
        <button type="button" onclick="loginAs('Ketua RT', 'rt')"
                class="role-btn">
            <div class="role-btn-icon bg-indigo-100 text-indigo-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="role-btn-text">Demo Ketua RT</p>
                <p class="text-xs text-text-muted">Akses penuh fitur Sistem RT</p>
            </div>
            <svg class="w-4 h-4 text-text-muted shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>

        <button type="button" onclick="loginAs('Ketua DKM', 'masjid')"
                class="role-btn">
            <div class="role-btn-icon bg-emerald-100 text-emerald-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="role-btn-text">Demo Ketua DKM</p>
                <p class="text-xs text-text-muted">Akses penuh fitur Sistem Masjid</p>
            </div>
            <svg class="w-4 h-4 text-text-muted shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
    </div>

    <p class="text-xs text-text-muted text-center mt-6">
        Login demo ini hanya simulasi. Data tidak disimpan secara permanen.
    </p>
</x-layouts.guest>

<script>
function loginAs(title, role) {
    const user = { name: title, title: title, email: role === 'rt' ? 'ketua@rt01.test' : 'ketua@masjid.test', initial: title.charAt(0) };
    localStorage.setItem('smarta_user', JSON.stringify(user));
    window.location.href = '/pilih-sistem';
}
</script>
