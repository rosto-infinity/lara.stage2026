@extends('layouts.app')
@section('title', 'Nouveau Semestre')
@section('content')

    <x-page-header title="Nouveau Semestre" subtitle="Ajouter un semestre à un niveau." />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="{{ route('academic.semesters.store') }}" method="POST" class="space-y-5">
            @csrf

            <x-form.select
                name="level_id"
                label="Niveau"
                :options="$levels->mapWithKeys(fn($l) => [$l->id => $l->libelle . ' — ' . $l->program->libelle])->toArray()"
                :required="true" />

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="numero" label="Numéro" type="number" placeholder="1" :required="true" />
                <x-form.input name="credits_requis" label="Crédits requis" type="number" placeholder="30" :required="true" />
            </div>

            <x-form.input name="libelle" label="Libellé" placeholder="Ex : Semestre 1" :required="true" />

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Enregistrer
                </button>
                <a href="{{ route('academic.semesters.index') }}"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
