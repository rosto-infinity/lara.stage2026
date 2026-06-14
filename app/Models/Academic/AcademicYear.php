<?php

namespace App\Models\Academic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

class AcademicYear extends Model
{
    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'libelle',
        'date_debut',
        'date_fin',
        'est_active',
    ];

    /**
     * Obtenir les transtypages (casts) des attributs.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_debut' => 'date',
            'date_fin' => 'date',
            'est_active' => 'boolean',
        ];
    }

    /**
     * Le hook "booted" remplace l'ancien "boot".
     */
    protected static function booted(): void
    {
        // Désactivation des autres années lors de la création d'une année active
        static::creating(function (AcademicYear $academicYear): void {
            if ($academicYear->est_active) {
                static::where('est_active', true)
                    ->update(['est_active' => false]);
            }
        });

        // Désactivation des autres années lors du passage à l'état actif
        static::updating(function (AcademicYear $academicYear): void {
            if ($academicYear->est_active && $academicYear->isDirty('est_active')) {
                static::where('id', '!=', $academicYear->id)
                    ->where('est_active', true)
                    ->update(['est_active' => false]);
            }
        });
    }

    /**
     * Activer l'année académique.
     */
    public function activate(): bool
    {
        return $this->update(['est_active' => true]);
    }

    /**
     * Désactiver l'année académique.
     */
    public function deactivate(): bool
    {
        return $this->update(['est_active' => false]);
    }
}
