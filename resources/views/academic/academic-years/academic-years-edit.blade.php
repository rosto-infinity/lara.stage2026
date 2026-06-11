@extends('layouts.app')

@section('title', 'Modifier — 2025-2026')

@section('content')

    <x-page-header title="Modifier l'Année Académique" subtitle="2025-2026" />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="/academic/academic-years/1" method="POST" class="space-y-5">

            <x-form.input
                name="libelle"
                label="Libellé"
                value="2025-2026"
                :required="true" />

            <div class="grid grid-cols-2 gap-4">
                <x-form.input
                    name="date_debut"
                    label="Date de début"
                    type="date"
                    value="2025-09-01"
                    :required="true" />

                <x-form.input
                    name="date_fin"
                    label="Date de fin"
                    type="date"
                    value="2026-06-30"
                    :required="true" />
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" id="est_active" name="est_active" value="1" checked
                       class="w-4 h-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                <label for="est_active" class="text-sm text-gray-700">
                    Année active
                </label>
            </div>

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Mettre à jour
                </button>
                <a href="/academic/academic-years"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
