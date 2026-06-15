# Simplification de l'activation/désactivation de l'année académique

Nous avons optimisé et factorisé le code permettant d'activer ou de désactiver une année académique, réduisant ainsi le nombre de lignes de code et améliorant sa lisibilité.

## Modifications effectuées

### 1. Routage ([web.php](file:///home/devinsto/sites/lara.stage2026/routes/web.php))
- Remplacement des deux routes POST spécifiques (`activate` et `deactivate`) par une seule route PATCH `toggle` tirant parti du **Route Model Binding** de Laravel :
  ```php
  Route::patch('academic-years/{academicYear}/toggle', [AcademicYearController::class, 'toggle'])
      ->name('academic-years.toggle');
  ```

### 2. Contrôleur ([AcademicYearController.php](file:///home/devinsto/sites/lara.stage2026/app/Http/Controllers/Academic/AcademicYearController.php))
- Suppression des méthodes `activate` et `deactivate`.
- Implémentation d'une action unique `toggle(AcademicYear $academicYear)` tirant profit de l'injection automatique du modèle :
  ```php
  public function toggle(AcademicYear $academicYear): RedirectResponse
  {
      $academicYear->update(['est_active' => !$academicYear->est_active]);

      $status = $academicYear->est_active ? 'activée' : 'désactivée';

      return back()->with('success', "L'année académique {$academicYear->libelle} a été {$status}.");
  }
  ```

### 3. Modèle ([AcademicYear.php](file:///home/devinsto/sites/lara.stage2026/app/Models/Academic/AcademicYear.php))
- Suppression des méthodes redondantes `activate()` et `deactivate()`.
- Note : La logique d'unicité (un seul exercice actif à la fois) reste pleinement opérationnelle via les hooks de modèle `creating` et `updating` déjà en place.

### 4. Vue Blade ([academic-years-index.blade.php](file:///home/devinsto/sites/lara.stage2026/resources/views/academic/academic-years/academic-years-index.blade.php))
- Regroupement des formulaires conditionnels dans un formulaire unique dynamique.
- Remplacement de l'utilisation de `$year->id` par `$year` pour les helpers de route :
  ```html
  <form action="{{ route('academic.academic-years.toggle', $year) }}" method="POST" class="inline">
      @csrf
      @method('PATCH')
      <button type="submit"
          class="px-2.5 py-1.5 text-xs font-medium border rounded-md transition-colors {{ $year->est_active ? 'border-gray-300 text-gray-700 hover:bg-gray-100' : 'border-red-300 text-red-700 hover:bg-red-50' }}">
          {{ $year->est_active ? 'Désactiver' : 'Activer' }}
      </button>
  </form>
  ```

---

## Validation et Résultats

1. **Volume de code réduit** :
   - Moins de routes déclarées.
   - Moins d'instructions et de requêtes manuelles dans le contrôleur.
   - Plus de duplication HTML/Blade pour les boutons d'action.
2. **Robustesse accrue** : Utilisation du Route Model Binding standard de Laravel au lieu de résolutions manuelles d'ID.


---
Searched web: "laravel 11 12 13 model toggle boolean"
Viewed academic-years-edit.blade.php:1-56

Il n'existe pas de méthode native intégrée d'Eloquent dans Laravel 13 (comme `$model->toggle('est_active')`) pour basculer directement un attribut booléen en base de données sans repasser par une affectation classique ou une expression SQL brute. 

La technique que nous avons mise en place :
```php
$academicYear->update(['est_active' => !$academicYear->est_active]);
```
est la plus concise, la plus standard, et la plus sûre de Laravel car :
1. **Événements Eloquent (Observables)** : Elle déclenche les hooks de modèle `updating` et `updated`, ce qui permet à notre logique de désactivation des autres années académiques de fonctionner automatiquement (sans avoir à réécrire cette logique dans le contrôleur).
2. **Route Model Binding** : Elle évite d'injecter des classes supplémentaires ou d'écrire des requêtes manuelles.

### Est-il possible de réduire encore plus ?

Si l'on souhaite épurer au maximum le contrôleur, nous pourrions définir une méthode helper sémantique sur le modèle [AcademicYear.php](file:///home/devinsto/sites/lara.stage2026/app/Models/Academic/AcademicYear.php) :

```php
public function toggleActive(): bool
{
    return $this->update(['est_active' => !$this->est_active]);
}
```

Ce qui permettrait d'avoir cette unique ligne dans le contrôleur :
```php
$academicYear->toggleActive();
```

Cependant, cela déplace simplement le code du contrôleur vers le modèle sans réellement en réduire le volume global. La solution actuelle est donc la plus optimisée et la plus propre en termes d'architecture.