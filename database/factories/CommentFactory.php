<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name(),
            'comment' => $this->faker->sentence(rand(5,30)),
            'is_approved' => collect([true, false])->random(),
            'is_hidden' => collect([true, false])->random(),
            'newsarticle_id' => rand(1,25),
        ];
    }
}
