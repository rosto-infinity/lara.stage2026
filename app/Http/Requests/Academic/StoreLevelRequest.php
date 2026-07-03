<?php

namespace App\Http\Requests\Academic;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLevelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'program_id' => ['required', 'exists:programs,id'],
            'specialty_id' => ['nullable', 'exists:specialties,id'],
            'code' => ['required', 'string', 'max:20', Rule::unique('levels', 'code')],
            'libelle' => ['required', 'string', 'max:100'],
            'ordre' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'program_id.required' => 'La filière est obligatoire.',
            'code.required' => 'Le code du niveau est obligatoire.',
            'code.unique' => 'Ce code est déjà utilisé.',
            'libelle.required' => 'Le libellé est obligatoire.',
            'ordre.required' => 'L\'ordre est obligatoire.',
        ];
    }

    public function attributes(): array
    {
        return [
            'program_id' => 'filière',
            'specialty_id' => 'spécialité',
            'code' => 'code',
            'libelle' => 'libellé',
            'ordre' => 'ordre',
        ];
    }
}
