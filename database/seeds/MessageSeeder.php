<?php

use App\Message;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker )
    {
        //
        for($i=0;$i<5;$i++){
            $mes= new Message();
            $mes->discusstion_id=random_int(1,2);
            $mes->user_id=random_int(1,2);
            $mes->message=$faker->title;
            $mes->save();
        }

    }
}
