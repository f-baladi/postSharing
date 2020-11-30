<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        for($i=1;$i<2001;$i++)
        {
            $j = rand(3,10);
            for($k=0;$k<$j;$k++){
                return [
                    'post_id' => $i,
                    'tag_id' => Tag::all()->unique()->random()->id,
                ];
            }
        }
    }
}
