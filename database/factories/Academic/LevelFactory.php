<?php

namespace Database\Factories\Academic;

use App\Models\Academic\Level;
use App\Models\Academic\Program;
use App\Models\Academic\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelFactory extends Factory
{
    protected $model = Level::class;

    public function definition(): array
    {
        return [
            'program_id' => Program::factory(),
            'specialty_id' => fake()->optional(0.3)->passthrough(Specialty::factory()),
            'code' => strtoupper(fake()->unique()->bothify('???-L#')),
            'libelle' => 'Niveau ' . fake()->numberBetween(1, 5),
            'ordre' => fake()->numberBetween(1, 5),
        ];
    }

    public function forProgram(Program $program, ?Specialty $specialty = null): static
    {
        return $this->state(function (array $attributes) use ($program, $specialty) {
            return [
                'program_id' => $program->id,
                'specialty_id' => $specialty?->id,
            ];
        });
    }
}
