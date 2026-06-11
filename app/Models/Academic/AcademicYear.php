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

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'est_active' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();

        // Lors de la création d'une année active
        static::creating(function ($academicYear): void {
            if ($academicYear->est_active) {
                static::where('est_active', true)
                    ->update(['est_active' => false]);
            }
        });

        // Lors de la mise à jour (activation) d'une année
        static::updating(function ($academicYear): void {
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
}
