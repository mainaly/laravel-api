<?php
	
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Carbon;
	
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
					'image' => 'https://via.placeholder.com/300x150',
					'events' => 'weekly',
					'rate' => '[
							  {
							    "id": 1,
							    "rate": 3
							  },
							  {
							    "id": 2,
							    "rate": 55555
							  }
							 ]',
					'shop' => true,
					'description' => 'RF2232 лоу рейты х5 // Заходи и играй!',
					'open' => Carbon::create('2000', '01', '01'),
					'like' => 13903,
					'position' => 1,
					'url' => 'http://2232.ru',
					'power_up' => true,
					'server_id' => 1,
				
				],
				[
					'image' => 'https://via.placeholder.com/300x150',
					'events' => 'daily',
					'rate' => '[
							  {
							    "id": 1,
							    "rate": 0
							  },
							  {
							    "id": 2,
							    "rate": 99999
							  }
							 ]',
					'shop' => false,
					'description' => 'RF2S232 лоу рейты х5 // Заходи и играй!',
					'open' => Carbon::create('2004', '01', '01'),
					'like' => 13900,
					'url' => 'http://rfs.ru',
					'power_up' => false,
					'server_id' => 2,
					'position' => 2,
				
				],
			];
			DB::table('descriptions')->insert($data);
		}
	}
