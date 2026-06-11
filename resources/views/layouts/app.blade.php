<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GestAcad — Gestion de la structure académique">
    <title>@yield('title', 'GestAcad') — GestAcad</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 antialiased">

    <div class="flex h-screen overflow-hidden">

        {{-- ═══════════════════════════════════════
             SIDEBAR
        ═══════════════════════════════════════ --}}
        <aside class="w-64 shrink-0 bg-white border-r border-gray-200 flex flex-col overflow-y-auto">

            {{-- Logo --}}
            <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-200">
                <div class="w-7 h-7 bg-red-600 rounded-md flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422A12.083 12.083 0 0121 13c0 3.866-4.03 7-9 7s-9-3.134-9-7a12.083 12.083 0 012.84-7.578L12 14z"/>
                    </svg>
                </div>
                <span class="font-bold text-gray-900 tracking-tight">GestAcad</span>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-3 py-3 space-y-0.5">

                <x-nav-link href="/dashboard" :active="request()->is('dashboard')">
                    <x-slot name="icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </x-slot>
                    Tableau de bord
                </x-nav-link>

                <p class="px-3 pt-4 pb-1 text-xs font-semibold uppercase tracking-widest text-gray-400">Académique</p>

                <x-nav-link href="/academic/academic-years" :active="request()->is('academic/academic-years*')">
                    <x-slot name="icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </x-slot>
                    Années Académiques
                </x-nav-link>

                <x-nav-link href="/academic/programs" :active="request()->is('academic/programs*')">
                    <x-slot name="icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </x-slot>
                    Filières
                </x-nav-link>

                <x-nav-link href="/academic/specialties" :active="request()->is('academic/specialties*')">
                    <x-slot name="icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </x-slot>
                    Spécialités
                </x-nav-link>

                <x-nav-link href="/academic/levels" :active="request()->is('academic/levels*')">
                    <x-slot name="icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                        </svg>
                    </x-slot>
                    Niveaux
                </x-nav-link>

                <x-nav-link href="/academic/semesters" :active="request()->is('academic/semesters*')">
                    <x-slot name="icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                    </x-slot>
                    Semestres
                </x-nav-link>

                <x-nav-link href="/academic/course-units" :active="request()->is('academic/course-units*')">
                    <x-slot name="icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </x-slot>
                    Unités d'Enseignement
                </x-nav-link>

            </nav>

            {{-- Utilisateur --}}
            <div class="border-t border-gray-200 px-4 py-3">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-md bg-gray-900 flex items-center justify-center text-xs font-bold text-white">AS</div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">Admin Système</p>
                        <p class="text-xs text-gray-400 truncate">admin@gestacad.cm</p>
                    </div>
                </div>
            </div>
        </aside>

        {{-- ═══════════════════════════════════════
             CONTENU PRINCIPAL
        ═══════════════════════════════════════ --}}
        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- Topbar --}}
            <header class="bg-white border-b border-gray-200 px-6 py-3 flex items-center justify-between shrink-0">
                <x-breadcrumb :items="$breadcrumbs ?? []" />
                <div class="flex items-center gap-2">
                    @yield('actions')
                </div>
            </header>

            {{-- Flash messages --}}
            @if(session('success'))
                <x-alert type="success">{{ session('success') }}</x-alert>
            @endif
            @if(session('error'))
                <x-alert type="error">{{ session('error') }}</x-alert>
            @endif

            {{-- Contenu --}}
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>

        </div>
    </div>

</body>
</html>
