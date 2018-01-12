<?php

use Illuminate\Database\Seeder;

class MoneysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        
      

        \App\Money::truncate(); //remet a 0 la base
        for($i=0;$i<2;$i++){
                
        
           
                \App\Money::create(array(
                    "description"=>$faker->text(10) ,
                   
                 
                   

                ));
        }
    }
}
