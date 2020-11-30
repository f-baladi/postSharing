<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        for($i=1;$i<2001;$i++)
        {
            $j = rand(1,5);
            for($k=0;$k<$j;$k++){
                return [
                    'post_id' => $i,
                    'category_id' => Category::all()->unique()->random()->id,
                ];
            }
        }
    }
}
