@props(['name', 'label' => null, 'options' => [], 'selected' => null, 'placeholder' => 'Sélectionner…', 'required' => false])

<div class="space-y-1">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required) <span class="text-red-500">*</span> @endif
        </label>
    @endif
    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $required ? 'required' : '' }}
        class="block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900
               focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500
               @error($name) border-red-500 @enderror">
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $val => $label)
            <option value="{{ $val }}" {{ old($name, $selected) == $val ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
    <x-form.error :name="$name" />
</div>
