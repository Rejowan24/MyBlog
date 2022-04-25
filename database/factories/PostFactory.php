<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'image' => 'blog_'.$this->faker->unique()->numberBetween(1,22).'.jpg',
            'description' => $this->faker->text(30),
            'category_id' => $this->faker->numberBetween(1,4),
            'user_id' => $this->faker->numberBetween(1,4),
            'published_at' =>$this->faker->date(),
        ];
    }
}
