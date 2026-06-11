# 🗺️ Plan Général d'Implémentation — GestAcad
> Objectif : passer des templates statiques à une application Laravel 13 entièrement fonctionnelle.
> Stack : Laravel 13 · Blade · Tailwind CSS v4 · MySQL

---

## ✅ Phase 0 — Terminé (Templates & Navigation)

| Livrable | Statut |
|---|---|
| Layout `layouts/app.blade.php` (sidebar rouge minimaliste) | ✅ |
| Page d'accueil `home.blade.php` (standalone) | ✅ |
| Page `dashboard.blade.php` (avec sidebar) | ✅ |
| 11 composants Blade (`badge`, `alert`, `stat-card`, `form/*`…) | ✅ |
| 18 vues CRUD dans `academic/` (index + create + edit) | ✅ |
| Routes directes vers vues (sans contrôleurs) | ✅ |

---

## 🗄️ Phase 1 — Base de Données (Migrations)

Créer les migrations dans cet ordre strict (respect des clés étrangères) :

```
1. create_academic_years_table
2. create_programs_table
3. create_specialties_table       ← FK: program_id
4. create_levels_table            ← FK: program_id, specialty_id (nullable)
5. create_semesters_table         ← FK: level_id
6. create_course_units_table      ← FK: semester_id, specialty_id (nullable)
```

**Colonnes clés à vérifier :**
- `academic_years.est_active` → `boolean, default false`
- `levels` → clé unique composite `[program_id, specialty_id, ordre]`
- `semesters` → clé unique composite `[level_id, numero]`
- `course_units.specialty_id` → **nullable** (tronc commun si NULL)

**Commandes :**
```bash
php artisan make:migration create_academic_years_table
php artisan make:migration create_programs_table
# … (idem pour les 4 autres)
php artisan migrate
```

---

## 🧱 Phase 2 — Modèles Eloquent & Relations

Créer les modèles dans `App\Models\Academic\` :

| Modèle | Relations clés |
|---|---|
| `AcademicYear` | `boot()` avec hooks `creating`/`updating` (N+1 fixé) |
| `Program` | `hasMany(Specialty)`, `hasMany(Level)` |
| `Specialty` | `belongsTo(Program)`, `hasMany(Level)`, `hasMany(CourseUnit)` |
| `Level` | `belongsTo(Program)`, `belongsTo(Specialty)` nullable, `hasMany(Semester)` |
| `Semester` | `belongsTo(Level)`, `hasMany(CourseUnit)` |
| `CourseUnit` | `belongsTo(Semester)`, `belongsTo(Specialty)` nullable |

**Commandes :**
```bash
php artisan make:model Academic/AcademicYear
php artisan make:model Academic/Program
php artisan make:model Academic/Specialty
php artisan make:model Academic/Level
php artisan make:model Academic/Semester
php artisan make:model Academic/CourseUnit
```

---

## 🌱 Phase 3 — Seeders (Données de démonstration)

Alimenter la BD avec des données réalistes pour valider les vues :

```
DatabaseSeeder
├── AcademicYearSeeder   → 3 années (1 active)
├── ProgramSeeder        → GI (Licence), GC (Licence), GE (Master)
├── SpecialtySeeder      → GL, RS, BD rattachées à GI
├── LevelSeeder          → L1, L2 tronc commun + L3 par spécialité
├── SemesterSeeder       → S1→S6 par niveau
└── CourseUnitSeeder     → 6-8 UE par semestre
```

```bash
php artisan make:seeder AcademicYearSeeder
# … (idem)
php artisan db:seed
```

---

## 🎛️ Phase 4 — Contrôleurs & Form Requests

Créer les contrôleurs dans `App\Http\Controllers\Academic\` :

### Pattern à appliquer sur chaque contrôleur

```php
// Exemple : AcademicYearController
public function index()    → view avec with() complet (anti-N+1)
public function create()   → view avec getFormData()
public function store()    → valider + créer + redirect()->with('success')
public function edit()     → view avec getFormData() + model
public function update()   → valider + update + redirect()
public function destroy()  → delete + redirect()
// Spécifique AcademicYear :
public function activate()   → $model->activate() + redirect()
public function deactivate() → $model->deactivate() + redirect()
```

**Commandes :**
```bash
php artisan make:controller Academic/AcademicYearController --resource
php artisan make:controller Academic/ProgramController --resource
php artisan make:controller Academic/SpecialtyController --resource
php artisan make:controller Academic/LevelController --resource
php artisan make:controller Academic/SemesterController --resource
php artisan make:controller Academic/CourseUnitController --resource
```

**Form Requests (validation) :**
```bash
php artisan make:request Academic/StoreAcademicYearRequest
php artisan make:request Academic/UpdateAcademicYearRequest
# … (idem pour chaque entité)
```

---

## 🔌 Phase 5 — Branchement Routes → Contrôleurs

Remplacer les routes `fn() => view(...)` par les contrôleurs dans `routes/web.php` :

```php
// Avant (template statique)
Route::get('academic-years', fn() => view('academic.academic-years.academic-years-index'));

