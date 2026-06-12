@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')

    <x-page-header title="Tableau de bord" subtitle="Vue d'ensemble de la structure académique." />

    {{-- Stats globales --}}
    <div class="grid grid-cols-3 gap-4 mb-8">
        <x-stat-card label="Années académiques" value="3" color="gray">
            <x-slot name="icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </x-slot>
        </x-stat-card>

        <x-stat-card label="Filières actives" value="3" color="gray">
            <x-slot name="icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </x-slot>
        </x-stat-card>

        <x-stat-card label="Unités d'Enseignement" value="52" color="red">
            <x-slot name="icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </x-slot>
        </x-stat-card>
    </div>

    {{-- Année active + Accès rapides --}}
    <div class="grid grid-cols-3 gap-6">

        {{-- Année active --}}
        <div class="bg-white border border-gray-200 rounded-md p-5">
            <p class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-3">Année en cours</p>
            <div class="flex items-center gap-3 mb-4">
                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                <span class="font-bold text-gray-900 text-lg">2025-2026</span>
                <x-badge color="green">Active</x-badge>
            </div>
            <p class="text-xs text-gray-500 mb-1">01 Sept. 2025 → 30 Juin 2026</p>
            <a href="/academic/academic-years"
                class="inline-flex items-center gap-1 mt-3 text-xs text-red-600 hover:underline font-medium">
                Gérer les années
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>

        {{-- Accès rapides --}}
        <div class="col-span-2 bg-white border border-gray-200 rounded-md p-5">
            <p class="text-xs font-semibold uppercase tracking-wide text-gray-400 mb-3">Accès rapides</p>
            <div class="grid grid-cols-2 gap-2">
                @foreach ([['url' => '/academic/programs', 'label' => 'Filières'], ['url' => '/academic/specialties', 'label' => 'Spécialités'], ['url' => '/academic/levels', 'label' => 'Niveaux'], ['url' => '/academic/semesters', 'label' => 'Semestres'], ['url' => '/academic/course-units', 'label' => 'Unités d\'Enseignement'], ['url' => '/academic/academic-years', 'label' => 'Années Académiques']] as $link)
                    <a href="{{ $link['url'] }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-md border border-gray-200 text-sm text-gray-700 hover:border-red-300 hover:text-red-700 transition-colors">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

    </div>

@endsection
