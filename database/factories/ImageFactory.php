<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rand = $this->faker->unique()->numberBetween(1,2000);
        if ($rand<50) {
            $type = $this->faker->randomElement(['App\Models\Category','App\Models\Post']);
        }else{
            $type = 'App\Models\Category';
        }

        return [
            'title' => $this->faker->word,
            'alt' => $this->faker->word,
            'path' => $this->faker->imageUrl(),
            'imageable_id' =>$rand,
            'imageable_type' => $type

        ];
    }
}
