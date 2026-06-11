@props(['name', 'label' => null, 'type' => 'text', 'value' => '', 'required' => false, 'placeholder' => ''])

<div class="space-y-1">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required) <span class="text-red-500">*</span> @endif
        </label>
    @endif
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        class="block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900
               placeholder-gray-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500
               @error($name) border-red-500 @enderror"
    >
    <x-form.error :name="$name" />
</div>
