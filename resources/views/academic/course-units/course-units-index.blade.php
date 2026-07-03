@extends('layouts.app')
@section('title', 'Unités d\'Enseignement')
@section('actions')
    <a href="{{ route('academic.course-units.create') }}"
       class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Nouvelle UE
    </a>
@endsection
@section('content')

    <x-page-header title="Unités d'Enseignement" subtitle="UE organisées par semestre et spécialité." />

    <div class="grid grid-cols-4 gap-4 mb-6">
        <x-stat-card label="Total UE" :value="$courseUnits->total()">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></x-slot>
        </x-stat-card>
        <x-stat-card label="Tronc commun" :value="$courseUnits->whereNull('specialty_id')->count()">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></x-slot>
        </x-stat-card>
        <x-stat-card label="Spécialisées" :value="$courseUnits->whereNotNull('specialty_id')->count()" color="red">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></x-slot>
        </x-stat-card>
        <x-stat-card label="Total crédits" :value="$courseUnits->sum('credits')">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></x-slot>
        </x-stat-card>
    </div>

    <form method="GET" action="{{ route('academic.course-units.index') }}" class="flex items-center gap-3 mb-4">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Rechercher par code ou libellé…"
               class="flex-1 max-w-xs rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
        <select name="specialty_id" onchange="this.form.submit()" class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
            <option value="">Toutes les spécialités</option>
            <option value="null" {{ request('specialty_id') === 'null' ? 'selected' : '' }}>Tronc commun</option>
            @foreach($specialties as $s)
                <option value="{{ $s->id }}" {{ request('specialty_id') == $s->id ? 'selected' : '' }}>{{ $s->libelle }}</option>
            @endforeach
        </select>
    </form>

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
                @forelse($courseUnits as $ue)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $ue->code }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $ue->libelle }}</td>
                    <td class="px-4 py-3">
                        <x-badge color="{{ $ue->type_ue === \App\Enums\UeType::Fondamentale ? 'gray' : 'amber' }}">{{ $ue->type_ue->label() }}</x-badge>
                    </td>
                    <td class="px-4 py-3 text-gray-600">{{ $ue->credits }}</td>
                    <td class="px-4 py-3 text-gray-600">S{{ $ue->semester->numero }} — {{ $ue->semester->level->libelle }}</td>
                    <td class="px-4 py-3">
                        @if($ue->specialty)
                            <x-badge color="purple">{{ $ue->specialty->libelle }}</x-badge>
                        @else
                            <span class="text-xs text-gray-400 italic">Tronc commun</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-600">{{ $ue->pourcentage_semestre ? $ue->pourcentage_semestre . '%' : '—' }}</td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('academic.course-units.edit', $ue) }}" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">Modifier</a>
                            <form action="{{ route('academic.course-units.destroy', $ue) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cette UE ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-400 hover:text-red-600 hover:border-red-300 transition-colors">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-4 py-8 text-center text-gray-500">Aucune unité d'enseignement trouvée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $courseUnits->links() }}
    </div>

@endsection
