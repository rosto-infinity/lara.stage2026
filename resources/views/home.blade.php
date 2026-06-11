<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GestAcad — Plateforme de gestion de la structure académique">
    <title>GestAcad — Accueil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    {{-- Header minimal --}}
    <header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <div class="w-7 h-7 bg-red-600 rounded-md flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422A12.083 12.083 0 0121 13c0 3.866-4.03 7-9 7s-9-3.134-9-7a12.083 12.083 0 012.84-7.578L12 14z"/>
                </svg>
            </div>
            <span class="font-bold text-gray-900">GestAcad</span>
        </div>
        <a href="/dashboard"
           class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-colors">
            Accéder au tableau de bord
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
        </a>
    </header>

    {{-- Hero --}}
    <main class="flex-1 flex flex-col items-center justify-center px-8 py-16 text-center">

        <div class="w-14 h-14 bg-red-50 border border-red-100 rounded-md flex items-center justify-center mb-6">
            <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422A12.083 12.083 0 0121 13c0 3.866-4.03 7-9 7s-9-3.134-9-7a12.083 12.083 0 012.84-7.578L12 14z"/>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 mb-3">GestAcad</h1>
        <p class="text-gray-500 text-base max-w-lg mb-10">
            Plateforme de gestion de la structure académique. Configurez vos filières,
            spécialités, niveaux, semestres et unités d'enseignement en quelques étapes.
        </p>

        <a href="/dashboard"
           class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-600 text-white font-medium rounded-md hover:bg-red-700 transition-colors mb-12">
            Accéder au tableau de bord
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
        </a>

        {{-- Modules --}}
        <div class="grid grid-cols-3 gap-4 w-full max-w-3xl text-left">

            <a href="/academic/academic-years"
               class="group bg-white border border-gray-200 rounded-md p-4 hover:border-red-300 transition-colors">
                <p class="font-semibold text-gray-900 text-sm mb-1">Années Académiques</p>
                <p class="text-xs text-gray-500">Gestion et activation des années en cours.</p>
            </a>

            <a href="/academic/programs"
               class="group bg-white border border-gray-200 rounded-md p-4 hover:border-red-300 transition-colors">
                <p class="font-semibold text-gray-900 text-sm mb-1">Filières</p>
                <p class="text-xs text-gray-500">Filières de formation (Licence, Master, BTS…).</p>
            </a>

            <a href="/academic/specialties"
               class="group bg-white border border-gray-200 rounded-md p-4 hover:border-red-300 transition-colors">
                <p class="font-semibold text-gray-900 text-sm mb-1">Spécialités</p>
                <p class="text-xs text-gray-500">Options rattachées à chaque filière.</p>
            </a>

            <a href="/academic/levels"
               class="group bg-white border border-gray-200 rounded-md p-4 hover:border-red-300 transition-colors">
                <p class="font-semibold text-gray-900 text-sm mb-1">Niveaux</p>
                <p class="text-xs text-gray-500">Niveaux d'études par filière (L1, L2, L3…).</p>
            </a>

            <a href="/academic/semesters"
               class="group bg-white border border-gray-200 rounded-md p-4 hover:border-red-300 transition-colors">
                <p class="font-semibold text-gray-900 text-sm mb-1">Semestres</p>
                <p class="text-xs text-gray-500">Découpage de chaque niveau en semestres.</p>
            </a>

            <a href="/academic/course-units"
               class="group bg-white border border-gray-200 rounded-md p-4 hover:border-red-300 transition-colors">
                <p class="font-semibold text-gray-900 text-sm mb-1">Unités d'Enseignement</p>
                <p class="text-xs text-gray-500">UE par semestre, tronc commun ou spécialisées.</p>
            </a>

        </div>
    </main>

    {{-- Footer --}}
    <footer class="border-t border-gray-200 px-8 py-4 text-center text-xs text-gray-400">
        GestAcad — Gestion de la structure académique
    </footer>

</body>
</html>
