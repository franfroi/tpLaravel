<?php

use Illuminate\Database\Seeder;


class WalletsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker=Faker\Factory::create();
        
        $userId=1;

        \App\Wallet::truncate(); //remet a 0 la base
        for($i=0;$i<2;$i++){
                
        
           
                \App\Wallet::create(array(
                    "key"=>$faker->randomNumber(5),
                    "amount"=>$faker->randomNumber(5),
                    "user_id"=>$userId,
                    "money_id"=>$faker->randomNumber(5),
                   

                ));
        }
    }
}
