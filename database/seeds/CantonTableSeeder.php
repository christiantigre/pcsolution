<?php

use Illuminate\Database\Seeder;
use App\Canton;

class CantonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Canton::create( [
    		'id'=>1,
    		'iso'=>'AF',
    		'canton'=>'none',
    		'provincia_id'=>'1',
    		'created_at'=>NULL,
    		'updated_at'=>NULL
    		] );
    }
}
