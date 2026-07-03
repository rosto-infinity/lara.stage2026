<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Academic\StoreSpecialtyRequest;
use App\Http\Requests\Academic\UpdateSpecialtyRequest;
use App\Models\Academic\Program;
use App\Models\Academic\Specialty;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::with('program')
            ->withCount('levels')
            ->orderBy('libelle')
            ->paginate(15);

        $programs = Program::orderBy('libelle')->get(['id', 'libelle']);

        return view('academic.specialties.specialties-index', compact('specialties', 'programs'));
    }

    public function create()
    {
        $programs = Program::orderBy('libelle')->get(['id', 'libelle']);

        return view('academic.specialties.specialties-create', compact('programs'));
    }

    public function store(StoreSpecialtyRequest $request)
    {
        Specialty::create($request->validated());

        return to_route('academic.specialties.index')
            ->with('success', 'La spécialité a bien été créée.');
    }

    public function edit(Specialty $specialty)
    {
        $programs = Program::orderBy('libelle')->get(['id', 'libelle']);

        return view('academic.specialties.specialties-edit', compact('specialty', 'programs'));
    }

    public function update(UpdateSpecialtyRequest $request, Specialty $specialty)
    {
        $specialty->update($request->validated());

        return to_route('academic.specialties.index')
            ->with('success', 'La spécialité a bien été modifiée.');
    }

    public function destroy(Specialty $specialty)
    {
        $specialty->delete();

        return to_route('academic.specialties.index')
            ->with('success', 'La spécialité a été supprimée.');
    }
}
