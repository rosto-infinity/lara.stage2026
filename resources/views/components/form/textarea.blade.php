{{--
    Composant : <x-form.textarea>
    Classe    : App\View\Components\Form\Textarea
    Props     : $name        (string)      – attribut name/id du champ (obligatoire)
                $label       (string|null) – libellé affiché au-dessus  [défaut: null]
                $value       (string)      – contenu initial             [défaut: '']
                $rows        (int)         – nombre de lignes visibles   [défaut: 4]
                $required    (bool)        – affiche l'astérisque (*)    [défaut: false]
                $placeholder (string)      – texte d'invite              [défaut: '']

    ⚠️  Standard STALL : l'attribut HTML `required` est intentionnellement absent.

    Exemple :
        <x-form.textarea
            name="description"
            label="Description"
            :value="$program->description"
            :rows="6"
        />
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

    {{-- Zone de texte — resize-none = hauteur fixe contrôlée par $rows --}}
    {{-- old() a la priorité sur $value après un échec de validation --}}
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{-- Pas d'attribut `required` HTML (standard STALL sécurité) --}}
        class="block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900
               placeholder-gray-400 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 resize-none
               @error($name) border-red-500 @enderror">{{ old($name, $value) }}</textarea>
    {{-- ↑ Pas d'espace entre </textarea> et le contenu pour éviter un caractère blanc --}}

    {{-- Message d'erreur de validation Laravel --}}
    <x-form.error :name="$name" />

</div>
