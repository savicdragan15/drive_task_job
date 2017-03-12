<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribers')->insert([
            'subscriber_name' => 'John',
            'subscriber_surname' => 'Doe',
            'gender' => 'male',
            'city' => 'Ljubljana',
            'head' => str_random(10),
            'birthday' => Carbon::now()->format('Y-m-d'),
            'postalcode' => '1000',
            'issue' => 'Številka br. 30',
        ]);
    }
}
