<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Exercise;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Exercise::all() as $exercise) {
            $exercise->answers()->save(
                new Answer([
                    "solution" =>  "Example answer",
                    "isCorrect" => rand(0,10) > 5
                ])
            );
        }
    }
}
