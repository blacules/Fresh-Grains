<?php

use Illuminate\Database\Seeder;
use App\category;
use Carbon\Carbon;

class categoryTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now= Carbon::now()->todatetimestring();

        Category::insert([
        	['name'=>'Rice', 'slug'=>'rice', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Beans', 'slug'=>'beans', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Herbs', 'slug'=>'herbs', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Spices', 'slug'=>'spices', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Flours', 'slug'=>'flours', 'created_at'=>$now, 'updated_at'=>$now],

        ]);
    }
}
