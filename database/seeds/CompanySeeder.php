<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 15) as $index) {
            DB::table('companies')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'website' => $faker->url,
            ]);
        }
    }
}
