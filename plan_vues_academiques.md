# 📐 Plan des Vues Blade — Structure Académique
> **Périmètre** : Templates, Layouts et Composants uniquement.
> Pas de migrations, routes, ni contrôleurs.
> Stack : **Laravel 13 + Tailwind CSS v4 + Vite + Instrument Sans**

---

## 🗂️ Arborescence Cible

```
resources/views/
│
├── layouts/
│   └── app.blade.php                       ← Layout principal (sidebar + topbar)
│
├── components/
│   ├── nav-link.blade.php                  ← Lien de navigation actif/inactif
│   ├── breadcrumb.blade.php                ← Fil d'Ariane dynamique
│   ├── page-header.blade.php               ← En-tête de page (titre + bouton action)
│   ├── stat-card.blade.php                 ← Carte statistique (nombre + label + icône)
│   ├── badge.blade.php                     ← Badge statut (actif, inactif, type UE…)
│   ├── empty-state.blade.php               ← État vide (icône + message + CTA)
│   ├── alert.blade.php                     ← Alerte flash (success / error / warning)
│   └── form/
│       ├── input.blade.php                 ← Input text/email/date stylisé
│       ├── select.blade.php                ← Select stylisé
│       ├── textarea.blade.php              ← Textarea stylisé
│       └── error.blade.php                 ← Message d'erreur de validation
│
└── academic/
            ├── academic-years/
            │   ├── academic-years-index.blade.php
            │   ├── academic-years-create.blade.php
            │   └── academic-years-edit.blade.php
            ├── programs/
            │   ├── programs-index.blade.php
            │   ├── programs-create.blade.php
            │   └── programs-edit.blade.php
            ├── specialties/
            │   ├── specialties-index.blade.php
            │   ├── specialties-create.blade.php
            │   └── specialties-edit.blade.php
            ├── levels/
            │   ├── levels-index.blade.php
            │   ├── levels-create.blade.php
            │   └── levels-edit.blade.php
            ├── semesters/
            │   ├── semesters-index.blade.php
            │   ├── semesters-create.blade.php
            │   └── semesters-edit.blade.php
            └── course-units/
                ├── course-units-index.blade.php
                ├── course-units-create.blade.php
                └── course-units-edit.blade.php
```

**Total : 1 layout + 11 composants + 18 vues = 30 fichiers**

> 💡 **Référencement Laravel** : `view('academic.academic-years-index')`, `view('academic.programs-create')`, etc.

---

## 🎨 Phase 1 — Layout Principal

### `layouts/app.blade.php`

**Structure visuelle :**
```
┌────────────────────────────────────────────────────┐
│  SIDEBAR (fixe, 260px)        │  TOPBAR (fixe)     │
│  ────────────────────────     │  ────────────────── │
│  🎓 GestAcad                  │  Fil d'Ariane       │
│                               │  + Nom utilisateur  │
│  Navigation :                 │                     │
│  • Dashboard                  ├─────────────────────│
│  ─── Académique ──            │  CONTENU (@yield)   │
│  • Années Académiques         │                     │
│  • Filières                   │                     │
│  • Spécialités                │                     │
│  • Niveaux                    │                     │
│  • Semestres                  │                     │
│  • Unités d'Enseignement      │                     │
└────────────────────────────────────────────────────┘
```

**Sections Blade :**
- `@yield('title')` — titre onglet navigateur
- `@yield('content')` — contenu principal
- `@yield('actions')` — boutons topbar (optionnel)

---

## 🧩 Phase 2 — Composants

### `components/nav-link.blade.php`
**Props :** `href`, `active` (bool), slot (label)
**Rendu :** fond coloré si actif, transparent avec hover sinon

### `components/breadcrumb.blade.php`
**Props :** `items` — `[['label' => '...', 'url' => '...']]`
**Rendu :** `Accueil / Académique / Années Académiques`

### `components/page-header.blade.php`
**Props :** `title`, `subtitle` (optionnel), slot `actions`
```
┌─────────────────────────────────────────┐
│  Titre de la page           [+ Créer]   │
│  Sous-titre optionnel                   │
└─────────────────────────────────────────┘
```

