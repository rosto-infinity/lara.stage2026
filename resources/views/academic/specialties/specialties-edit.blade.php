@extends('layouts.app')
@section('title', 'Modifier — Génie Logiciel')
@section('content')

    <x-page-header title="Modifier la Spécialité" subtitle="Génie Logiciel" />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="/academic/specialties/1" method="POST" class="space-y-5">

            <x-form.select
                name="program_id"
                label="Filière"
                :options="[1 => 'Génie Informatique', 2 => 'Génie Civil', 3 => 'Génie Électrique']"
                selected="1"
                :required="true" />

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="code" label="Code" value="GL" :required="true" />
                <x-form.input name="libelle" label="Libellé" value="Génie Logiciel" :required="true" />
            </div>

            <x-form.textarea name="description" label="Description" value="Spécialité axée sur le développement logiciel et le génie logiciel." />

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Mettre à jour
                </button>
                <a href="/academic/specialties"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
