<?php

namespace App\Http\Requests\Academic;

use App\Enums\DiplomaType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProgramRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:20', Rule::unique('programs', 'code')],
            'libelle' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type_diplome' => ['required', Rule::enum(DiplomaType::class)],
            'nombre_semestres' => ['required', 'integer', 'min:1', 'max:12'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Le code de la filière est obligatoire.',
            'code.unique' => 'Ce code est déjà utilisé.',
            'libelle.required' => 'Le libellé est obligatoire.',
            'type_diplome.required' => 'Le type de diplôme est obligatoire.',
            'nombre_semestres.required' => 'Le nombre de semestres est obligatoire.',
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => 'code',
            'libelle' => 'libellé',
            'description' => 'description',
            'type_diplome' => 'type de diplôme',
            'nombre_semestres' => 'nombre de semestres',
        ];
    }
}
