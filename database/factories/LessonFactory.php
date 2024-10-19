<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Lesson;
use App\Models\Level;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image_uri' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'content_uri' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'pdf_uri' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'level_id' => Level::factory(),
        ];
    }
}
