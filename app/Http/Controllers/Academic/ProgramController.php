<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Academic\StoreProgramRequest;
use App\Http\Requests\Academic\UpdateProgramRequest;
use App\Models\Academic\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::withCount('specialties', 'levels')
            ->orderBy('libelle')
            ->paginate(15);

        return view('academic.programs.programs-index', compact('programs'));
    }

    public function create()
    {
        return view('academic.programs.programs-create');
    }

    public function store(StoreProgramRequest $request)
    {
        Program::create($request->validated());

        return to_route('academic.programs.index')
            ->with('success', 'La filière a bien été créée.');
    }

    public function edit(Program $program)
    {
        return view('academic.programs.programs-edit', compact('program'));
    }

    public function update(UpdateProgramRequest $request, Program $program)
    {
        $program->update($request->validated());

        return to_route('academic.programs.index')
            ->with('success', 'La filière a bien été modifiée.');
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return to_route('academic.programs.index')
            ->with('success', 'La filière a été supprimée.');
    }
}
