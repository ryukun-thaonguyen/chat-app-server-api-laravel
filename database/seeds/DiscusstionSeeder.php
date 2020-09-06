<?php

use App\Discusstion;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DiscusstionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $dis= new Discusstion();
        $dis->user_id_1=1;
        $dis->user_id_2=2;
        $dis->save();
        $dis1= new Discusstion();
        $dis1->user_id_1=1;
        $dis1->user_id_2=3;
        $dis1->save();
    }
}
