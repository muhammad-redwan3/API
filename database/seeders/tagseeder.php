<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class tagseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::factory()->count(6)->create();
    }
}