### `components/stat-card.blade.php`
**Props :** `label`, `value`, `icon`, `color` (indigo/green/amber/rose)
Carte avec fond coloré léger, icône SVG, valeur numérique et label

### `components/badge.blade.php`
**Props :** `color` (green/gray/blue/purple/orange), slot (texte)
**Exemples :** `Actif`, `Inactif`, `Fondamentale`, `Optionnelle`

### `components/empty-state.blade.php`
**Props :** `message`, `action-label`, `action-url`
Icône centrée + message + bouton CTA

### `components/alert.blade.php`
**Props :** `type` (success/error/warning/info), slot
Affiché via `session('success')` / `session('error')` dans le layout

### `components/form/input.blade.php`
**Props :** `name`, `label`, `type` (text/date/number), `value`, `required`

### `components/form/select.blade.php`
**Props :** `name`, `label`, `options` (`id => label`), `selected`, `placeholder`

### `components/form/textarea.blade.php`
**Props :** `name`, `label`, `value`, `rows` (défaut 4)

### `components/form/error.blade.php`
**Props :** `name` — affiche `$errors->first($name)`

---

## 📋 Phase 3 — Vues par Entité

### 3.1 — Années Académiques

#### `academic-years-index.blade.php`
**Stats cards :** Total années · Année active · Prochaine année
**Tableau :**
```
| Libellé   | Début      | Fin        | Statut    | Actions              |
|-----------|------------|------------|-----------|----------------------|
| 2025-2026 | 01/09/2025 | 30/06/2026 | ✅ Active  | [Désactiver]         |
| 2024-2025 | 01/09/2024 | 30/06/2025 | ⚪ Inactive | [Activer] [✏️] [🗑️] |
| 2023-2024 | 01/09/2023 | 30/06/2024 | ⚪ Inactive | [Activer] [✏️] [🗑️] |
```

#### `academic-years-create.blade.php` / `academic-years-edit.blade.php`
**Champs :** Libellé · Date début · Date fin · Statut actif (checkbox)

---

### 3.2 — Filières

#### `programs-index.blade.php`
**Stats cards :** Total filières · Total spécialités · Total niveaux
**Tableau :**
```
| Code | Libellé              | Diplôme  | Semestres | Spécialités | Actions    |
|------|----------------------|----------|-----------|-------------|------------|
| GI   | Génie Informatique   | Licence  | 6         | 3           | [✏️] [🗑️] |
| GC   | Génie Civil          | Licence  | 6         | 2           | [✏️] [🗑️] |
| GE   | Génie Électrique     | Master   | 4         | 1           | [✏️] [🗑️] |
```

#### `programs-create.blade.php` / `programs-edit.blade.php`
**Champs :** Code · Libellé · Description · Type diplôme (select) · Nb semestres

---

### 3.3 — Spécialités

#### `specialties-index.blade.php`
**Filtre :** Select par filière
**Tableau :**
```
| Code | Libellé              | Filière              | Niveaux | Actions    |
|------|----------------------|----------------------|---------|------------|
| GL   | Génie Logiciel       | Génie Informatique   | 3       | [✏️] [🗑️] |
| RS   | Réseaux & Systèmes   | Génie Informatique   | 3       | [✏️] [🗑️] |
| BD   | Bases de Données     | Génie Informatique   | 2       | [✏️] [🗑️] |
```

#### `specialties-create.blade.php` / `specialties-edit.blade.php`
**Champs :** Filière (select) · Code · Libellé · Description

---

### 3.4 — Niveaux

#### `levels-index.blade.php`
**Filtres :** Select filière + Select spécialité
**Tableau :**
```
| Code | Libellé  | Filière            | Spécialité      | Ordre | Semestres | Actions    |
|------|----------|--------------------|-----------------|-------|-----------|------------|
| L1   | Niveau 1 | Génie Informatique | (Tronc commun)  | 1     | 2         | [✏️] [🗑️] |
| L2   | Niveau 2 | Génie Informatique | (Tronc commun)  | 2     | 2         | [✏️] [🗑️] |
| L3   | Niveau 3 | Génie Informatique | Génie Logiciel  | 3     | 2         | [✏️] [🗑️] |
```

