<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $batchSize = 1000; // Number of records per insert
        $totalRecords = 10000; // 10 million records

        $chunks = ceil($totalRecords / $batchSize); // Number of batches

        for ($i = 0; $i < $chunks; $i++) {
            $teachers = [];

            for ($j = 0; $j < $batchSize; $j++) {
                $teachers[] = [
                    'cnic' => $faker->unique()->numerify('###########'),
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'salary' => $faker->randomFloat(2, 30000, 100000),
                    'age' => $faker->numberBetween(25, 60),
                    'phone' => $faker->phoneNumber,
                    'address' => $faker->address,
                ];
            }

            // Insert batch of records
            DB::table('teachers')->insert($teachers);

            // Optional: To avoid memory exhaustion, you can flush the data after each batch
            unset($teachers);
        }
    }
}
