<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Exercise;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                QuestionTypeSeeder::class,
                ExerciseSeeder::class,
                AnswerSeeder::class,
                UserSeeder::class
            ]
        );
    }
}
