<?php

namespace Database\Seeders;

use App\Models\Academic\CourseUnit;
use App\Models\Academic\Level;
use App\Models\Academic\Program;
use App\Models\Academic\Semester;
use App\Models\Academic\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicStructureSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        if (Program::count() > 0) {
            return;
        }

        $programs = Program::factory(20)->create();

        foreach ($programs as $program) {
            $nbSpecialties = fake()->numberBetween(1, 3);
            $specialties = Specialty::factory($nbSpecialties)
                ->sequence(fn ($sequence) => ['program_id' => $program->id])
                ->create();

            $allSpecialtiesForProgram = $specialties->push(null);

            for ($i = 1; $i <= 3; $i++) {
                $specialty = $i <= 2 ? null : $allSpecialtiesForProgram->random();

                $level = Level::factory()->create([
                    'program_id' => $program->id,
                    'specialty_id' => $specialty,
                    'code' => $program->code . '-L' . $i,
                    'libelle' => 'Niveau ' . $i,
                    'ordre' => $i,
                ]);

                for ($s = 1; $s <= 2; $s++) {
                    $semester = Semester::factory()->create([
                        'level_id' => $level->id,
                        'numero' => $s,
                        'libelle' => 'Semestre ' . (($i - 1) * 2 + $s),
                    ]);

                    CourseUnit::factory(fake()->numberBetween(4, 7))->create([
                        'semester_id' => $semester->id,
                        'specialty_id' => $specialty,
                    ]);
                }
            }
        }
    }
}