#### `levels-create.blade.php` / `levels-edit.blade.php`
**Champs :** Filière (select) · Spécialité (select, nullable) · Code · Libellé · Ordre

---

### 3.5 — Semestres

#### `semesters-index.blade.php`
**Filtre :** Select par niveau
**Tableau :**
```
| N°  | Libellé    | Niveau   | Crédits req. | Nb UE | Actions    |
|-----|------------|----------|--------------|-------|------------|
| S1  | Semestre 1 | Niveau 1 | 30           | 5     | [✏️] [🗑️] |
| S2  | Semestre 2 | Niveau 1 | 30           | 5     | [✏️] [🗑️] |
| S3  | Semestre 3 | Niveau 2 | 30           | 6     | [✏️] [🗑️] |
```

#### `semesters-create.blade.php` / `semesters-edit.blade.php`
**Champs :** Niveau (select) · Numéro · Libellé · Crédits requis

---

### 3.6 — Unités d'Enseignement *(vue la plus complexe)*

#### `course-units-index.blade.php`
**Stats cards :** Total UE · Tronc commun · Spécialisées · Total crédits
**Filtres :** Recherche texte + Select spécialité
**Tableau :**
```
| Code    | Libellé                   | Type   | Crédits | Semestre | Spécialité     | %S  | Actions    |
|---------|---------------------------|--------|---------|----------|----------------|-----|------------|
| UE-INF  | Informatique Fondamentale | Fond.  | 6       | S1       | Tronc commun   | 20% | [✏️] [🗑️] |
| UE-ALG  | Algorithmique             | Fond.  | 4       | S1       | Tronc commun   | 13% | [✏️] [🗑️] |
| UE-WEB  | Développement Web         | Opt.   | 4       | S3       | Génie Logiciel | 13% | [✏️] [🗑️] |
```

#### `course-units-create.blade.php` / `course-units-edit.blade.php`
**Champs :**
- Semestre (select — groupé par `Niveau → Semestre`)
- Spécialité (select nullable — option "Tronc commun")
- Code · Libellé
- Type UE (select : Fondamentale / Optionnelle / Transversale)
- Crédits (number)
- % Semestre (number 0–100, optionnel)

---

## 🛡️ Règles de Construction

| Règle | Description |
|---|---|
| **Données fictives** | Vues `*-index` : `@php $items = [...] @endphp` statique |
| **Formulaires** | `method="POST"` + `@csrf` + `@method('PUT')` (edit) |
| **Liens** | `href="#"` pour la démo statique |
| **Erreurs** | `x-form.error` affiché si `$errors->has($name)` |
| **Flash** | `x-alert` dans le layout via `session()` |
| **Tailwind v4** | Pas de config, classes directement dans les templates |
| **Nommage routes** | `route('academic.academic-years-index')` — cohérent avec les fichiers |

---

## 📦 Ordre d'Implémentation

```
Phase 1 — Socle
  1.  layouts/app.blade.php
  2.  components/alert.blade.php
  3.  components/breadcrumb.blade.php
  4.  components/page-header.blade.php
  5.  components/badge.blade.php
  6.  components/stat-card.blade.php
  7.  components/empty-state.blade.php
  8.  components/form/input.blade.php
  9.  components/form/select.blade.php
  10. components/form/textarea.blade.php
  11. components/form/error.blade.php

Phase 2 — Vues entités (index → create → edit)
  12. academic/academic-years-index.blade.php
  13. academic/academic-years-create.blade.php
  14. academic/academic-years-edit.blade.php
  15. academic/programs-index.blade.php
  16. academic/programs-create.blade.php
  17. academic/programs-edit.blade.php
  18. academic/specialties-index.blade.php
  19. academic/specialties-create.blade.php
  20. academic/specialties-edit.blade.php
  21. academic/levels-index.blade.php
  22. academic/levels-create.blade.php
  23. academic/levels-edit.blade.php
  24. academic/semesters-index.blade.php
  25. academic/semesters-create.blade.php
  26. academic/semesters-edit.blade.php
  27. academic/course-units-index.blade.php    ← plus complexe
  28. academic/course-units-create.blade.php
  29. academic/course-units-edit.blade.php
```
