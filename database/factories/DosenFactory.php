<?php

namespace Database\Factories;

use Faker\Factory as faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = faker::create('id_ID');
        return [
            'nip' => mt_rand(0000000000000001, 9999999999999999),
            'nm_dos' => $faker->name,
            'no_hp' => mt_rand(000000000001, 999999999999),
        ];
    }
}
