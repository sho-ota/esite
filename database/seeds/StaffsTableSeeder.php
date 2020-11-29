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
            'last_name'  => '山田',
            'first_name' => '花太郎',
            'last_name_hiragana' => 'やまだ',
            'first_name_hiragana' => 'はなたろう',
            'email'             => '1@1.1',
            'password'          => Hash::make('11111111'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
