<?php

/**
 * Created by PhpStorm.
 * User: luizfernandosanches
 * Date: 24/03/16
 * Time: 15:24
 */

use \Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \CodeCommerce\User;
use \Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->truncate();

        $faker = Faker::create("en_US");

        foreach (range(1,15) as $item)
        {
            User::create([
                "name" => $faker->name(),
                "email" => $faker->email(),
                "password" => Hash::make($faker->word())
            ]);
        }


    }
}