<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            Mahasiswa::create([
                'nim' => '20041110010' + $i,
                'nama' => $faker->name,
                'alamat' => $faker->address
            ]);
        }       
    }
}
