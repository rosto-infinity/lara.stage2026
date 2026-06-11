@extends('layouts.app')
@section('title', 'Modifier — Génie Informatique')
@section('content')

    <x-page-header title="Modifier la Filière" subtitle="Génie Informatique" />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="/academic/programs/1" method="POST" class="space-y-5">

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="code" label="Code" value="GI" :required="true" />
                <x-form.select
                    name="type_diplome"
                    label="Type de diplôme"
                    :options="['licence' => 'Licence', 'master' => 'Master', 'doctorat' => 'Doctorat', 'bts' => 'BTS']"
                    selected="licence"
                    :required="true" />
            </div>

            <x-form.input name="libelle" label="Libellé" value="Génie Informatique" :required="true" />

            <x-form.input name="nombre_semestres" label="Nombre de semestres" type="number" value="6" :required="true" />

            <x-form.textarea name="description" label="Description" value="Formation en génie informatique orientée développement logiciel et réseaux." />

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Mettre à jour
                </button>
                <a href="/academic/programs"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
