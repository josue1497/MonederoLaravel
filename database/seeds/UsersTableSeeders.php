<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    function __construct(){

    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= new \App\User();

        $user->name = 'Josue Martinez';
        $user -> email='jmartinezm@intelix.biz';
        $user -> password = bcrypt('secret');

        $user->save();
    }
}
