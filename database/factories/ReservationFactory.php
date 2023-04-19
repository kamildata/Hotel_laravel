<?php

namespace Database\Factories;


use App\Models\Guest;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $guests = Guest::pluck('id')->toArray();
        $status = array("zarezerwowano", "wynajeto", "zakonczono");


        return [
            'status' => $this->faker->randomElement($status),
            'data_rozpoczecia' => $this->faker->dateTimeThisDecade(),
            'data_zakonczenia' => $this->faker->dateTimeThisDecade(),
            'guest_id' => $this->faker->randomElement($guests),
        ];
    }
}
