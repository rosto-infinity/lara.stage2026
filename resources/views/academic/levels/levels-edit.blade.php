@extends('layouts.app')
@section('title', 'Modifier — ' . $level->libelle)
@section('content')

    <x-page-header title="Modifier le Niveau" :subtitle="$level->libelle . ' — ' . $level->program->libelle" />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="{{ route('academic.levels.update', $level) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <x-form.select
                name="program_id"
                label="Filière"
                :options="$programs->pluck('libelle', 'id')->toArray()"
                :selected="$level->program_id"
                :required="true" />

            <x-form.select
                name="specialty_id"
                label="Spécialité (optionnel)"
                :options="$specialties->pluck('libelle', 'id')->toArray()"
                :selected="$level->specialty_id"
                placeholder="Tronc commun" />

            <div class="grid grid-cols-3 gap-4">
                <x-form.input name="code" label="Code" :value="$level->code" :required="true" />
                <x-form.input name="libelle" label="Libellé" :value="$level->libelle" :required="true" />
                <x-form.input name="ordre" label="Ordre" type="number" :value="$level->ordre" :required="true" />
            </div>

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Mettre à jour
                </button>
                <a href="{{ route('academic.levels.index') }}"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
