<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug,
            'category_id' => ArticleCategory::get()->random()->id,
            'image' => '',
            'content' => $this->faker->text,
            'status' => random_int(0, 1),
            'sort_order' => random_int(1, 30)

        ];


    }

}
