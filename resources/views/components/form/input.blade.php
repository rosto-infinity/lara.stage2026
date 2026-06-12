{{--
    Composant : <x-form.input>
    Classe    : App\View\Components\Form\Input
    Props     : $name        (string)      – attribut name/id du champ (obligatoire)
                $label       (string|null) – libellé affiché au-dessus  [défaut: null]
                $type        (string)      – type HTML de l'input        [défaut: 'text']
                $value       (string)      – valeur initiale             [défaut: '']
                $required    (bool)        – affiche l'astérisque (*)    [défaut: false]
                $placeholder (string)      – texte d'invite              [défaut: '']

    ⚠️  Standard STALL : l'attribut HTML `required` est intentionnellement absent
        de la balise <input>. La validation est gérée exclusivement côté backend.

    Exemple :
        <x-form.input name="email" label="E-mail" type="email" :required="true" />
--}}

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

    {{-- Champ de saisie — bordure rouge en cas d'erreur de validation --}}
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{-- Pas d'attribut `required` HTML (standard STALL sécurité) --}}
        class="block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900
               placeholder-gray-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500
               @error($name) border-red-500 @enderror"
    >

    {{-- Message d'erreur de validation Laravel --}}
    <x-form.error :name="$name" />

</div>
