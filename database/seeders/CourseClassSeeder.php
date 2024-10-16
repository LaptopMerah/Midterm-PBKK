<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\TimeShift;
use App\Models\CourseClass;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $course = Course::where('name', 'Fundamental Programming')->firstOrFail();
        $academicYear = AcademicYear::where('name', '2023/2024')->first();


        // Create class data from the schedule
        $classes = [
            ['class_code' => 'A', 'day' => 'Monday', 'class_participant' => 40, 'lecturers' => [24,47], 'time_shift' => 1],
            ['class_code' => 'B', 'day' => 'Monday', 'class_participant' => 32, 'lecturers' => 8, 'time_shift' => 2],
            ['class_code' => 'C', 'day' => 'Monday', 'class_participant' => 40, 'lecturers' => 8, 'time_shift' => 3],
            ['class_code' => 'D', 'day' => 'Wednesday', 'class_participant' => 40, 'lecturers' => 12, 'time_shift' => 2],
            ['class_code' => 'E', 'day' => 'Friday', 'class_participant' => 40, 'lecturers' => 8, 'time_shift' => 3],
            ['class_code' => 'F', 'day' => 'Wednesday', 'class_participant' => 40, 'lecturers' => 14, 'time_shift' => 3],
            ['class_code' => 'RPL', 'day' => 'Wednesday', 'class_participant' => 50, 'lecturers' => [37,47], 'time_shift' => 2],
            ['class_code' => 'RKA', 'day' => 'Wednesday', 'class_participant' => 46, 'lecturers' => [24,45], 'time_shift' => 3],
        ];

        foreach ($classes as $class_data) {
            $courseClass = new CourseClass();
            $courseClass->class_code = $class_data['class_code'];
            $courseClass->day = $class_data['day'];
            $courseClass->class_participant = $class_data['class_participant'];
            $courseClass->semester = 1;
            $courseClass->course_id = $course->id;
            $courseClass->academic_year_id = $academicYear->id;
            $courseClass->time_shift_id = $class_data['time_shift'];
            $courseClass->save();
            $courseClass->lecturer_user()->attach($class_data['lecturers']);
        }
    }
}
