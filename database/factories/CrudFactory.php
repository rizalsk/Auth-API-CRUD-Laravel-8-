<?php

namespace Database\Factories;

use App\Models\Crud;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CrudFactory extends Factory
{

    protected $model = Crud::class;

    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'position' => $this->faker->randomElement(['Director', 'Manager', 'Assistant', 'Staff']), 
        ];
    }
}
