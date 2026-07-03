<?php

namespace Database\Factories\Academic;

use App\Models\Academic\Program;
use App\Models\Academic\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialtyFactory extends Factory
{
    protected $model = Specialty::class;

    public function definition(): array
    {
        return [
            'program_id' => Program::factory(),
            'code' => strtoupper(fake()->unique()->bothify('??##')),
            'libelle' => fake()->sentence(2),
            'description' => fake()->optional()->paragraph(),
        ];
    }
}
