<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Academic\StoreSemesterRequest;
use App\Http\Requests\Academic\UpdateSemesterRequest;
use App\Models\Academic\Level;
use App\Models\Academic\Semester;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::with('level.program')
            ->withCount('courseUnits')
            ->orderBy('level_id')
            ->orderBy('numero')
            ->paginate(15);

        $levels = Level::with('program')
            ->orderBy('program_id')
            ->orderBy('ordre')
            ->get(['id', 'libelle', 'program_id']);

        return view('academic.semesters.semesters-index', compact('semesters', 'levels'));
    }

    public function create()
    {
        $levels = Level::with('program')
            ->orderBy('program_id')
            ->orderBy('ordre')
            ->get(['id', 'libelle', 'program_id']);

        return view('academic.semesters.semesters-create', compact('levels'));
    }

    public function store(StoreSemesterRequest $request)
    {
        Semester::create($request->validated());

        return to_route('academic.semesters.index')
            ->with('success', 'Le semestre a bien été créé.');
    }

    public function edit(Semester $semester)
    {
        $levels = Level::with('program')
            ->orderBy('program_id')
            ->orderBy('ordre')
            ->get(['id', 'libelle', 'program_id']);

        return view('academic.semesters.semesters-edit', compact('semester', 'levels'));
    }

    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        $semester->update($request->validated());

        return to_route('academic.semesters.index')
            ->with('success', 'Le semestre a bien été modifié.');
    }

    public function destroy(Semester $semester)
    {
        $semester->delete();

        return to_route('academic.semesters.index')
            ->with('success', 'Le semestre a été supprimé.');
    }
}
