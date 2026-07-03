<?php

namespace App\Http\Requests\Academic;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSemesterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'level_id' => ['required', 'exists:levels,id'],
            'numero' => ['required', 'integer', 'min:1', 'max:2'],
            'libelle' => ['required', 'string', 'max:100'],
            'credits_requis' => ['required', 'integer', 'min:1', 'max:60'],
        ];
    }

    public function messages(): array
    {
        return [
            'level_id.required' => 'Le niveau est obligatoire.',
            'level_id.exists' => 'Le niveau sélectionné n\'existe pas.',
            'numero.required' => 'Le numéro de semestre est obligatoire.',
            'libelle.required' => 'Le libellé est obligatoire.',
            'credits_requis.required' => 'Les crédits requis sont obligatoires.',
        ];
    }

    public function attributes(): array
    {
        return [
            'level_id' => 'niveau',
            'numero' => 'numéro',
            'libelle' => 'libellé',
            'credits_requis' => 'crédits requis',
        ];
    }
}
