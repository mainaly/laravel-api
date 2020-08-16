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
	            'slug' => 'rfs',
	            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda culpa fuga mollitia natus provident quae quisquam recusandae sint tenetur! A blanditiis delectus dicta doloremque dolores? Architecto inventore necessitatibus quo!',
                'logo' => 'https://via.placeholder.com/300x150',
                'video' => 'https://via.placeholder.com/300x150',
                'country_id' => 1,
            ],
            [
                'name' => 'RFold',
	            'slug' => 'rfold',
	            'about' => '11Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda culpa fuga mollitia natus provident quae quisquam recusandae sint tenetur! A blanditiis delectus dicta doloremque dolores? Architecto inventore necessitatibus quo!',
                'logo' => 'https://via.placeholder.com/300x150',
                'video' => 'https://via.placeholder.com/300x150',
                'country_id' => 2,
            ],
        ];
        DB::table('servers')->insert($data);
    }
}
