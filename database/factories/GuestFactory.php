<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'imie' => $this->faker->firstNameMale(),
            'nazwisko' => $this->faker->lastName(),
            'pesel' => $this->faker->uuid(),
            'ulica' => $this->faker->streetName(),
            'miasto' => $this->faker->city(),
            'nr_budynku' => $this->faker->buildingNumber(),
            'kod_pocztowy' => $this->faker->postcode(),
            'miejscowosc' => $this->faker->city(),
            'kraj' => $this->faker->country(),
            'telefon' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'haslo' => $this->faker->password(),
        ];
    }
}
