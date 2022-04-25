<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 6)), //kalimat random 2 sampai 6 kata
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(), //1 paragraf random
            // 'body' => $this->faker->paragraph(mt_rand(5, 8)), //paragraf random 2 sampai 6 kalimat
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 8))) . '</p>', //paragraf random 2 sampai 6 paragraf dan implode=join

            // 'body'=> collect($this->faker->paragraphs(mt_rand(5, 8)))->map(function($p){
            //     return "<p>$</p>"->implode('');
            // }), //memetakan paragrag kedalam tag p

            'body' => collect($this->faker->paragraphs(mt_rand(8, 12)))->map(fn ($p) => "<p>$p</p>")->implode(''), //memetakan paragrag kedalam tag p dengan sintaks php yang baru

            'user_id' => mt_rand(1, 3), // random data user 1 sampai 3 user
            'kategori_id' => mt_rand(1, 3), // random data kategori 1 sampai 2
        ];
    }
}
