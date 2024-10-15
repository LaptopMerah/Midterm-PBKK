<?php

namespace Database\Seeders;

use App\Models\TimeShift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time_shift_data = [[
            'start_time' => '07.00',
            'end_time' => '08.50'
        ], [
            'start_time' => '10.00',
            'end_time' => '11.50'
        ], [
            'start_time' => '13.30',
            'end_time' => '15.20'
        ], [
            'start_time' => '15.30',
            'end_time' => '17.20'
        ], [
            'start_time' => '09.00',
            'end_time' => '10.50'
        ]];

        foreach ($time_shift_data as $time_shift) {
            TimeShift::create($time_shift);
        }
    }
}
