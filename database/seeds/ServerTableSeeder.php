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
            ],
            [
                'name' => 'RF-old',
                'url' => 'RF-old.ru',
                'likes' => '10',
                'status' => '2',
                'position' => '2',
                'slug' => 'rfold',
            ],
            [
                'name' => 'RF2232',
                'url' => 'RF2232.ru',
                'likes' => '50',
                'status' => '1',
                'position' => '3',
                'slug' => 'rf2232',
            ],
        ];
        DB::table('servers')->insert($data);
    }
}
