<?php

namespace Database\Factories;


use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomReservation>
 */
class RoomReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Wybeiranie pokojow i jak jest dostepny to zamiana na niedostepny
        $rooms = Room::where("dostepny", 1)->pluck('id')->toArray();
        $room_id = $this->faker->randomElement($rooms);

        $room = Room::find($room_id);
        $room->dostepny = false;
        $room->save();

        //
        $reservations = Reservation::pluck('id')->toArray();

        return [
            'reservation_id' => $this->faker->randomElement($reservations),
            'room_id' => $room_id,
        ];
    }
}
