<?php

namespace Database\Seeders;

use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomReservation;
use App\Models\User;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Support\Facades\DB;
use Illuminate\Container\Container;

class DatabaseSeeder extends Seeder
{
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();
        $guests_num = 100;
        $rooms_num = 100;
        $reservations = 10; // rezerwacje * 2 bo połowa zakończone, a połowa inny status
        $room_reservations = 10;

        User::truncate();
        User::upsert(
            [
                [
                    'name' => 'Kamil Data',
                    'email' => 'kamil@example.com',
                    'password' => bcrypt('password'),
                ],
            ],
            'name'
        );

        Guest::factory()->count($guests_num)->create();
        Room::factory()->count($rooms_num)->create();

        // Generowanie rezerwacji
        $guests = Guest::pluck('id')->toArray();
        $status = array("zarezerwowano", "wynajeto");

        for ($i = $reservations; $i > -$reservations; $i--) {
            $rooms = Room::where("dostepny", 1)->pluck('id')->toArray();
            $room_id = $this->faker->randomElement($rooms);

            $room = Room::find($room_id);
            $room->dostepny = false;
            $room->save();

            $date_start = new DateTime();
            $date_start->modify("-$i day");

            $date_end = new DateTime();
            $date_end->modify("-" . $i - 1 . "day");

            DB::table('reservations')->insert([
                'status' => $i > 0 ? "zakonczono" : $this->faker->randomElement($status),
                'data_rozpoczecia' => $date_start->format("Y-m-d H:i:s"),
                'data_zakonczenia' => $date_end->format("Y-m-d H:i:s"),
                'guest_id' => $this->faker->randomElement($guests),
                'room_id' => $room_id
            ]);
        }
    }
}
