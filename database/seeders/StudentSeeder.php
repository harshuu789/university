<?php

namespace Database\Seeders;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $students = [];
        for ($i = 0; $i < 10; $i++) { // Generate 10 random students
            $students[] = [
                'student_name' => $faker->name,
                'class_teacher_id' => Teacher::inRandomOrder()->first()->id,
                'class' => $faker->randomElement(['10A', '10B', '10C']),
                'admission_date' => $faker->dateTimeThisDecade,
                'yearly_fees' => $faker->numberBetween(5000, 10000),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('students')->insert($students);
    }
}
