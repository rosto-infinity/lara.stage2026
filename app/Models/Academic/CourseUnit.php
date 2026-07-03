<?php

namespace App\Models\Academic;

use App\Enums\UeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'semester_id',
        'specialty_id',
        'code',
        'libelle',
        'type_ue',
        'credits',
        'pourcentage_semestre',
    ];

    protected function casts(): array
    {
        return [
            'type_ue' => UeType::class,
            'pourcentage_semestre' => 'decimal:2',
        ];
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function specialty(): BelongsTo
    {
        return $this->belongsTo(Specialty::class);
    }
}
