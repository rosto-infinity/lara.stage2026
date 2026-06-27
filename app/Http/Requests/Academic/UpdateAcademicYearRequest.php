<?php

namespace App\Http\Requests\Academic;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAcademicYearRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'libelle' => [
                'required',
                'string',
                'max:50',
                Rule::unique('academic_years', 'libelle')->ignore($this->route('academic_year')),
            ],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date', 'after:date_debut'],
            'est_active' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'libelle.required' => 'Le libellé de l\'année académique est obligatoire.',
            'libelle.string' => 'Le libellé doit être une chaîne de caractères valide.',
            'libelle.max' => 'Le libellé ne doit pas dépasser :max caractères.',
            'libelle.unique' => 'Cette année académique existe déjà.',

            'date_debut.required' => 'La date de début est obligatoire.',
            'date_debut.date' => 'La date de début n\'est pas une date valide.',

            'date_fin.required' => 'La date de fin est obligatoire.',
            'date_fin.date' => 'La date de fin n\'est pas une date valide.',
            'date_fin.after' => 'La date de fin doit être une date postérieure à la date de début.',

            'est_active.boolean' => 'Le champ d\'activation doit être un booléen valide.',
        ];
    }

    public function attributes(): array
    {
        return [
            'libelle' => 'libellé',
            'date_debut' => 'date de début',
            'date_fin' => 'date de fin',
            'est_active' => 'état actif',
        ];
    }
}
