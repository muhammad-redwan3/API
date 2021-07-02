<?php

namespace Database\Factories;

use App\Models\LessonTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class lessonTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LessonTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_id' => $this->faker->numberBetween(1, 20),
            'tag_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
