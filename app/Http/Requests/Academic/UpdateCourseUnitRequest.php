<?php

namespace App\Http\Requests\Academic;

use App\Enums\UeType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseUnitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'semester_id' => ['required', 'exists:semesters,id'],
            'specialty_id' => ['nullable', 'exists:specialties,id'],
            'code' => ['required', 'string', 'max:20', Rule::unique('course_units', 'code')->ignore($this->route('course_unit'))],
            'libelle' => ['required', 'string', 'max:255'],
            'type_ue' => ['required', Rule::enum(UeType::class)],
            'credits' => ['required', 'integer', 'min:1', 'max:30'],
            'pourcentage_semestre' => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'semester_id.required' => 'Le semestre est obligatoire.',
            'code.required' => 'Le code UE est obligatoire.',
            'code.unique' => 'Ce code UE est déjà utilisé.',
            'libelle.required' => 'Le libellé est obligatoire.',
            'type_ue.required' => 'Le type d\'UE est obligatoire.',
            'credits.required' => 'Les crédits sont obligatoires.',
        ];
    }

    public function attributes(): array
    {
        return [
            'semester_id' => 'semestre',
            'specialty_id' => 'spécialité',
            'code' => 'code UE',
            'libelle' => 'libellé',
            'type_ue' => 'type d\'UE',
            'credits' => 'crédits',
            'pourcentage_semestre' => 'pourcentage semestre',
        ];
    }
}
