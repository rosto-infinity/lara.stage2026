<?php

namespace Database\Factories\Academic;

use App\Enums\DiplomaType;
use App\Models\Academic\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition(): array
    {
        $diplomes = DiplomaType::values();

        return [
            'code' => strtoupper(fake()->unique()->bothify('??###')),
            'libelle' => fake()->sentence(3),
            'description' => fake()->optional()->paragraph(),
            'type_diplome' => fake()->randomElement($diplomes),
            'nombre_semestres' => fake()->randomElement([4, 6, 10]),
        ];
    }
}
