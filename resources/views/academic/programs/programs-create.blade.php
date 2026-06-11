@extends('layouts.app')
@section('title', 'Nouvelle Filière')
@section('content')

    <x-page-header title="Nouvelle Filière" subtitle="Créer une filière de formation." />

    <div class="max-w-xl bg-white border border-gray-200 rounded-md p-6">
        <form action="/academic/programs" method="POST" class="space-y-5">

            <div class="grid grid-cols-2 gap-4">
                <x-form.input name="code" label="Code" placeholder="Ex : GI" :required="true" />
                <x-form.select
                    name="type_diplome"
                    label="Type de diplôme"
                    :options="['licence' => 'Licence', 'master' => 'Master', 'doctorat' => 'Doctorat', 'bts' => 'BTS']"
                    :required="true" />
            </div>

            <x-form.input name="libelle" label="Libellé" placeholder="Ex : Génie Informatique" :required="true" />

            <x-form.input name="nombre_semestres" label="Nombre de semestres" type="number" placeholder="6" :required="true" />

            <x-form.textarea name="description" label="Description" placeholder="Description de la filière…" />

            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
                    Enregistrer
                </button>
                <a href="/academic/programs"
                   class="px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>

@endsection
