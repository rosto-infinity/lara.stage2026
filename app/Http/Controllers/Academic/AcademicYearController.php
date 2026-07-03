<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Academic\StoreAcademicYearRequest;
use App\Http\Requests\Academic\UpdateAcademicYearRequest;
use App\Models\Academic\AcademicYear;
use Illuminate\Http\RedirectResponse;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('academic.academic-years.academic-years-index', [
        // 'academicYears' => AcademicYear::latest('date_debut')->paginate(15)

        $academicYears = AcademicYear::orderByDesc('date_debut')->paginate(15);
        return view('academic.academic-years.academic-years-index', compact('academicYears'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academic.academic-years.academic-years-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAcademicYearRequest $request): RedirectResponse
    {
        // Laravel 13 : Les données sont déjà validées et typées ici
        AcademicYear::create($request->validated());

        return to_route('academic.academic-years.index')
            ->with('success', "L'année académique a bien été créée.");
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicYear $academicYear)
    {
        return view('academic.academic-years.academic-years-edit', compact('academicYear'));
    }

    public function update(UpdateAcademicYearRequest $request, AcademicYear $academicYear): RedirectResponse
    {
        $validated = $request->validated();
        $validated['est_active'] = $request->has('est_active');

        $academicYear->update($validated);

        return to_route('academic.academic-years.index')
            ->with('success', "L'année académique a bien été modifiée.");
    }

    public function destroy(AcademicYear $academicYear): RedirectResponse
    {
        $academicYear->delete();

        return to_route('academic.academic-years.index')
            ->with('success', "L'année académique a été supprimée.");
    }

    public function activate(AcademicYear $academicYear): RedirectResponse
    {
        $academicYear->activate();

        return back()->with('success', "L'année académique {$academicYear->libelle} a été activée.");
    }

    public function deactivate(AcademicYear $academicYear): RedirectResponse
    {
        $academicYear->deactivate();

        return back()->with('success', "L'année académique {$academicYear->libelle} a été désactivée.");
    }
}

