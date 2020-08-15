<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Россия',
                'slug' => 'russia',
            ],
            [
                'name' => 'Европа',
                'slug' => 'europe',
            ],
        ];
        DB::table('countries')->insert($data);
    }
}
