<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $path = 'public/storage/categories';
        // $path = Storage::disk('s3')->put('categories');
        return [
            'image' => 'categories/' . $this->faker->image($path, 640, 480, null, true)
        ];
    }
}
// time 13:00
