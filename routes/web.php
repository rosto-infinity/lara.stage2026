<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Academic\AcademicYearController;

// Accueil & Dashboard
Route::get('/', fn() => view('home'))->name('home');
Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

// Structure académique
Route::prefix('academic')->name('academic.')->group(function () {

    // Années académiques (Avec contrôleur)
    Route::resource('academic-years', AcademicYearController::class)->except(['show']);
    Route::post('academic-years/{id}/activate',   [AcademicYearController::class, 'activate'])
        ->name('academic-years.activate');
    Route::post('academic-years/{id}/deactivate', [AcademicYearController::class, 'deactivate'])
        ->name('academic-years.deactivate');

    // Filières (Statique)
    Route::get('programs',        fn() => view('academic.programs.programs-index'))->name('programs.index');
    Route::get('programs/create', fn() => view('academic.programs.programs-create'))->name('programs.create');
    Route::get('programs/{id}/edit', fn($id) => view('academic.programs.programs-edit'))->name('programs.edit');

    // Spécialités (Statique)
    Route::get('specialties',        fn() => view('academic.specialties.specialties-index'))->name('specialties.index');
    Route::get('specialties/create', fn() => view('academic.specialties.specialties-create'))->name('specialties.create');
    Route::get('specialties/{id}/edit', fn($id) => view('academic.specialties.specialties-edit'))->name('specialties.edit');

    // Niveaux (Statique)
    Route::get('levels',        fn() => view('academic.levels.levels-index'))->name('levels.index');
    Route::get('levels/create', fn() => view('academic.levels.levels-create'))->name('levels.create');
    Route::get('levels/{id}/edit', fn($id) => view('academic.levels.levels-edit'))->name('levels.edit');

    // Semestres (Statique)
    Route::get('semesters',        fn() => view('academic.semesters.semesters-index'))->name('semesters.index');
    Route::get('semesters/create', fn() => view('academic.semesters.semesters-create'))->name('semesters.create');
    Route::get('semesters/{id}/edit', fn($id) => view('academic.semesters.semesters-edit'))->name('semesters.edit');

    // Unités d'Enseignement (Statique)
    Route::get('course-units',        fn() => view('academic.course-units.course-units-index'))->name('course-units.index');
    Route::get('course-units/create', fn() => view('academic.course-units.course-units-create'))->name('course-units.create');
    Route::get('course-units/{id}/edit', fn($id) => view('academic.course-units.course-units-edit'))->name('course-units.edit');

});
