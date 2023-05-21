<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as faker; 
class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $spec = ['Cardiologist', 'Immunologist', 'Dermatologist', 'Nephrologist', 'Gastroenterologist', 'Urologist', 'Infectious disease', 'Ophthalmologist', 'Gynecologist', 'Endocrinologist',];
        for ($i = 0; $i < count($spec); $i++) {
            $specialization = new Specialization();
            $specialization->title = $spec[$i];
            $specialization->slug = Str::slug($specialization->title, '-');
            $specialization->save(); 
        }
    }
}
