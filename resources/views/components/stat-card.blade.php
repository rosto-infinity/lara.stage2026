@props(['label', 'value', 'color' => 'gray'])

@php
$colors = [
    'red'   => 'text-red-600',
    'gray'  => 'text-gray-900',
    'green' => 'text-green-700',
    'amber' => 'text-amber-700',
];
$valueColor = $colors[$color] ?? $colors['gray'];
@endphp

<div class="rounded-md border border-gray-200 bg-white px-5 py-4 flex items-center gap-4">
    @isset($icon)
        <div class="w-9 h-9 rounded-md bg-gray-100 flex items-center justify-center shrink-0 text-gray-500">
            {{ $icon }}
        </div>
    @endisset
    <div>
        <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">{{ $label }}</p>
        <p class="text-2xl font-bold {{ $valueColor }} mt-0.5">{{ $value }}</p>
    </div>
</div>
