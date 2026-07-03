<?php

use App\Http\Controllers\Academic\AcademicYearController;
use App\Http\Controllers\Academic\CourseUnitController;
use App\Http\Controllers\Academic\LevelController;
use App\Http\Controllers\Academic\ProgramController;
use App\Http\Controllers\Academic\SemesterController;
use App\Http\Controllers\Academic\SpecialtyController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

Route::prefix('academic')->name('academic.')->group(function () {

    Route::resource('academic-years', AcademicYearController::class)->except(['show']);

    Route::post('academic-years/{academicYear}/activate', [AcademicYearController::class, 'activate'])
        ->name('academic-years.activate');
    Route::post('academic-years/{academicYear}/deactivate', [AcademicYearController::class, 'deactivate'])
        ->name('academic-years.deactivate');

    Route::resource('programs', ProgramController::class)->except(['show']);
    Route::resource('specialties', SpecialtyController::class)->except(['show']);
    Route::resource('levels', LevelController::class)->except(['show']);
    Route::resource('semesters', SemesterController::class)->except(['show']);
    Route::resource('course-units', CourseUnitController::class)->except(['show']);

});
