@extends('layouts.app')
@section('title', 'Semestres')
@section('actions')
    <a href="/academic/semesters/create"
       class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Nouveau semestre
    </a>
@endsection
@section('content')

    <x-page-header title="Semestres" subtitle="Semestres organisés par niveau d'études." />

    <div class="mb-4">
        <select class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
            <option>Tous les niveaux</option>
            <option selected>Niveau 1 — Génie Informatique</option>
            <option>Niveau 2 — Génie Informatique</option>
            <option>Niveau 3 — Génie Informatique</option>
        </select>
    </div>

    <div class="bg-white border border-gray-200 rounded-md overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50">
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">N°</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Libellé</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Niveau</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Crédits requis</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Nb UE</th>
                    <th class="text-right px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach([
                    ['id'=>1,'num'=>'S1','libelle'=>'Semestre 1','niveau'=>'Niveau 1','credits'=>30,'ue'=>5],
                    ['id'=>2,'num'=>'S2','libelle'=>'Semestre 2','niveau'=>'Niveau 1','credits'=>30,'ue'=>5],
                    ['id'=>3,'num'=>'S3','libelle'=>'Semestre 3','niveau'=>'Niveau 2','credits'=>30,'ue'=>6],
                    ['id'=>4,'num'=>'S4','libelle'=>'Semestre 4','niveau'=>'Niveau 2','credits'=>30,'ue'=>6],
                ] as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $item['num'] }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $item['libelle'] }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $item['niveau'] }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $item['credits'] }} crédits</td>
                    <td class="px-4 py-3 text-gray-600">{{ $item['ue'] }}</td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="/academic/semesters/{{ $item['id'] }}/edit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">Modifier</a>
                            <form action="/academic/semesters/{{ $item['id'] }}" method="POST" class="inline">
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
