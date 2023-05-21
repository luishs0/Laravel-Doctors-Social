<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; 
class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {

        $sponsors = [
           [
            'title' => 'Silver',
            'price' => '2.99',
            'description' => 'With Silver sponsor you will get a full day on the sponsored doctors'
           ],
           [
            'title' => 'Gold',
            'price' => '5.99',
            'description' => 'the Gold sponsor garants you will 3 full days on the sponsored doctors!'
           ],
           [
            'title' => 'Platinum',
            'price' => '9.99',
            'description' => 'Platinum sponsor garants you will 6 full days on the sponsored doctors! you will appear for first on the search list.'
           ]
        ];
        foreach($sponsors as $sponsor)
        {
            $new_sponsor = new Sponsor();
            $new_sponsor->title = $sponsor['title'] ;
            $new_sponsor->slug = Str::slug($sponsor['title']);
            $new_sponsor->price = $sponsor['price'];
            $new_sponsor->description = $sponsor['description'];
            $new_sponsor->save();
        }
    }
}
