<?php

use App\Http\Controllers\Academic\AcademicYearController;
use Illuminate\Support\Facades\Route;

// ─────────────────────────────────────────
// Accueil & Dashboard
// ─────────────────────────────────────────
Route::get('/', fn() => view('home'))->name('home');
Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

// ─────────────────────────────────────────
// Structure académique — vues directes (sans contrôleurs)
// ─────────────────────────────────────────
Route::prefix('academic')->name('academic.')->group(function () {

   
  // Années académiques (Avec contrôleur)
    Route::resource('academic-years', AcademicYearController::class)->except(['show']);

    Route::patch('academic-years/{academicYear}/toggle', [AcademicYearController::class, 'toggle'])
        ->name('academic-years.toggle');

    // Filières
    Route::get('programs',        fn() => view('academic.programs.programs-index'))->name('programs.index');
    Route::get('programs/create', fn() => view('academic.programs.programs-create'))->name('programs.create');
    Route::get('programs/{id}/edit', fn($id) => view('academic.programs.programs-edit'))->name('programs.edit');

    // Spécialités
    Route::get('specialties',        fn() => view('academic.specialties.specialties-index'))->name('specialties.index');
    Route::get('specialties/create', fn() => view('academic.specialties.specialties-create'))->name('specialties.create');
    Route::get('specialties/{id}/edit', fn($id) => view('academic.specialties.specialties-edit'))->name('specialties.edit');

    // Niveaux
    Route::get('levels',        fn() => view('academic.levels.levels-index'))->name('levels.index');
    Route::get('levels/create', fn() => view('academic.levels.levels-create'))->name('levels.create');
    Route::get('levels/{id}/edit', fn($id) => view('academic.levels.levels-edit'))->name('levels.edit');

    // Semestres
    Route::get('semesters',        fn() => view('academic.semesters.semesters-index'))->name('semesters.index');
    Route::get('semesters/create', fn() => view('academic.semesters.semesters-create'))->name('semesters.create');
    Route::get('semesters/{id}/edit', fn($id) => view('academic.semesters.semesters-edit'))->name('semesters.edit');

    // Unités d'Enseignement
    Route::get('course-units',        fn() => view('academic.course-units.course-units-index'))->name('course-units.index');
    Route::get('course-units/create', fn() => view('academic.course-units.course-units-create'))->name('course-units.create');
    Route::get('course-units/{id}/edit', fn($id) => view('academic.course-units.course-units-edit'))->name('course-units.edit');

});
