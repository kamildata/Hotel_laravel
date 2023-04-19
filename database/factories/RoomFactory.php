<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $standards = array("niski", "wysoki", "premium");
        return [
            'pietro' => rand(1, 10),
            'dostepny' => 1,
            'standard' => $this->faker->randomElement($standards),
            'liczba_miejsc' => rand(1, 6),
            'cena' => $this->faker->randomFloat(2, 100, 1000),
            'opis' => $this->faker->text()
        ];

        $status = array("zarezerwowano", "wynajeto", "zakonczono");
    }
}
