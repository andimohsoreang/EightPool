<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CustomerDetail;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CustomerDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua user yang belum memiliki customer detail
        $users = User::whereDoesntHave('customerDetail')->get();

        foreach ($users as $user) {
            CustomerDetail::create([
                'id' => Str::ulid(),
                'user_id' => $user->id,
                'full_name' => $faker->name,
                'birth_date' => $faker->dateTimeBetween('-50 years', '-18 years'),
                'gender' => $faker->randomElement(['male', 'female', 'other']),
                'address' => $faker->address,
                'city' => $faker->city,
                'province' => $faker->state,
                'total_visits' => $faker->numberBetween(0, 100),
                'total_spending' => $faker->randomFloat(2, 0, 10000000)
            ]);
        }
    }
}
