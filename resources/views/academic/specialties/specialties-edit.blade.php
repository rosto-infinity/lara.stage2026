@extends('layouts.app')
@section('title', 'Modifier — ' . $specialty->libelle)
@section('content')

    <x-page-header title="Modifier la Spécialité" :subtitle="$specialty->libelle" />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="{{ route('academic.specialties.update', $specialty) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <x-form.select
                name="program_id"
                label="Filière"
                :options="$programs->pluck('libelle', 'id')->toArray()"
                :selected="$specialty->program_id"
                :required="true" />

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="code" label="Code" :value="$specialty->code" :required="true" />
                <x-form.input name="libelle" label="Libellé" :value="$specialty->libelle" :required="true" />
            </div>

            <x-form.textarea name="description" label="Description" :value="$specialty->description" />

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Mettre à jour
                </button>
                <a href="{{ route('academic.specialties.index') }}"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
