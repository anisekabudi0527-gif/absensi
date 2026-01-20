<?php

namespace Database\Factories;

use App\Models\Wali;
use Illuminate\Database\Eloquent\Factories\Factory;

class WaliFactory extends Factory
{
    protected $model = Wali::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'telepon' => $this->faker->unique()->numerify('08##########'),
            'email' => $this->faker->unique()->safeEmail(),
            'alamat' => $this->faker->address(),
        ];
    }
}
