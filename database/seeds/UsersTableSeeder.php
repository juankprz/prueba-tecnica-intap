<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Usuario 1',
                'username' => 'usuario1',
                'email'=>'usuario1@intap.com.co',
                'password'=>Hash::make('intap@123')
                ]
        );
        User::create(
            [
                'name' => 'Usuario 2',
                'username' => 'usuario2',
                'email'=>'usuario2@intap.com.co',
                'password'=>Hash::make('intap@123')
                ]
        );
    }
}
