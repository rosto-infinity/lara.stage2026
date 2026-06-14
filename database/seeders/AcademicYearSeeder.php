<?php

namespace Database\Seeders;

use App\Models\Academic\AcademicYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Enregistrer d'abord les inactifs pour éviter les déclenchements de désactivation
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

        // L'active en dernier
        AcademicYear::create([
            'libelle' => '2025-2026',
            'date_debut' => '2025-09-01',
            'date_fin' => '2026-06-30',
            'est_active' => true,
        ]);
    }
}
