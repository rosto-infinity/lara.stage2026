
@error($name)
    {{-- Message d'erreur de validation — affiché uniquement si @error trouve une erreur --}}
    <p class="text-xs text-red-600 mt-1" role="alert">{{ $message }}</p>
@enderror
