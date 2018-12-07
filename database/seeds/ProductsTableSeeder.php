<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,300) as $index) 
        {
            DB::table('products')->insert([
                'name' => str_random(10),
                'price' => mt_rand(1, 99999)/100,
                'description' => str_random(60),
                'picture' => 'example.png',
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'), 
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
