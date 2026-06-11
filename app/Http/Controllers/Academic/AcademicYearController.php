<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\Academic\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears = AcademicYear::orderByDesc('date_debut')->paginate(15);
        return view('academic.academic-years.academic-years-index', compact('academicYears'));
    }

    public function create()
    {
        return view('academic.academic-years.academic-years-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:50|unique:academic_years,libelle',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'est_active' => 'boolean',
        ]);

        $validated['est_active'] = $request->has('est_active');

        AcademicYear::create($validated);

        return redirect()->route('academic.academic-years.index')
            ->with('success', 'L\'année académique a bien été créée.');
    }

    public function edit($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        return view('academic.academic-years.academic-years-edit', compact('academicYear'));
    }

    public function update(Request $request, $id)
    {
        $academicYear = AcademicYear::findOrFail($id);

        $validated = $request->validate([
            'libelle' => 'required|string|max:50|unique:academic_years,libelle,' . $academicYear->id,
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'est_active' => 'boolean',
        ]);

        $validated['est_active'] = $request->has('est_active');

        $academicYear->update($validated);

        return redirect()->route('academic.academic-years.index')
            ->with('success', 'L\'année académique a bien été modifiée.');
    }

    public function activate($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->activate();
        return redirect()->back()->with('success', "L'année académique {$academicYear->libelle} a été activée.");
    }

    public function deactivate($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->deactivate();
        return redirect()->back()->with('success', "L'année académique {$academicYear->libelle} a été désactivée.");
    }

    public function destroy($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->delete();
        return redirect()->route('academic.academic-years.index')
            ->with('success', 'L\'année académique a été supprimée.');
    }
}
