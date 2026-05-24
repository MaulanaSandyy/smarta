<div class="stats-card">
    <div class="flex items-start justify-between mb-4">
        <div class="stats-card-icon {{ $iconClass ?? 'bg-primary-100 text-primary-600' }}">
            {{ $icon ?? '' }}
        </div>
    </div>
    <p class="text-2xl font-bold text-text-primary">{{ $value }}</p>
    <p class="text-sm text-text-muted mt-1">{{ $label }}</p>
    @if(isset($trend))
        <div class="flex items-center gap-1 mt-2 text-xs {{ $trend['positive'] ? 'text-emerald-600' : 'text-rose-600' }}">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $trend['positive'] ? 'M5 10l7-7m0 0l7 7m-7-7v18' : 'M19 14l-7 7m0 0l-7-7m7 7V3' }}"/>
            </svg>
            <span>{{ $trend['value'] }}</span>
            <span class="text-text-muted">dari bulan lalu</span>
        </div>
    @endif
</div>
