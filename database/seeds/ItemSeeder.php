<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoes')->insert([
            'shoe_name' => 'Nike Air Jordan High OG Chicago',
            'shoe_description' => 'The original chicago color Air Jordan that released at 1985. Often called as the OG of all Air Jordan shoes.',
            'shoe_image' => '/storage/images/ajchicago.png',
            'start' => Carbon::now(),
            'end' => Carbon::create('2021-1-3 20:00:00')
        ]);

        DB::table('shoes')->insert([
            'shoe_name' => 'David Bowie x Vans Old Skool Aladdin Sane',
            'shoe_description' => 'Classic vans with timeless design created by Paul Van Doren with David Bowie logo on the sides for respect.',
            'shoe_image' => '/storage/images/vansdavidbowie.jpeg',
            'start' => Carbon::now(),
            'end' => Carbon::create('2021-1-3 20:00:00')
        ]); 

        DB::table('shoes')->insert([
            'shoe_name' => 'Nike Air Jordan High Travis Scott',
            'shoe_description' => 'Air Jordan collaboration with famous rapper Travis Scott. Presenting a mirrored swoosh logo as a unique feature of this shoe.',
            'shoe_image' => '/storage/images/ajtravis.jpg',
            'start' => Carbon::now(),
            'end' => Carbon::create('2021-1-3 20:00:00')
        ]);

        DB::table('shoes')->insert([
            'shoe_name' => 'Nike Cortez Basic Leather OG Forrest Gump',
            'shoe_description' => 'Released in June 2017, this Classic Cortez features the white, Varsity Royal, and Varsity Red color scheme made famous by the 1994 film Forrest Gump. ',
            'shoe_image' => '/storage/images/nikecortez.jpeg',
            'start' => Carbon::now(),
            'end' => Carbon::create('2021-1-3 20:00:00')
        ]); 

        DB::table('shoes')->insert([
            'shoe_name' => 'Nike x Sacai LD Waffle Black/White',
            'shoe_description' => 'One of the result of epic collaboration between Nike and famous japanese clothing brand, Sacai. ',
            'shoe_image' => '/storage/images/nikesacaibw.jpg',
            'start' => Carbon::now(),
            'end' => Carbon::create('2021-1-3 20:00:00')
        ]);  

        DB::table('shoes')->insert([
            'shoe_name' => 'G-Dragon x Air Force 1 Paranoise  2.0',
            'shoe_description' => 'The G-Dragon x Nike Air Force 1 ‘07 ‘Para-Noise 2.0’ is the follow-up colorway to the 2019 Air Force 1 collaboration undertaken with the Korean hip hop star.',
            'shoe_image' => '/storage/images/paranoise2.jpeg',
            'start' => Carbon::now(),
            'end' => Carbon::create('2021-1-3 20:00:00')
        ]);
        
        DB::table('shoes')->insert([
            'shoe_name' => 'Nike Air Jordan High OG Shattered Back Board 2.0',
            'shoe_description' => 'Second version of Air Jordan Shatered Backboard series. Inspired by the moment when Michael Jordan broke the ring backboard with his dunk.',
            'shoe_image' => '/storage/images/ajsbb.jpg',
            'start' => Carbon::now(),
            'end' => Carbon::create('2021-1-3 20:00:00')
        ]);

        
    }
}
