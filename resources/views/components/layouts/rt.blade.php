<x-layouts.app>
    <div class="min-h-screen flex" x-data="sidebar()">
        {{-- Mobile Overlay --}}
        <div x-show="isMobileOpen"
             x-transition:enter="transition-opacity duration-300"
             x-transition:leave="transition-opacity duration-300"
             x-cloak
             class="fixed inset-0 bg-black/50 z-40 lg:hidden"
             @click="close()">
        </div>

        {{-- Sidebar --}}
        <aside x-show="isMobileOpen || (isOpen && window.innerWidth >= 1024)"
               x-transition:enter="transition-transform duration-300"
               x-transition:enter-start="-translate-x-full"
               x-transition:leave="transition-transform duration-300"
               x-transition:leave-end="-translate-x-full"
               x-cloak
               :class="isCollapsed && window.innerWidth >= 1024 ? 'w-[72px]' : 'w-64'"
               class="fixed lg:sticky top-0 left-0 z-50 h-screen bg-sidebar flex flex-col transition-all duration-300">

            {{-- Logo --}}
            <div class="flex items-center h-16 px-4 border-b border-white/5">
                <div :class="isCollapsed && window.innerWidth >= 1024 ? 'justify-center' : 'justify-between'" class="flex items-center w-full">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-xl bg-primary-600 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                            S
                        </div>
                        <span x-show="!isCollapsed || window.innerWidth < 1024" x-cloak class="text-white font-semibold text-lg">
                            SMARTA
                        </span>
                    </div>
                    <button @click="toggle()" class="text-slate-400 hover:text-white transition-colors lg:flex hidden">
                        <svg class="w-5 h-5 transition-transform duration-300" :style="isCollapsed ? 'transform: rotate(180deg)' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
                <x-layouts.sidebar-menu />
            </nav>

            {{-- User Info --}}
            <div class="p-3 border-t border-white/5">
                <div class="flex items-center gap-3 px-3 py-2">
                    <div class="w-8 h-8 rounded-lg bg-primary-600/20 flex items-center justify-center text-primary-400 text-sm font-medium flex-shrink-0" x-text="userInitial">
                        A
                    </div>
                    <div x-show="!isCollapsed || window.innerWidth < 1024" x-cloak class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate" x-text="userName">Admin RT</p>
                        <p class="text-xs text-slate-400 truncate" x-text="userTitle">Ketua RT 01</p>
                    </div>
                </div>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col min-w-0">
            {{-- Header --}}
            <x-layouts.header />

            {{-- Page Content --}}
            <main class="flex-1 p-4 lg:p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</x-layouts.app>
