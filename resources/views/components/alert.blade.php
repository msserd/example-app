@props([
    'type' => 'note', 
    'title' => ''
])

<div {{ $attributes->merge(['class' => "alert-component alert-$type"]) }}>
    @if($title)
        <span class="alert-title">{{ $title }}</span>
    @endif

    <div class="alert-content">
        {{ $slot }}
    </div>
</div>

{{-- Стили будут вынесены в основной css файл, когда он появится --}}
<style>
    .alert-component {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 4px;
    }

    .alert-title {
        font-weight: bold;
        margin-bottom: 4px;
    }

    .alert-success {
        background-color: #f0fdf4;
        border-color: #22c55e;
        color: #166534;
    }

    .alert-warning {
        background-color: #fffbeb;
        border-color: #f59e0b;
        color: #92400e;
    }

    .alert-note {
        background-color: #eff6ff;
        border-color: #3b82f6;
        color: #1e40af;
    }
</style>
