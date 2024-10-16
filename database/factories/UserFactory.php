<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'identifier_number' => $this->faker->unique()->numerify('ID######'),
            'user_type' => $this->faker->randomElement(['student', 'lecturer', 'operator']),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * State for generating users for all predefined lecturers.
     */
    public function allLecturers(): array
    {
        $names = [
            "Prof. Ir. Supeno Djanali, M.Sc., Ph.D.",
            "Prof. Ir. Handayani Tjandrasa, M.Sc., Ph.D.",
            "Prof. Drs.Ec. Ir. Riyanarto Sarno, M.Sc., Ph.D.",
            "Prof. Dr. Ir. Joko Lianto Buliali, M.Sc.",
            "Ir. Siti Rochimah, M.T., Ph.D.",
            "Victor Hariadi, S.Si., M.Kom.",
            "Rully Soelaiman, S.Kom., M.Kom.",
            "Dr. Yudhi Purwananto, S.Kom., M.Kom.",
            "Prof. Dr.Eng. Nanik Suciati, S.Kom., M.Kom.",
            "Dr. Ahmad Saikhu, S.Si., M.T.",
            "Dr. Wahyu Suadi, S.Kom., M.Kom.",
            "Dr. Dwi Sunaryono, S.Kom., M.Kom.",
            "Prof. Dr. Agus Zainal Arifin, S.Kom., M.Kom.",
            "Ir. Misbakhul Munir Irfan Subakti, S.Kom, M.Sc., M.Phil",
            "Fajar Baskoro, S.Kom., M.T.",
            "Prof. Daniel Oranova Siahaan, S.Kom., M.Sc., PD.Eng.",
            "Prof. Tohari Ahmad, S.Kom., MIT., Ph.D.",
            "Dr. Bilqis Amaliah, S.Kom., M.Kom.",
            "Prof. Dr.Eng. Chastine Fatichah, S.Kom., M.Kom.",
            "Sarwosri, S.Kom., M.T.",
            "Imam Kuswardayan, S.Kom., M.T.",
            "Royyana Muslim Ijtihadie, S.Kom., M.Kom., Ph.D.",
            "Dr.Eng. Darlis Herumurti, S.Kom., M.Kom.",
            "Prof. Dr. Ir. Diana Purwitasari, S.Kom., M.Sc.",
            "Dr. Ir. Umi Laili Yuhana, S.Kom., M.Sc.",
            "Ir. Ary Mazharuddin Shiddiqi, S.Kom., M.Comp.Sc., Ph.D.",
            "Dr. Anny Yuniarti, S.Kom, M.Comp.Sc.",
            "Ir. Arya Yudhi Wijaya, S.Kom., M.Kom.",
            "Dr.Eng. Radityo Anggoro, S.Kom., M.Sc.",
            "Ratih Nur Esti Anggraini, S.Kom., M.Sc., Ph.D.",
            "Adhatus Solichah Ahmadiyah, S.Kom., M.Sc.",
            "Dini Adni Navastara, S.Kom., M.Sc.",
            "Wijayanti Nurul Khotimah, S.Kom., M.Sc., Ph.D.",
            "Nurul Fajrin Ariyani, S.Kom., M.Sc.",
            "Abdul Munif, S.Kom., M.Sc.Eng.",
            "Bagus Jati Santoso, S.Kom., Ph.D.",
            "Rizky Januar Akbar, S.Kom., M.Eng.",
            "Dr. Baskoro Adi Pratomo., S.Kom., M.Kom.",
            "Hudan Studiawan, S.Kom., M.Kom., Ph.D.",
            "Hadziq Fabroyir, S.Kom., Ph.D.",
            "Shintami Chusnul Hidayati, S.Kom., M.Sc., Ph.D.",
            "Agus Budi Raharjo, S.Kom., M.Kom., Ph.D.",
            "Siska Arifiani, S.Kom., M.Kom.",
            "Dr. Kelly Rossa Sungkono, S.Kom., M.Kom.",
            "Aldinata Rizky Revanda, S.Kom., M.Kom.",
            "Moch. Nafkhan Alzamzami, S.T., M.T.",
            "Bintang Nuralamsyah, S.Kom., M.Kom.",
            "Dr.Eng. Muhamad Hilmil Muchtar Aditya Pradana, S. Kom., M. Sc..",
            "Imam Mustafa Kamal, S.ST., Ph.D.",
            "Ilham Gurat Adillion, S.Kom., M.Eng.",
        ];

        $lecturers = [];
        
        foreach ($names as $name) {
            $lecturers[] = [
                'name' => $name,
                'email' => $this->faker->unique()->safeEmail(),
                'identifier_number' => $this->faker->unique()->numerify('ID######'),
                'user_type' => 'lecturer',
                'phone_number' => $this->faker->unique()->phoneNumber(),
                'password' => static::$password ??= Hash::make('password'),
                'remember_token' => Str::random(10),
            ];
        }

        return $lecturers;
    }
}
