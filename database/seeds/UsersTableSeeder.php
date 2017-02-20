<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    /*User::create([
		    'name' => 'JohnDoe',
		    'email' => 'john@example.com',
		    'password' => bcrypt('password')
	    ]);*/
	    factory('App\User', 5)->create()->each(
	    	function($user)
		    {
		        $user->articles()->saveMany(factory('App\Article', 2)->create());
	        }
	    );
    }
}
