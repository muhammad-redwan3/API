<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class lessonTagseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\LessonTag::factory()->count(100)->create();
    }
}