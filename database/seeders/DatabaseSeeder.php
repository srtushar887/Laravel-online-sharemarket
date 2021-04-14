<?php

namespace Database\Seeders;

use App\Models\blog;
use App\Models\blog_category;
use App\Models\message;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $faker = Faker::create();


        foreach (range(1,50) as $index){
//            User::create([
//               'name'=>$faker->name,
//               'email'=>$faker->email,
//               'phone'=>$faker->phoneNumber,
//               'password'=>Hash::make('12345678'),
//            ]);



//            blog_category::create([
//                'category_name'=>$faker->name,
//            ]);

            blog::create([
                'cat_id'=>rand(1,20),
                'title'=>$faker->paragraph,
                'description'=>$faker->paragraph,
                'image'=>$faker->imageUrl,
                'status'=>1,
            ]);



        }


    }
}
