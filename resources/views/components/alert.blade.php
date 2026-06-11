@props(['type' => 'success'])

@php
$styles = [
    'success' => 'bg-white border-l-4 border-green-500 text-green-800',
    'error'   => 'bg-white border-l-4 border-red-500 text-red-800',
    'warning' => 'bg-white border-l-4 border-amber-500 text-amber-800',
    'info'    => 'bg-white border-l-4 border-gray-400 text-gray-700',
];
$cls = $styles[$type] ?? $styles['info'];
@endphp

<div class="mx-6 mt-4 px-4 py-3 rounded-md border {{ $cls }} text-sm flex items-center justify-between gap-4">
    <span>{{ $slot }}</span>
    <button onclick="this.parentElement.remove()" class="text-current opacity-50 hover:opacity-100 shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>
