<?php

use Illuminate\Database\Seeder;

class ServerTableSeeder extends Seeder
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
                'name' => 'RFS',
                'url' => 'rf-server.ru',
                'likes' => '100',
                'status' => '1',
                'position' => '1',
                'slug' => 'rfs',
                'country_id' => 1,
            ],
            [
                'name' => 'RF-old',
                'url' => 'RF-old.ru',
                'likes' => '10',
                'status' => '2',
                'position' => '2',
                'slug' => 'rfold',
                'country_id' => 1,
            ],
            [
                'name' => 'RF2232',
                'url' => 'RF2232.ru',
                'likes' => '50',
                'status' => '1',
                'position' => '3',
                'slug' => 'rf2232',
                'country_id' => 2,
            ],
        ];
        DB::table('servers')->insert($data);
    }
}
