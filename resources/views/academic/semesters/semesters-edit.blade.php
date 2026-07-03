@extends('layouts.app')
@section('title', 'Modifier — ' . $semester->libelle)
@section('content')

    <x-page-header title="Modifier le Semestre" :subtitle="$semester->libelle . ' — ' . $semester->level->libelle" />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="{{ route('academic.semesters.update', $semester) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <x-form.select
                name="level_id"
                label="Niveau"
                :options="$levels->mapWithKeys(fn($l) => [$l->id => $l->libelle . ' — ' . $l->program->libelle])->toArray()"
                :selected="$semester->level_id"
                :required="true" />

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="numero" label="Numéro" type="number" :value="$semester->numero" :required="true" />
                <x-form.input name="credits_requis" label="Crédits requis" type="number" :value="$semester->credits_requis" :required="true" />
            </div>

            <x-form.input name="libelle" label="Libellé" :value="$semester->libelle" :required="true" />

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Mettre à jour
                </button>
                <a href="{{ route('academic.semesters.index') }}"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
