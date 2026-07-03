@extends('layouts.app')
@section('title', 'Nouvelle Spécialité')
@section('content')

    <x-page-header title="Nouvelle Spécialité" subtitle="Rattacher une spécialité à une filière." />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="{{ route('academic.specialties.store') }}" method="POST" class="space-y-5">
            @csrf

            <x-form.select
                name="program_id"
                label="Filière"
                :options="$programs->pluck('libelle', 'id')->toArray()"
                :required="true" />

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="code" label="Code" placeholder="Ex : GL" :required="true" />
                <x-form.input name="libelle" label="Libellé" placeholder="Ex : Génie Logiciel" :required="true" />
            </div>

            <x-form.textarea name="description" label="Description" placeholder="Description de la spécialité…" />

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Enregistrer
                </button>
                <a href="{{ route('academic.specialties.index') }}"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
