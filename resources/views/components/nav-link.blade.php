<a href="{{ $href }}"
   class="flex items-center gap-2.5 px-3 py-2 rounded-md text-sm transition-colors duration-100
          {{ $active
              ? 'bg-red-50 text-red-700 font-medium'      {{-- état actif : rouge pâle --}}
              : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">  {{-- état normal --}}

    {{-- Icône optionnelle (slot nommé $icon) --}}
    @isset($icon)
        <span class="shrink-0 {{ $active ? 'text-red-600' : 'text-gray-400' }}">{{ $icon }}</span>
    @endisset

    {{-- Libellé du lien --}}
    <span>{{ $slot }}</span>
</a>
