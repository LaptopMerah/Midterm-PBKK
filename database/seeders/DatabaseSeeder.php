<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseClass;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        DB::beginTransaction();
        try {

            $lecturers = User::factory()->allLecturers();
            foreach ($lecturers as $lecturer) {
                User::create($lecturer);
            }
            $this->call([
                TimeShiftSeeder::class,
                AcademicYearSeeder::class,
                CourseSeeder::class,
                CourseClassSeeder::class,

            ]);
            User::create([
                'name' => 'UsersAja',
                'email' => 'g@mail.com',
                'identifier_number' => '1234567890',
                'phone_number' => '081234567890',
                'password' => bcrypt('password'),
                'user_type' => 'student',
            ]);
            User::create([
                'name' => 'Operator Ganteng',
                'email' => 'og@mail.com',
                'identifier_number' => '1234567891',
                'phone_number' => '081234567892',
                'password' => bcrypt('password'),
                'user_type' => 'operator',
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
            // error_log($exception->getMessage());
        }
        DB::commit();
    }
}
