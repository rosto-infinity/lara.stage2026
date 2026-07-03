<?php

namespace App\Http\Requests\Academic;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSpecialtyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'program_id' => ['required', 'exists:programs,id'],
            'code' => ['required', 'string', 'max:20', Rule::unique('specialties', 'code')],
            'libelle' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'program_id.required' => 'La filière est obligatoire.',
            'program_id.exists' => 'La filière sélectionnée n\'existe pas.',
            'code.required' => 'Le code de la spécialité est obligatoire.',
            'code.unique' => 'Ce code est déjà utilisé.',
            'libelle.required' => 'Le libellé est obligatoire.',
        ];
    }

    public function attributes(): array
    {
        return [
            'program_id' => 'filière',
            'code' => 'code',
            'libelle' => 'libellé',
            'description' => 'description',
        ];
    }
}
