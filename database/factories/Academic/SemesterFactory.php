<?php

namespace Database\Factories\Academic;

use App\Models\Academic\Level;
use App\Models\Academic\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemesterFactory extends Factory
{
    protected $model = Semester::class;

    public function definition(): array
    {
        return [
            'level_id' => Level::factory(),
            'numero' => fake()->randomDigitNotNull(),
            'libelle' => 'Semestre ' . fake()->numberBetween(1, 6),
            'credits_requis' => 30,
        ];
    }

    public function forLevel(Level $level, int $numero): static
    {
        return $this->state(function (array $attributes) use ($level, $numero) {
            return [
                'level_id' => $level->id,
                'numero' => $numero,
                'libelle' => 'Semestre ' . $numero,
                'credits_requis' => 30,
            ];
        });
    }
}
