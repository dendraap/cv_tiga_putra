<?php

namespace Database\Factories;

use App\Models\roles;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = roles::class;
    public function definition()
    {
        return [
            'name' => 'Laravel Testing',
            'description' => 'Laravel Testing'
        ];
    }
}
