<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

    
        
        for ($i = 0; $i < 10; $i++) {
            $user_detail = new UserDetail();
            $user_detail->photo = $faker->image(null, 640, 480);
            $user_detail->curriculum = $faker->mimeType();
            $user_detail->phone = $faker->randomNumber(9,true);
            $user_detail->performance = $faker->sentence(2);
            $user_detail->address = $faker->sentence(2);
            $user_detail->description = $faker->text();
            $user_detail->user_id = $i+1; 
            $user_detail->save();
        }
        
    }
}