// Après (contrôleur branché)
Route::resource('academic-years', AcademicYearController::class);
Route::post('academic-years/{academicYear}/activate',   [AcademicYearController::class, 'activate']);
Route::post('academic-years/{academicYear}/deactivate', [AcademicYearController::class, 'deactivate']);
```

---

## 🔄 Phase 6 — Adaptation des Vues (Données réelles)

Remplacer les données statiques dans les vues par les variables Eloquent :

```blade
{{-- Avant (template statique) --}}
@foreach([['code'=>'GI', 'libelle'=>'Génie Informatique', ...]] as $item)

{{-- Après (données réelles) --}}
@forelse($programs as $program)
    <tr>
        <td>{{ $program->code }}</td>
        <td>{{ $program->libelle }}</td>
        <td>{{ $program->specialties_count }}</td>
    </tr>
@empty
    <x-empty-state message="Aucune filière trouvée." action-label="Créer une filière" action-url="/academic/programs/create" />
@endforelse
{{ $programs->links() }}
```

**Ajouter aussi dans les formulaires `edit` :**
```blade
{{-- Avant --}}
value="Génie Informatique"

{{-- Après --}}
value="{{ $program->libelle }}"
```

---

## 🛡️ Phase 7 — AppServiceProvider & Sécurité

```php
// app/Providers/AppServiceProvider.php
public function boot(): void
{
    // Détection N+1 en développement
    Model::preventLazyLoading(! app()->isProduction());

    // Pagination avec Tailwind
    Paginator::useTailwind();
}
```

---

## 📋 Ordre d'Exécution Final

```
1.  php artisan make:migration ...  (×6)
2.  php artisan migrate
3.  php artisan make:model ...      (×6)  → ajouter relations + boot()
4.  php artisan make:seeder ...     (×6)  → php artisan db:seed
5.  Vérifier dashboard avec données réelles
6.  php artisan make:controller ... (×6)  → implémenter méthodes
7.  php artisan make:request ...    (×12) → règles de validation
8.  Mettre à jour routes/web.php    → remplacer fn() par contrôleurs
9.  Adapter les vues                → remplacer données statiques
10. AppServiceProvider              → preventLazyLoading + pagination
11. Tester chaque CRUD complet
```

---

## 📁 Arborescence Finale Attendue

```
app/
├── Http/
│   ├── Controllers/Academic/
│   │   ├── AcademicYearController.php
│   │   ├── ProgramController.php
│   │   ├── SpecialtyController.php
│   │   ├── LevelController.php
│   │   ├── SemesterController.php
│   │   └── CourseUnitController.php
│   └── Requests/Academic/
│       ├── StoreAcademicYearRequest.php
│       ├── UpdateAcademicYearRequest.php
│       └── … (×10 autres)
├── Models/Academic/
│   ├── AcademicYear.php
│   ├── Program.php
│   ├── Specialty.php
│   ├── Level.php
│   ├── Semester.php
│   └── CourseUnit.php
database/
├── migrations/   (×6)
└── seeders/      (×6 + DatabaseSeeder)
resources/views/  (✅ déjà terminé)
routes/web.php    (à mettre à jour phase 5)
```
