<div class="space-y-1">

    {{-- Label avec astérisque si champ obligatoire --}}
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500" aria-hidden="true">*</span>
            @endif
        </label>
    @endif

    {{-- Liste déroulante — bordure rouge en cas d'erreur --}}
    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{-- Pas d'attribut `required` HTML (standard STALL sécurité) --}}
        class="block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900
               focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500
               @error($name) border-red-500 @enderror">

        {{-- Option vide (placeholder) — value="" déclenche la validation "required" côté backend --}}
        <option value="">{{ $placeholder }}</option>

        {{-- Options dynamiques — old() a la priorité sur $selected --}}
        @foreach($options as $val => $label)
            <option value="{{ $val }}" {{ old($name, $selected) == $val ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach

    </select>

    {{-- Message d'erreur de validation Laravel --}}
    <x-form.error :name="$name" />

</div>
