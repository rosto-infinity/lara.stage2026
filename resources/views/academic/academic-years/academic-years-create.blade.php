@extends('layouts.app')

@section('title', 'Nouvelle Année Académique')

@section('content')

    <x-page-header title="Nouvelle Année Académique" subtitle="Créer une nouvelle année académique." />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="{{ route('academic.academic-years.store') }}" method="POST" class="space-y-5">
            @csrf

            <x-form.input
                name="libelle"
                label="Libellé"
                placeholder="Ex : 2026-2027"
                value="{{ old('libelle') }}"
                 />

            <div class="grid grid-cols-2 gap-4">
                <x-form.input
                    name="date_debut"
                    label="Date de début"
                    type="date"
                    value="{{ old('date_debut') }}"
                     />

                <x-form.input
                    name="date_fin"
                    label="Date de fin"
                    type="date"
                    value="{{ old('date_fin') }}"
                     />
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" id="est_active" name="est_active" value="1" {{ old('est_active') ? 'checked' : '' }}
                       class="w-4 h-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                <label for="est_active" class="text-sm text-gray-700">
                    Définir comme année active
                    <span class="text-xs text-gray-400 ml-1">(désactivera l'année courante)</span>
                </label>
            </div>

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Enregistrer
                </button>
                <a href="{{ route('academic.academic-years.index') }}"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
