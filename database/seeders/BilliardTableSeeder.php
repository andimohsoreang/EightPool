<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\BillardTable;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BillardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ruangan
        $rooms = Room::all();

        // Untuk setiap ruangan, buat beberapa meja biliar
        foreach ($rooms as $room) {
            // Jumlah meja biliar per ruangan (misal 3-5 meja)
            $tableCount = $faker->numberBetween(3, 5);

            for ($i = 1; $i <= $tableCount; $i++) {
                BillardTable::create([
                    'id' => Str::ulid(),
                    'brand' => $faker->randomElement([
                        'Brunswick',
                        'Diamond',
                        'Olhausen',
                        'Valley',
                        'Imperial'
                    ]),
                    'table_number' => $room->name . ' - Meja ' . $i,
                    'status' => $faker->randomElement(['available', 'in_use', 'maintenance']),
                    'total_play_hours' => $faker->randomFloat(2, 0, 1000),
                    'room_id' => $room->id,
                    'notes' => $faker->optional()->sentence
                ]);
            }
        }
    }
}
