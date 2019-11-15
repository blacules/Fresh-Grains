<?php

use Illuminate\Database\Seeder;
use App\products;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        products::create([
        	'name'=>'rice1',
        	'slug'=>'rice1',
        	'details'=>'white imported rice from the hills of rice',
        	'price'=>'500',
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            ',
        ])->categories()->attach(1);
         products::create([
        	'name'=>'beans1',
        	'slug'=>'beans1',
        	'details'=>'brown imported from the hills of beans',
        	'price'=>'300',
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            ',
        ])->categories()->attach(2);
          products::create([
        	'name'=>'green grams1',
        	'slug'=>'grams1',
        	'details'=>'green imported grams from the hills of gram gram',
        	'price'=>'450',
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            ',
        ])->categories()->attach(2);
           products::create([
        	'name'=>'peas1',
        	'slug'=>'peas1',
        	'details'=>'green imported peas from the hills of peace',
        	'price'=>'400',
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            ',
        ])->categories()->attach(1);
            products::create([
        	'name'=>'spice',
        	'slug'=>'spice1',
        	'details'=>'spice imported from the hills of spicey',
        	'price'=>'200',
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            ',
        ])->categories()->attach(4);
             products::create([
        	'name'=>'herb',
        	'slug'=>'herb1',
        	'details'=>'hern imported from the hills of haba haba(not weed)',
        	'price'=>'500',
        	'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            ',
        ])->categories()->attach(3);
        
    }
}
