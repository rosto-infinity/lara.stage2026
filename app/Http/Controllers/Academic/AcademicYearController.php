<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Academic\StoreAcademicYearRequest;
use App\Models\Academic\AcademicYear;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * Display the specified resource.
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        //
    }

    public function toggle(AcademicYear $academicYear): RedirectResponse
    {
        $academicYear->update(['est_active' => !$academicYear->est_active]);

        $status = $academicYear->est_active ? 'activée' : 'désactivée';

        return back()->with('success', "L'année académique {$academicYear->libelle} a été {$status}.");
    }
}
