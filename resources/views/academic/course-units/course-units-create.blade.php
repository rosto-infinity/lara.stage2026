@extends('layouts.app')
@section('title', 'Nouvelle Unité d\'Enseignement')
@section('content')

    <x-page-header title="Nouvelle Unité d'Enseignement" subtitle="Créer une UE et l'associer à un semestre." />

    <div class="max-w-2xl bg-white border border-gray-200 rounded-md p-6">
        <form action="/academic/course-units" method="POST" class="space-y-5">

            <div class="grid grid-cols-2 gap-4">
                <x-form.select
                    name="semester_id"
                    label="Semestre"
                    :options="[
                        1 => 'S1 — Niveau 1 / Génie Informatique',
                        2 => 'S2 — Niveau 1 / Génie Informatique',
                        3 => 'S3 — Niveau 2 / Génie Informatique',
                        4 => 'S4 — Niveau 2 / Génie Informatique',
                    ]"
                    :required="true" />

                <x-form.select
                    name="specialty_id"
                    label="Spécialité"
                    :options="[1 => 'Génie Logiciel', 2 => 'Réseaux & Systèmes', 3 => 'Bases de Données']"
                    placeholder="Tronc commun (aucune)" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="code" label="Code UE" placeholder="Ex : UE-INF" :required="true" />
                <x-form.input name="libelle" label="Libellé" placeholder="Ex : Informatique Fondamentale" :required="true" />
            </div>

            <div class="grid grid-cols-3 gap-4">
                <x-form.select
                    name="type_ue"
                    label="Type d'UE"
                    :options="['fondamentale' => 'Fondamentale', 'optionnelle' => 'Optionnelle', 'transversale' => 'Transversale']"
                    :required="true" />

                <x-form.input name="credits" label="Crédits" type="number" placeholder="4" :required="true" />

                <x-form.input name="pourcentage_semestre" label="% du semestre" type="number" placeholder="13" />
            </div>

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Enregistrer
                </button>
                <a href="/academic/course-units"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
