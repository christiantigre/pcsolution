<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create( [
    		'id'=>1,
    		'name'=>'admin@gmail.com',
    		'email'=>'admin@gmail.com',
    		'password'=>'$2y$10$/PazZrIkQQl0Ydf3HFZVgu2mgni62k4.6yXHtZxcgMUGo0O6x/PYC',
    		'remember_token'=>NULL
    		] );


        User::create( [
            'id'=>2,
            'name'=>'Andres',
            'email'=>'andrescondo17@gmail.com',
            'password'=>'$2y$10$VFKVNgFKmbqYiD/jWP4sLOASrR.L0FqWPFwikozF548w7DbxXcnSO',
            'remember_token'=>NULL
            ] );

    }
}
