<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = User::create([
            'name' => 'juan',
            'email' => 'test@test.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://angel-glez-com',
        ]);




        $user2 = User::create([
            'name' => 'Pedro',
            'email' => 'test1@test.com',
            'password' => Hash::make('12345678'),
            'url' => 'https://angel-glez-com',
        ]);


    }
}
