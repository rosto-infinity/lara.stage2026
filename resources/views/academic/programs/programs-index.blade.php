@extends('layouts.app')

@section('title', 'Filières')

@section('actions')
    <a href="/academic/programs/create"
       class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Nouvelle filière
    </a>
@endsection

@section('content')

    <x-page-header title="Filières" subtitle="Liste des filières de formation." />

    <div class="grid grid-cols-3 gap-4 mb-6">
        <x-stat-card label="Total filières" value="3">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg></x-slot>
        </x-stat-card>
        <x-stat-card label="Total spécialités" value="6">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg></x-slot>
        </x-stat-card>
        <x-stat-card label="Total niveaux" value="9">
            <x-slot name="icon"><svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12"/></svg></x-slot>
        </x-stat-card>
    </div>

    <div class="bg-white border border-gray-200 rounded-md overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50">
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Code</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Libellé</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Diplôme</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Semestres</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Spécialités</th>
                    <th class="text-right px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-500">GI</td>
                    <td class="px-4 py-3 font-medium text-gray-900">Génie Informatique</td>
                    <td class="px-4 py-3"><x-badge color="indigo">Licence</x-badge></td>
                    <td class="px-4 py-3 text-gray-600">6</td>
                    <td class="px-4 py-3 text-gray-600">3</td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="/academic/programs/1/edit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">Modifier</a>
                                <button type="submit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-400 hover:text-red-600 hover:border-red-300 transition-colors">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-500">GC</td>
                    <td class="px-4 py-3 font-medium text-gray-900">Génie Civil</td>
                    <td class="px-4 py-3"><x-badge color="indigo">Licence</x-badge></td>
                    <td class="px-4 py-3 text-gray-600">6</td>
                    <td class="px-4 py-3 text-gray-600">2</td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="/academic/programs/2/edit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">Modifier</a>
                                <button type="submit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-400 hover:text-red-600 hover:border-red-300 transition-colors">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-mono text-xs text-gray-500">GE</td>
                    <td class="px-4 py-3 font-medium text-gray-900">Génie Électrique</td>
                    <td class="px-4 py-3"><x-badge color="purple">Master</x-badge></td>
                    <td class="px-4 py-3 text-gray-600">4</td>
                    <td class="px-4 py-3 text-gray-600">1</td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="/academic/programs/3/edit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">Modifier</a>
                                <button type="submit" class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-400 hover:text-red-600 hover:border-red-300 transition-colors">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
