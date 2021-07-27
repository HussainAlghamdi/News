<?php

namespace Database\Factories;

use App\Models\Newsarticle;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsarticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Newsarticle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(rand(5,10)),
            'category' => collect([
                'Politics',
                'Business',
                'Investment',
                'Sports',
                'Entertainment',
                'World',
                'Travel',
            ])->random(),
            'author_name' => $this->faker->name(),
            'content' => implode('<br>', $this->faker->paragraphs(rand(7,20))),
            'date_publish' => Carbon::today()->subDays(rand(0,365))->subSecond(rand(0, 86400)),
            'number_visitors' => rand(0,3000),
            'thumbnail' => 'storage/thumbnails/' . collect(scandir('storage/app/public/thumbnails'))->random(),
            'user_id' => 1
        ];
    }
}
