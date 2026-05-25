<x-layouts.app>
    <div class="min-h-screen relative overflow-hidden bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900 flex items-center justify-center p-3 sm:p-6">
        <!-- Animated Background Shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s"></div>
            <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-violet-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 4s"></div>
            <div class="absolute top-1/4 right-1/3 w-48 h-48 bg-sky-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s"></div>

            <!-- Grid pattern overlay -->
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 60px 60px;"></div>

            <!-- Floating orbs -->
            <div class="hidden lg:block absolute top-1/4 left-[15%] w-2 h-2 bg-indigo-400/40 rounded-full animate-ping"></div>
            <div class="hidden lg:block absolute top-3/4 right-[20%] w-3 h-3 bg-emerald-400/40 rounded-full animate-ping" style="animation-delay: 3s"></div>
            <div class="hidden lg:block absolute bottom-1/3 left-1/2 w-1.5 h-1.5 bg-violet-400/40 rounded-full animate-ping" style="animation-delay: 5s"></div>
        </div>

        <div class="relative w-full max-w-6xl grid lg:grid-cols-2 gap-6 lg:gap-10 items-center">
            <!-- Branding Section -->
            <div class="text-center lg:text-left space-y-6 animate-fade-in">
                <div class="flex items-center gap-3 justify-center lg:justify-start">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-700 shadow-lg shadow-indigo-500/30 flex items-center justify-center">
                        <span class="text-white font-bold text-2xl">S</span>
                    </div>
                    <div>
                        <h1 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">SMARTA</h1>
                        <p class="text-indigo-300/80 text-sm font-medium">Sistem RT Digital &amp; Manajemen Masjid</p>
                    </div>
                </div>

                <div class="hidden lg:block space-y-3">
                    <p class="text-white/90 text-lg leading-relaxed max-w-md">
                        Solusi digital terpadu untuk <span class="text-indigo-400 font-semibold">RT</span> dan <span class="text-emerald-400 font-semibold">Masjid</span> Anda.
                    </p>
                    <div class="flex flex-wrap gap-3 pt-2">
                        <div class="flex items-center gap-2 text-sm text-white/60">
                            <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Manajemen Warga
                        </div>
                        <div class="flex items-center gap-2 text-sm text-white/60">
                            <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Iuran &amp; Kas Digital
                        </div>
                        <div class="flex items-center gap-2 text-sm text-white/60">
                            <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Donasi &amp; Zakat
                        </div>
                    </div>
                </div>
            </div>

            <!-- Login Card -->
            <div class="w-full max-w-md mx-auto lg:mx-0 lg:ml-auto animate-slide-up">
                <div class="backdrop-blur-xl bg-white/5 rounded-3xl p-6 sm:p-8 border border-white/10 shadow-2xl shadow-black/20">
                    <div class="text-center mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-indigo-600 shadow-lg flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        </div>
                        <h2 class="text-xl font-bold text-white">Selamat Datang</h2>
                        <p class="text-sm text-white/50 mt-1">Masuk untuk melanjutkan</p>
                    </div>

                    <!-- Real Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-3.5" x-data="{ showPass: false }">
                        @csrf

                        <div>
                            <label for="email" class="block text-xs font-medium text-white/60 mb-1.5">Email</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-white/30 group-focus-within:text-indigo-400 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                    class="w-full pl-10 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500/50 transition-all text-sm"
                                    placeholder="admin@smarta.test">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-rose-400" />
                        </div>

                        <div>
                            <label for="password" class="block text-xs font-medium text-white/60 mb-1.5">Password</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-white/30 group-focus-within:text-indigo-400 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                </div>
                                <input :type="showPass ? 'text' : 'password'" id="password" name="password" required
                                    class="w-full pl-10 pr-10 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500/50 transition-all text-sm"
                                    placeholder="password">
                                <button type="button" @click="showPass = !showPass" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-white/30 hover:text-white/60 transition-colors">
                                    <svg x-show="!showPass" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <svg x-show="showPass" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-rose-400" />
                        </div>

                        <div class="flex items-center justify-between pt-1">
                            <label class="flex items-center gap-2 cursor-pointer group">
                                <input type="checkbox" name="remember"
                                    class="w-4 h-4 rounded border-white/20 bg-white/5 text-indigo-600 focus:ring-indigo-500/50 focus:ring-offset-0 cursor-pointer">
                                <span class="text-xs text-white/50 group-hover:text-white/70 transition-colors">Ingat saya</span>
                            </label>
                            <button type="submit"
                                class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-500 hover:to-indigo-600 text-white text-sm font-medium rounded-xl shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 transition-all duration-200 active:scale-95">
                                Masuk
                            </button>
                        </div>
                    </form>

                    <!-- Divider -->
                    <div class="relative my-5">
                        <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-white/10"></div></div>
                        <div class="relative flex justify-center">
                            <span class="px-3 text-[11px] text-white/30 bg-transparent">atau akses cepat</span>
                        </div>
                    </div>

                    <!-- Demo Buttons -->
                    <div class="space-y-2.5">
                        <button type="button" onclick="loginAs('Ketua RT', 'rt')"
                            class="w-full flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 hover:border-indigo-500/50 transition-all duration-200 group active:scale-[0.98]">
                            <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center shrink-0 group-hover:bg-indigo-500/30 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <div class="flex-1 min-w-0 text-left">
                                <p class="text-sm font-medium text-white/90">Demo Ketua RT</p>
                                <p class="text-xs text-white/40">Akses penuh fitur RT</p>
                            </div>
                            <svg class="w-4 h-4 text-white/20 group-hover:text-white/50 transition-colors shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>

                        <button type="button" onclick="loginAs('Ketua DKM', 'masjid')"
                            class="w-full flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 hover:border-emerald-500/50 transition-all duration-200 group active:scale-[0.98]">
                            <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 group-hover:bg-emerald-500/30 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                            </div>
                            <div class="flex-1 min-w-0 text-left">
                                <p class="text-sm font-medium text-white/90">Demo Ketua DKM</p>
                                <p class="text-xs text-white/40">Akses penuh fitur Masjid</p>
                            </div>
                            <svg class="w-4 h-4 text-white/20 group-hover:text-white/50 transition-colors shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>

                    <p class="text-[11px] text-white/20 text-center mt-4">
                        Login demo — data tidak disimpan secara permanen
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

<script>
function loginAs(title, role) {
    const email = role === 'rt' ? 'ketua@rt01.test' : 'ketua@masjid.test';
    const user = { name: title, title: title, email: email, initial: title.charAt(0) };
    localStorage.setItem('smarta_user', JSON.stringify(user));
    const f = document.createElement('form');
    f.method = 'POST';
    f.action = '{{ route("demo-login") }}';
    f.innerHTML = '<input name="_token" value="{{ csrf_token() }}">' +
        '<input name="role" value="' + role + '">';
    document.body.appendChild(f);
    f.submit();
}
</script>
