<header class="sticky top-0 z-30 header-frost backdrop-blur-xl border-b border-border">
    <div class="flex items-center justify-between h-16 px-4 lg:px-6">
        <div class="flex items-center gap-3 min-w-0 shrink">
            <button @click="toggle()" class="btn-ghost p-2 -ml-2 shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div class="min-w-0">
                <h1 class="text-sm font-semibold text-text-primary truncate max-w-[120px] sm:max-w-none">{{ $title ?? 'Dashboard Masjid' }}</h1>
                <p class="text-xs text-text-muted truncate max-w-[120px] sm:max-w-none">{{ $subtitle ?? '' }}</p>
            </div>
        </div>

        <div class="flex items-center gap-1 sm:gap-2">
            <button x-data="theme()" @click="toggle()" class="btn-ghost p-2 relative shrink-0" title="Toggle theme">
                <svg x-show="!isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
                <svg x-show="isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </button>

            <button class="btn-ghost p-2 relative shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <span class="absolute -top-0.5 -right-0.5 w-4 h-4 bg-emerald-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center">5</span>
            </button>

            <a href="{{ route('pilih-sistem') }}" class="btn-ghost btn-sm hidden sm:flex gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                Ganti Sistem
            </a>

            <div class="relative shrink-0" x-data="userMenu()" @click.outside="open = false">
                <button @click="open = !open" class="flex items-center gap-1 sm:gap-2 pl-1.5 sm:pl-2 pr-1.5 sm:pr-3 py-1.5 rounded-xl hover:bg-surface-secondary transition-colors">
                    <div class="w-7 h-7 rounded-lg bg-emerald-600 flex items-center justify-center text-white text-xs font-semibold shrink-0" x-text="initial">A</div>
                    <svg class="w-4 h-4 text-text-muted hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-end="opacity-0 scale-95"
                     x-cloak
                     class="absolute right-0 mt-2 w-56 origin-top-right">
                    <div class="bg-(--surface) rounded-2xl shadow-lg border border-border p-1.5 animate-scale-in">
                        <div class="px-3 py-2 border-b border-border mb-1">
                            <p class="text-sm font-medium text-text-primary" x-text="name">Admin</p>
                            <p class="text-xs text-text-muted" x-text="email">admin@smarta.test</p>
                        </div>
                        <a href="#" class="flex items-center gap-2 px-3 py-2 text-sm text-text-secondary hover:bg-surface-secondary rounded-xl transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Profil
                        </a>
                        <div class="border-t border-border mt-1 pt-1">
                            <a href="{{ route('login') }}?logout=1" onclick="localStorage.removeItem('smarta_user')" class="flex items-center gap-2 px-3 py-2 text-sm text-rose-600 hover:bg-rose-50 rounded-xl transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Keluar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
