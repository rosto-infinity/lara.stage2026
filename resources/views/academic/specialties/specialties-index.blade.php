@extends('layouts.app')
@section('title', 'Spécialités')
@section('actions')
    <a href="/academic/specialties/create"
       class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Nouvelle spécialité
    </a>
@endsection
@section('content')

    <x-page-header title="Spécialités" subtitle="Spécialités rattachées aux filières." />

    {{-- Filtre --}}
    <div class="mb-4">
        <select class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
            <option value="">Toutes les filières</option>
            <option value="1" selected>Génie Informatique</option>
            <option value="2">Génie Civil</option>
            <option value="3">Génie Électrique</option>
        </select>
    </div>

    <div class="bg-white border border-gray-200 rounded-md overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50">
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Code</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Libellé</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Filière</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Niveaux</th>
                    <th class="text-right px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach([
                    ['id'=>1,'code'=>'GL','libelle'=>'Génie Logiciel','filiere'=>'Génie Informatique','niveaux'=>3],
                    ['id'=>2,'code'=>'RS','libelle'=>'Réseaux & Systèmes','filiere'=>'Génie Informatique','niveaux'=>3],
                    ['id'=>3,'code'=>'BD','libelle'=>'Bases de Données','filiere'=>'Génie Informatique','niveaux'=>2],
                ] as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $item['code'] }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $item['libelle'] }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $item['filiere'] }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $item['niveaux'] }}</td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="/academic/specialties/{{ $item['id'] }}/edit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">Modifier</a>
                                <button type="submit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-400 hover:text-red-600 hover:border-red-300 transition-colors">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
