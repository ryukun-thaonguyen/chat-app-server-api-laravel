<?php

use App\User;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $user_primary= new User();
        $user_primary->name="Thao Nguyen";
        $user_primary->email="ngocth4ospectre@gmail.com";
        $user_primary->password=Hash::make('admin');
        $user_primary->save();

        $user_test= new User();
        $user_test->name="Thao Nguyen 2";
        $user_test->email="test@gmail.com";
        $user_test->password=Hash::make('1');
        $user_test->save();

        for($i=0;$i<10;$i++){
            $user= new User();
            $user->name=$faker->name;
            $user->email=$faker->email;
            $user->password=Hash::make($user->name);
            $user->save();
        }

    }
}
