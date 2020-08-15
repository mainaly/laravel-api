<?php

use Illuminate\Database\Seeder;

class DescriptionTableSeeder extends Seeder
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
                'rates' => '100',
                'server_id' => '1',
                'card_desc' => 'короткое описание rf-server.ru',
                'server_desc' => 'описание полное сервера rf-server.ru',
                'server_rules' => 'правила сервера rf-server.ru',
            ],
            [
                'rates' => '1',
                'server_id' => '2',
                'card_desc' => 'короткое описание RF-old',
                'server_desc' => 'описание полное сервера RF-old',
                'server_rules' => 'правила сервера RF-old',
            ],
            [
                'rates' => '200',
                'server_id' => '3',
                'card_desc' => 'короткое описание RF2232',
                'server_desc' => 'описание полное сервера RF2232',
                'server_rules' => 'правила сервера RF2232',
            ],
        ];
        DB::table('descriptions')->insert($data);
    }
}
