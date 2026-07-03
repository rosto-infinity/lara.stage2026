@extends('layouts.app')
@section('title', 'Semestres')
@section('actions')
    <a href="{{ route('academic.semesters.create') }}"
       class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Nouveau semestre
    </a>
@endsection
@section('content')

    <x-page-header title="Semestres" subtitle="Semestres organisés par niveau d'études." />

    <div class="mb-4">
        <form method="GET" action="{{ route('academic.semesters.index') }}">
            <select name="level_id" onchange="this.form.submit()" class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
                <option value="">Tous les niveaux</option>
                @foreach($levels as $l)
                    <option value="{{ $l->id }}" {{ request('level_id') == $l->id ? 'selected' : '' }}>
                        {{ $l->libelle }} — {{ $l->program->libelle }}
                    </option>
                @endforeach
            </select>
        </form>
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
                @forelse($semesters as $semester)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-500">S{{ $semester->numero }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $semester->libelle }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $semester->level->libelle }} — {{ $semester->level->program->libelle }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $semester->credits_requis }} crédits</td>
                    <td class="px-4 py-3 text-gray-600">{{ $semester->course_units_count }}</td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('academic.semesters.edit', $semester) }}" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">Modifier</a>
                            <form action="{{ route('academic.semesters.destroy', $semester) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce semestre ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-400 hover:text-red-600 hover:border-red-300 transition-colors">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-gray-500">Aucun semestre trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $semesters->links() }}
    </div>

@endsection
