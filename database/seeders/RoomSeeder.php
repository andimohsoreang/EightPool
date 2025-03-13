<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $rooms = [
            [
                'name' => 'Ruang Utama',
                'type' => 'regular',
                'capacity' => 50,
                'description' => 'Ruang pertemuan standar dengan fasilitas lengkap'
            ],
            [
                'name' => 'Ruang VIP Eksekutif',
                'type' => 'vip',
                'capacity' => 20,
                'description' => 'Ruang khusus untuk pertemuan eksekutif dengan fasilitas premium'
            ],
            [
                'name' => 'Ruang Rapat Besar',
                'type' => 'regular',
                'capacity' => 100,
                'description' => 'Ruang pertemuan besar untuk acara-acara besar'
            ]
        ];

        // Tambahkan beberapa ruangan acak
        for ($i = 1; $i <= 5; $i++) {
            $rooms[] = [
                'name' => $faker->unique()->word . ' Room',
                'type' => $faker->randomElement(['regular', 'vip']),
                'capacity' => $faker->numberBetween(10, 150),
                'description' => $faker->sentence
            ];
        }

        // Masukkan data ruangan
        foreach ($rooms as $room) {
            Room::create([
                'id' => Str::ulid(),
                'name' => $room['name'],
                'type' => $room['type'],
                'capacity' => $room['capacity'],
                'description' => $room['description']
            ]);
        }
    }
}
