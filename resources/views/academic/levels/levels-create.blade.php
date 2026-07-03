@extends('layouts.app')
@section('title', 'Nouveau Niveau')
@section('content')

    <x-page-header title="Nouveau Niveau" subtitle="Ajouter un niveau d'études." />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="{{ route('academic.levels.store') }}" method="POST" class="space-y-5">
            @csrf

            <x-form.select
                name="program_id"
                label="Filière"
                :options="$programs->pluck('libelle', 'id')->toArray()"
                :required="true" />

            <x-form.select
                name="specialty_id"
                label="Spécialité (optionnel — laisser vide pour tronc commun)"
                :options="$specialties->pluck('libelle', 'id')->toArray()"
                placeholder="Tronc commun" />

            <div class="grid grid-cols-3 gap-4">
                <x-form.input name="code" label="Code" placeholder="Ex : L1" :required="true" />
                <x-form.input name="libelle" label="Libellé" placeholder="Ex : Niveau 1" :required="true" />
                <x-form.input name="ordre" label="Ordre" type="number" placeholder="1" :required="true" />
            </div>

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Enregistrer
                </button>
                <a href="{{ route('academic.levels.index') }}"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
