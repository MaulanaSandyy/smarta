<div x-data="{ open: false }"
     x-init="window['modal-{{ $name }}'] = { open: () => { open = true }, close: () => { open = false } }"
     x-show="open"
     x-cloak
     class="modal-overlay"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-end="opacity-0">
    <div class="modal-content" @click.outside="open = false">
        @if(isset($header))
            <div class="flex items-center justify-between px-6 py-4 border-b border-border">
                <h3 class="text-lg font-semibold text-text-primary">{{ $header }}</h3>
                <button @click="open = false" class="btn-ghost p-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        @endif
        <div class="p-6">
            {{ $slot }}
        </div>
        @if(isset($footer))
            <div class="flex items-center justify-end gap-2 px-6 py-4 border-t border-border">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
