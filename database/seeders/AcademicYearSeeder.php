<?php

namespace Database\Seeders;

use App\Models\Academic\AcademicYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        if (AcademicYear::count() > 0) {
            return;
        }

        AcademicYear::create([
            'libelle' => '2023-2024',
            'date_debut' => '2023-09-01',
            'date_fin' => '2024-06-30',
            'est_active' => false,
        ]);

        AcademicYear::create([
            'libelle' => '2024-2025',
            'date_debut' => '2024-09-01',
            'date_fin' => '2025-06-30',
            'est_active' => false,
        ]);

        AcademicYear::create([
            'libelle' => '2025-2026',
            'date_debut' => '2025-09-01',
            'date_fin' => '2026-06-30',
            'est_active' => true,
        ]);
    }
}
