<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class lessonseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\lesson::factory()->count(30)->create();
    }
}
