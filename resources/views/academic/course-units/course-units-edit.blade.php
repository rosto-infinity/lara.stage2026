@extends('layouts.app')
@section('title', 'Modifier — UE-INF')
@section('content')

    <x-page-header title="Modifier l'Unité d'Enseignement" subtitle="UE-INF — Informatique Fondamentale" />

    <div class="max-w-2xl bg-white border border-gray-200 rounded-md p-6">
        <form action="/academic/course-units/1" method="POST" class="space-y-5">

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
                    selected="1"
                    :required="true" />

                <x-form.select
                    name="specialty_id"
                    label="Spécialité"
                    :options="[1 => 'Génie Logiciel', 2 => 'Réseaux & Systèmes', 3 => 'Bases de Données']"
                    placeholder="Tronc commun (aucune)" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="code" label="Code UE" value="UE-INF" :required="true" />
                <x-form.input name="libelle" label="Libellé" value="Informatique Fondamentale" :required="true" />
            </div>

            <div class="grid grid-cols-3 gap-4">
                <x-form.select
                    name="type_ue"
                    label="Type d'UE"
                    :options="['fondamentale' => 'Fondamentale', 'optionnelle' => 'Optionnelle', 'transversale' => 'Transversale']"
                    selected="fondamentale"
                    :required="true" />

                <x-form.input name="credits" label="Crédits" type="number" value="6" :required="true" />

                <x-form.input name="pourcentage_semestre" label="% du semestre" type="number" value="20" />
            </div>

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Mettre à jour
                </button>
                <a href="/academic/course-units"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
