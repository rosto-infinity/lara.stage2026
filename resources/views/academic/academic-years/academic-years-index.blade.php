@extends('layouts.app')

@section('title', 'Années Académiques')

@section('actions')
    <a href="/academic/academic-years/create"
       class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
        </svg>
        Nouvelle année
    </a>
@endsection

@section('content')

    <x-page-header
        title="Années Académiques"
        subtitle="Gestion et activation des années académiques." />

    {{-- Stats --}}
    <div class="grid grid-cols-3 gap-4 mb-6">
        <x-stat-card label="Total années" value="3" color="gray">
            <x-slot name="icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </x-slot>
        </x-stat-card>
        <x-stat-card label="Année active" value="1" color="green">
            <x-slot name="icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </x-slot>
        </x-stat-card>
        <x-stat-card label="Années inactives" value="2" color="gray">
            <x-slot name="icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </x-slot>
        </x-stat-card>
    </div>

    {{-- Tableau --}}
    <div class="bg-white border border-gray-200 rounded-md overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50">
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Libellé</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Date début</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Date fin</th>
                    <th class="text-left px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Statut</th>
                    <th class="text-right px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">

                {{-- Année active --}}
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-medium text-gray-900">2025-2026</td>
                    <td class="px-4 py-3 text-gray-600">01/09/2025</td>
                    <td class="px-4 py-3 text-gray-600">30/06/2026</td>
                    <td class="px-4 py-3">
                        <x-badge color="green">Active</x-badge>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <form action="/academic/academic-years/1/deactivate" method="POST" class="inline">
                                <button type="submit"
                                    class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">
                                    Désactiver
                                </button>
                            </form>
                            <a href="/academic/academic-years/1/edit"
                               class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">
                                Modifier
                            </a>
                        </div>
                    </td>
                </tr>

                {{-- Année inactive 1 --}}
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-medium text-gray-900">2024-2025</td>
                    <td class="px-4 py-3 text-gray-600">01/09/2024</td>
                    <td class="px-4 py-3 text-gray-600">30/06/2025</td>
                    <td class="px-4 py-3">
                        <x-badge color="gray">Inactive</x-badge>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <form action="/academic/academic-years/2/activate" method="POST" class="inline">
                                <button type="submit"
                                    class="px-2.5 py-1.5 text-xs font-medium border border-red-300 rounded-md text-red-700 hover:bg-red-50 transition-colors">
                                    Activer
                                </button>
                            </form>
                            <a href="/academic/academic-years/2/edit"
                               class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">
                                Modifier
                            </a>
                            <form action="/academic/academic-years/2" method="POST" class="inline">
                                <button type="submit"
                                    class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-400 hover:text-red-600 hover:border-red-300 transition-colors">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                {{-- Année inactive 2 --}}
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-medium text-gray-900">2023-2024</td>
                    <td class="px-4 py-3 text-gray-600">01/09/2023</td>
                    <td class="px-4 py-3 text-gray-600">30/06/2024</td>
                    <td class="px-4 py-3">
                        <x-badge color="gray">Inactive</x-badge>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <form action="/academic/academic-years/3/activate" method="POST" class="inline">
                                <button type="submit"
                                    class="px-2.5 py-1.5 text-xs font-medium border border-red-300 rounded-md text-red-700 hover:bg-red-50 transition-colors">
                                    Activer
                                </button>
                            </form>
                            <a href="/academic/academic-years/3/edit"
                               class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition-colors">
                                Modifier
                            </a>
                            <form action="/academic/academic-years/3" method="POST" class="inline">
                                <button type="submit"
                                    class="px-2.5 py-1.5 text-xs font-medium border border-gray-300 rounded-md text-gray-400 hover:text-red-600 hover:border-red-300 transition-colors">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

@endsection
