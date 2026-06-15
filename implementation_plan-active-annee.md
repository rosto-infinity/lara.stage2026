# Optimisation de l'activation/désactivation de l'année académique

Analyse de la situation actuelle et plan d'amélioration pour réduire le volume de code et simplifier l'architecture en s'appuyant sur les bonnes pratiques de Laravel 13.

## Analyse de l'existant

Actuellement, l'activation et la désactivation des années académiques reposent sur :
- **2 routes distinctes (POST)** dans [web.php](file:///home/devinsto/sites/lara.stage2026/routes/web.php) : `/academic-years/{id}/activate` et `/academic-years/{id}/deactivate`.
- **2 actions de contrôleur** distinctes dans [AcademicYearController.php](file:///home/devinsto/sites/lara.stage2026/app/Http/Controllers/Academic/AcademicYearController.php) avec chargement manuel du modèle via `findOrFail($id)`.
- **2 méthodes de modèle** dans [AcademicYear.php](file:///home/devinsto/sites/lara.stage2026/app/Models/Academic/AcademicYear.php) (`activate()` et `deactivate()`).
- **2 formulaires Blade dupliqués** dans [academic-years-index.blade.php](file:///home/devinsto/sites/lara.stage2026/resources/views/academic/academic-years/academic-years-index.blade.php) pour afficher le bouton "Activer" ou "Désactiver".

---

## Proposition d'amélioration (Moins de Code & TALL Stack standard)

Nous allons simplifier l'implémentation de la manière suivante :

1. **Route unique & Model Binding** : Remplacer les deux routes POST par une unique route PATCH `/academic-years/{academicYear}/toggle` qui utilise le **Route Model Binding** natif pour injecter directement le modèle `AcademicYear`.
2. **Méthode unique dans le contrôleur** : Fusionner `activate` et `deactivate` dans une méthode `toggle(AcademicYear $academicYear)` ultra-courte.
3. **Simplification du Modèle** : Supprimer les méthodes redondantes `activate()` et `deactivate()`.
4. **Factorisation de la Vue** : Regrouper les deux formulaires d'activation/désactivation en un seul formulaire dynamique avec classes conditionnelles Tailwind.

---

## Proposed Changes

### 1. Routes (Structure de routage)

#### [MODIFY] [web.php](file:///home/devinsto/sites/lara.stage2026/routes/web.php)
- Supprimer les routes `activate` et `deactivate`.
- Ajouter une route unique PATCH `toggle` avec Route Model Binding.

```diff
-    Route::post('academic-years/{id}/activate',   [AcademicYearController::class, 'activate'])
-        ->name('academic-years.activate');
-    Route::post('academic-years/{id}/deactivate', [AcademicYearController::class, 'deactivate'])
-        ->name('academic-years.deactivate');
+    Route::patch('academic-years/{academicYear}/toggle', [AcademicYearController::class, 'toggle'])
+        ->name('academic-years.toggle');
```

---

### 2. Contrôleur (Logique applicative)

#### [MODIFY] [AcademicYearController.php](file:///home/devinsto/sites/lara.stage2026/app/Http/Controllers/Academic/AcademicYearController.php)
- Supprimer les méthodes `activate` et `deactivate`.
- Ajouter la méthode `toggle(AcademicYear $academicYear)` utilisant le model binding.

```php
    public function toggle(AcademicYear $academicYear): RedirectResponse
    {
        $academicYear->update(['est_active' => !$academicYear->est_active]);
        
        $status = $academicYear->est_active ? 'activée' : 'désactivée';
        
        return back()->with('success', "L'année académique {$academicYear->libelle} a été {$status}.");
    }
```

---

### 3. Modèle (Logique métier)

#### [MODIFY] [AcademicYear.php](file:///home/devinsto/sites/lara.stage2026/app/Models/Academic/AcademicYear.php)
- Supprimer les méthodes `activate()` et `deactivate()`.
- L'événement `updating` du modèle gère déjà automatiquement la désactivation des autres années académiques si la valeur de `est_active` passe à `true`. Aucune logique supplémentaire n'est requise.

```diff
-    /**
-     * Activer l'année académique.
-     */
-    public function activate(): bool
-    {
-        return $this->update(['est_active' => true]);
-    }
-
-    /**
-     * Désactiver l'année académique.
-     */
-    public function deactivate(): bool
-    {
-        return $this->update(['est_active' => false]);
-    }
```

---

### 4. Vue (Présentation & UX)

#### [MODIFY] [academic-years-index.blade.php](file:///home/devinsto/sites/lara.stage2026/resources/views/academic/academic-years/academic-years-index.blade.php)
- Remplacer les deux formulaires conditionnels par un seul formulaire concis utilisant `@method('PATCH')`.

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

## Verification Plan

### Manual Verification
1. Visiter la page des années académiques.
2. Cliquer sur "Activer" sur une année inactive : s'assurer qu'elle devient active et que l'ancienne année active devient inactive (grâce aux événements Eloquent dans le modèle).
3. Cliquer sur "Désactiver" sur l'année active : s'assurer qu'elle passe à inactive et qu'aucune année n'est plus marquée comme active.
4. Vérifier que les messages flash (success notifications) s'affichent correctement en français.
