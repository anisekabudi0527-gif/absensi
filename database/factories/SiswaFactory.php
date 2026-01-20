<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    protected $model = Siswa::class;

    public function definition(): array
    {
        $jk = $this->faker->randomElement(['L', 'P']);

        return [
            'wali_id' => null, // nanti di-set di seeder
            'nis' => $this->faker->unique()->numerify('12######'),
            'nama' => $this->faker->name($jk === 'L' ? 'male' : 'female'),
            'jenis_kelamin' => $jk,
            'tempat_lahir' => $this->faker->city(),
            'tgl_lahir' => $this->faker->dateTimeBetween('-18 years', '-15 years')->format('Y-m-d'),
            'alamat' => $this->faker->address(),
            'telepon' => $this->faker->unique()->numerify('08##########'),
            'is_active' => true,
        ];
    }
}
