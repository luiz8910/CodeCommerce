<?php

/**
 * Created by PhpStorm.
 * User: luizfernandosanches
 * Date: 24/03/16
 * Time: 15:24
 */

use \Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->truncate();

        $faker = Faker::create("en_US");

        foreach (range(1,15) as $item)
        {
            Category::create([
                "name" => $faker->word(),
                "description" => $faker->sentence()
            ]);
        }


    }
}