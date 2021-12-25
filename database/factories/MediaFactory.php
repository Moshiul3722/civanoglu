<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> 'https://source.unsplash.com/random/1200x800',
            'property_id'=> Property::all()->random()->id
        ];
    }
}
