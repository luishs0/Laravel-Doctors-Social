<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker; 

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 30; $i++) {
            $message = new Message();
            $message->name = $faker->name();
            $message->email = $faker->email();
            $message->text = $faker->text(400);
            $message->user_id = $faker->numberBetween(1,10); 
            $message->save();
        }
        
    }
}
