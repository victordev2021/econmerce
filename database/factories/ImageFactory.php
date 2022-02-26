<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $path = 'public/storage/products';
        return [
            'url' => 'products/' . $this->faker->image($path, 640, 488, null, false)
        ];
    }
}
