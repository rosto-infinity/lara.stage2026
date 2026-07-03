@extends('layouts.app')
@section('title', 'Niveaux')
@section('actions')
    <a href="{{ route('academic.levels.create') }}"
       class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
        Nouveau niveau
    </a>
@endsection
@section('content')

    <x-page-header title="Niveaux" subtitle="Niveaux d'études par filière et spécialité." />

    <div class="flex gap-3 mb-4">
        <form method="GET" action="{{ route('academic.levels.index') }}" class="flex gap-3">
            <select name="program_id" onchange="this.form.submit()" class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
                <option value="">Toutes les filières</option>
                @foreach($programs as $p)
                    <option value="{{ $p->id }}" {{ request('program_id') == $p->id ? 'selected' : '' }}>{{ $p->libelle }}</option>
                @endforeach
            </select>
            <select name="specialty_id" onchange="this.form.submit()" class="rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
                <option value="">Toutes les spécialités</option>
                @foreach($specialties as $s)
                    <option value="{{ $s->id }}" {{ request('specialty_id') == $s->id ? 'selected' : '' }}>{{ $s->libelle }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="bg-white border border-gray-200 rounded-md overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50">
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Code</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Libellé</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Filière</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Spécialité</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Ordre</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Semestres</th>
                    <th class="text-right px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($levels as $level)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $level->code }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $level->libelle }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $level->program->libelle }}</td>
                    <td class="px-4 py-3">
                        @if($level->specialty)
                            <x-badge color="purple">{{ $level->specialty->libelle }}</x-badge>
                        @else
                            <span class="text-xs text-gray-400 italic">Tronc commun</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-600">{{ $level->ordre }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $level->semesters_count }}</td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('academic.levels.edit', $level) }}" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">Modifier</a>
                            <form action="{{ route('academic.levels.destroy', $level) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce niveau ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-400 hover:text-red-600 hover:border-red-300 transition-colors">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-8 text-center text-gray-500">Aucun niveau trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $levels->links() }}
    </div>

@endsection
