<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory{

    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'image' => 'https://picsum.photos/200',
            'content' => $this->faker->text(300),
            'cat_id' => 1
        ];
    }
}
