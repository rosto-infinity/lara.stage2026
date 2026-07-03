@extends('layouts.app')
@section('title', 'Modifier — ' . $program->libelle)
@section('content')

    <x-page-header title="Modifier la Filière" :subtitle="$program->libelle" />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="{{ route('academic.programs.update', $program) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="code" label="Code" :value="$program->code" :required="true" />
                <x-form.select
                    name="type_diplome"
                    label="Type de diplôme"
                    :options="\App\Enums\DiplomaType::forSelect()"
                    :selected="$program->type_diplome->value"
                    :required="true" />
            </div>

            <x-form.input name="libelle" label="Libellé" :value="$program->libelle" :required="true" />

            <x-form.input name="nombre_semestres" label="Nombre de semestres" type="number" :value="$program->nombre_semestres" :required="true" />

            <x-form.textarea name="description" label="Description" :value="$program->description" />

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Mettre à jour
                </button>
                <a href="{{ route('academic.programs.index') }}"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
