<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Academic\StoreCourseUnitRequest;
use App\Http\Requests\Academic\UpdateCourseUnitRequest;
use App\Models\Academic\CourseUnit;
use App\Models\Academic\Semester;
use App\Models\Academic\Specialty;

class CourseUnitController extends Controller
{
    private function getFormData(): array
    {
        return [
            'semesters' => Semester::with('level.program')
                ->orderBy('level_id')
                ->orderBy('numero')
                ->get(['id', 'libelle', 'numero', 'level_id']),
            'specialties' => Specialty::with('program')
                ->orderBy('libelle')
                ->get(['id', 'libelle', 'program_id']),
        ];
    }

    public function index()
    {
        $search = request('search');
        $specialtyId = request('specialty_id');

        $courseUnits = CourseUnit::with([
                'semester.level.program',
                'specialty',
            ])
            ->when($search, function ($query, $search) {
                $query->where('libelle', 'like', "%{$search}%")
                      ->orWhere('code', 'like', "%{$search}%");
            })
            ->when($specialtyId, function ($query, $specialtyId) {
                if ($specialtyId === 'null') {
                    $query->whereNull('specialty_id');
                } else {
                    $query->where('specialty_id', $specialtyId);
                }
            })
            ->orderBy('semester_id')
            ->orderBy('code')
            ->paginate(10);

        $specialties = Specialty::orderBy('libelle')->get(['id', 'libelle']);

        return view('academic.course-units.course-units-index', compact('courseUnits', 'specialties'));
    }

    public function create()
    {
        return view('academic.course-units.course-units-create', $this->getFormData());
    }

    public function store(StoreCourseUnitRequest $request)
    {
        CourseUnit::create($request->validated());

        return to_route('academic.course-units.index')
            ->with('success', "L'Unité d'Enseignement a bien été créée.");
    }

    public function edit(CourseUnit $courseUnit)
    {
        return view('academic.course-units.course-units-edit', array_merge(
            ['courseUnit' => $courseUnit],
            $this->getFormData()
        ));
    }

    public function update(UpdateCourseUnitRequest $request, CourseUnit $courseUnit)
    {
        $courseUnit->update($request->validated());

        return to_route('academic.course-units.index')
            ->with('success', "L'Unité d'Enseignement a bien été modifiée.");
    }

    public function destroy(CourseUnit $courseUnit)
    {
        $courseUnit->delete();

        return to_route('academic.course-units.index')
            ->with('success', "L'Unité d'Enseignement a été supprimée.");
    }
}
