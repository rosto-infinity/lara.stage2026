<?php

namespace Database\Factories\Academic;

use App\Enums\UeType;
use App\Models\Academic\CourseUnit;
use App\Models\Academic\Semester;
use App\Models\Academic\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseUnitFactory extends Factory
{
    protected $model = CourseUnit::class;

    public function definition(): array
    {
        return [
            'semester_id' => Semester::factory(),
            'specialty_id' => fake()->optional(0.2)->passthrough(Specialty::factory()),
            'code' => strtoupper(fake()->unique()->bothify('UE-???')),
            'libelle' => fake()->sentence(3),
            'type_ue' => fake()->randomElement(UeType::values()),
            'credits' => fake()->randomElement([2, 3, 4, 5, 6]),
            'pourcentage_semestre' => fake()->optional(0.7)->randomFloat(2, 5, 30),
        ];
    }
}
