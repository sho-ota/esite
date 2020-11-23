<?php

use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            'last_name'  => 'sl111',
            'first_name' => 'sf111',
            'last_name_hiragana' => 'slh111',
            'first_name_hiragana' => 'sfh111',
            'email'             => 's@s.s',
            'password'          => Hash::make('11111111'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
