<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Academic\StoreLevelRequest;
use App\Http\Requests\Academic\UpdateLevelRequest;
use App\Models\Academic\Level;
use App\Models\Academic\Program;
use App\Models\Academic\Specialty;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::with('program', 'specialty')
            ->withCount('semesters')
            ->orderBy('program_id')
            ->orderBy('ordre')
            ->paginate(15);

        $programs = Program::orderBy('libelle')->get(['id', 'libelle']);
        $specialties = Specialty::orderBy('libelle')->get(['id', 'libelle']);

        return view('academic.levels.levels-index', compact('levels', 'programs', 'specialties'));
    }

    public function create()
    {
        $programs = Program::orderBy('libelle')->get(['id', 'libelle']);
        $specialties = Specialty::orderBy('libelle')->get(['id', 'libelle']);

        return view('academic.levels.levels-create', compact('programs', 'specialties'));
    }

    public function store(StoreLevelRequest $request)
    {
        Level::create($request->validated());

        return to_route('academic.levels.index')
            ->with('success', 'Le niveau a bien été créé.');
    }

    public function edit(Level $level)
    {
        $programs = Program::orderBy('libelle')->get(['id', 'libelle']);
        $specialties = Specialty::orderBy('libelle')->get(['id', 'libelle']);

        return view('academic.levels.levels-edit', compact('level', 'programs', 'specialties'));
    }

    public function update(UpdateLevelRequest $request, Level $level)
    {
        $level->update($request->validated());

        return to_route('academic.levels.index')
            ->with('success', 'Le niveau a bien été modifié.');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        return to_route('academic.levels.index')
            ->with('success', 'Le niveau a été supprimé.');
    }
}
