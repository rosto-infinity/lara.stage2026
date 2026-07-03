<?php

namespace App\Models\Academic;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $fillable = [
        'libelle',
        'date_debut',
        'date_fin',
        'est_active',
    ];

    protected function casts(): array
    {
        return [
            'date_debut' => 'date',
            'date_fin' => 'date',
            'est_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (AcademicYear $academicYear): void {
            if ($academicYear->est_active) {
                static::where('est_active', true)
                    ->update(['est_active' => false]);
            }
        });

        static::updating(function (AcademicYear $academicYear): void {
            if ($academicYear->est_active && $academicYear->isDirty('est_active')) {
                static::where('id', '!=', $academicYear->id)
                    ->where('est_active', true)
                    ->update(['est_active' => false]);
            }
        });
    }

    public function activate(): bool
    {
        return $this->update(['est_active' => true]);
    }

    public function deactivate(): bool
    {
        return $this->update(['est_active' => false]);
    }

    public function getFormattedPeriod(): string
    {
        return $this->date_debut->format('d/m/Y') . ' — ' . $this->date_fin->format('d/m/Y');
    }
}
