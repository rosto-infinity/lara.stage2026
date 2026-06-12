{{--
    Composant : <x-form.error>
    Classe    : App\View\Components\Form\Error
    Props     : $name (string) – nom du champ à vérifier dans le MessageBag Laravel

    Rendu     : Affiche le premier message d'erreur de validation associé au champ $name.
                Ne rend RIEN si aucune erreur n'existe pour ce champ.

    Utilisé automatiquement par : x-form.input, x-form.select, x-form.textarea
    Peut aussi être utilisé manuellement pour des cas spécifiques.

    Exemple (usage interne) : <x-form.error :name="$name" />
    Exemple (usage manuel)  : <x-form.error name="photo" />
--}}

@error($name)
    {{-- Message d'erreur de validation — affiché uniquement si @error trouve une erreur --}}
    <p class="text-xs text-red-600 mt-1" role="alert">{{ $message }}</p>
@enderror
