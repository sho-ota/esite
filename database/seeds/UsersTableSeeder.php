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
        DB::table('users')->insert([
            'last_name'  => 'ul111',
            'first_name' => 'uf111',
            'last_name_hiragana' => 'ulh111',
            'first_name_hiragana' => 'ufh111',
            'email'             => 'u@u.u',
            'password'          => Hash::make('11111111'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
