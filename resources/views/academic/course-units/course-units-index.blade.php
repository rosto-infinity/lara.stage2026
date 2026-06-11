@extends('layouts.app')
@section('title', 'Unités d\'Enseignement')
@section('actions')
    <a href="/academic/course-units/create"
       class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Nouvelle UE
    </a>
@endsection
@section('content')

    <x-page-header title="Unités d'Enseignement" subtitle="UE organisées par semestre et spécialité." />

    {{-- Stats --}}
    <div class="grid grid-cols-4 gap-4 mb-6">
        <x-stat-card label="Total UE" value="12">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></x-slot>
        </x-stat-card>
        <x-stat-card label="Tronc commun" value="8">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></x-slot>
        </x-stat-card>
        <x-stat-card label="Spécialisées" value="4" color="red">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></x-slot>
        </x-stat-card>
        <x-stat-card label="Total crédits" value="52">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></x-slot>
        </x-stat-card>
    </div>

    {{-- Filtres --}}
    <div class="flex items-center gap-3 mb-4">
        <input type="text"
               placeholder="Rechercher par code ou libellé…"
               class="flex-1 max-w-xs rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
        <select class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
            <option>Toutes les spécialités</option>
            <option>Tronc commun</option>
            <option>Génie Logiciel</option>
            <option>Réseaux & Systèmes</option>
        </select>
    </div>

    {{-- Tableau --}}
    <div class="bg-white border border-gray-200 rounded-md overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50">
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Code</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Libellé</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Type</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Crédits</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Semestre</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Spécialité</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">% Sem.</th>
                    <th class="text-right px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach([
                    ['id'=>1,'code'=>'UE-INF','libelle'=>'Informatique Fondamentale','type'=>'Fondamentale','credits'=>6,'sem'=>'S1','spec'=>null,'pct'=>'20%'],
                    ['id'=>2,'code'=>'UE-ALG','libelle'=>'Algorithmique','type'=>'Fondamentale','credits'=>4,'sem'=>'S1','spec'=>null,'pct'=>'13%'],
                    ['id'=>3,'code'=>'UE-MATH','libelle'=>'Mathématiques Discrètes','type'=>'Fondamentale','credits'=>4,'sem'=>'S1','spec'=>null,'pct'=>'13%'],
                    ['id'=>4,'code'=>'UE-SYS','libelle'=>'Systèmes d\'Exploitation','type'=>'Fondamentale','credits'=>4,'sem'=>'S2','spec'=>null,'pct'=>'13%'],
                    ['id'=>5,'code'=>'UE-WEB','libelle'=>'Développement Web','type'=>'Optionnelle','credits'=>4,'sem'=>'S3','spec'=>'Génie Logiciel','pct'=>'13%'],
                    ['id'=>6,'code'=>'UE-NET','libelle'=>'Administration Réseaux','type'=>'Optionnelle','credits'=>4,'sem'=>'S3','spec'=>'Réseaux & Systèmes','pct'=>'13%'],
                ] as $ue)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $ue['code'] }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $ue['libelle'] }}</td>
                    <td class="px-4 py-3">
                        <x-badge color="{{ $ue['type'] === 'Fondamentale' ? 'gray' : 'amber' }}">{{ $ue['type'] }}</x-badge>
                    </td>
                    <td class="px-4 py-3 text-gray-600">{{ $ue['credits'] }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $ue['sem'] }}</td>
                    <td class="px-4 py-3">
                        @if($ue['spec'])
                            <x-badge color="purple">{{ $ue['spec'] }}</x-badge>
                        @else
                            <span class="text-xs text-gray-400 italic">Tronc commun</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-600">{{ $ue['pct'] }}</td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="/academic/course-units/{{ $ue['id'] }}/edit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">Modifier</a>
                            <form action="/academic/course-units/{{ $ue['id'] }}" method="POST" class="inline">
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
