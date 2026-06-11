@props(['color' => 'gray'])

@php
$colors = [
    'green'  => 'bg-green-50 text-green-700 border border-green-200',
    'gray'   => 'bg-gray-100 text-gray-600',
    'red'    => 'bg-red-50 text-red-700 border border-red-200',
    'amber'  => 'bg-amber-50 text-amber-700 border border-amber-200',
    'purple' => 'bg-purple-50 text-purple-700 border border-purple-200',
    'black'  => 'bg-gray-900 text-white',
];
$cls = $colors[$color] ?? $colors['gray'];
@endphp

<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $cls }}">
    {{ $slot }}
</span>
