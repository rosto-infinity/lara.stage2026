<?php

namespace App\Models\Academic;

use App\Enums\DiplomaType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'libelle',
        'description',
        'type_diplome',
        'nombre_semestres',
    ];

    protected function casts(): array
    {
        return [
            'type_diplome' => DiplomaType::class,
            'nombre_semestres' => 'integer',
        ];
    }

    public function specialties(): HasMany
    {
        return $this->hasMany(Specialty::class);
    }

    public function levels(): HasMany
    {
        return $this->hasMany(Level::class);
    }
}
