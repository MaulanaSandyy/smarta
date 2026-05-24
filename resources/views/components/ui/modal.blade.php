<div x-data="{ open: false }"
     x-init="window['modal-{{ $name }}'] = { open: () => { open = true }, close: () => { open = false } }"
     x-show="open"
     x-cloak
     class="fixed inset-0 z-50 flex items-start sm:items-center justify-center p-0 sm:p-4"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">
    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm"
         @click="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
    </div>
    <div class="relative bg-(--surface) w-full sm:rounded-2xl shadow-2xl sm:max-w-2xl max-h-screen sm:max-h-[85vh] overflow-y-auto z-10 mt-14 sm:mt-0"
         @click.outside="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4 sm:translate-y-0"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-4 sm:translate-y-0">
        @if(isset($header) || isset($close))
            <div class="flex items-center justify-between px-4 sm:px-6 py-4 border-b border-border sticky top-0 bg-(--surface) z-10">
                <h3 class="text-base sm:text-lg font-semibold text-text-primary">{{ $header ?? '' }}</h3>
                <button @click="open = false" class="btn-ghost p-1.5 rounded-xl hover:bg-surface-secondary transition-colors flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        @endif
        <div class="p-4 sm:p-6">
            {{ $slot }}
        </div>
        @if(isset($footer))
            <div class="flex items-center justify-end gap-2 px-4 sm:px-6 py-4 border-t border-border">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
