<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academic_year_data = [[
            'name' => '2022/2023',
        ], [
            'name' => '2023/2024',
        ], [
            'name' => '2024/2025',
        ]];

        foreach ($academic_year_data as $academic_year) {
            AcademicYear::create($academic_year);
        }
    }
}
