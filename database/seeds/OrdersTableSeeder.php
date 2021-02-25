<?php

use Illuminate\Database\Seeder;
use App\Order;
use Faker\Generator as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newOrder = new Order();

            $newOrder->name = $faker->word();
            $newOrder->lastname = $faker->word();
            $newOrder->address = $faker->text(10);
            $newOrder->email = $faker->freeEmail();
            $newOrder->tot_price = $faker->randomFloat(2, 10, 90);
            $newOrder->payment_status = $faker->boolean();

            $newOrder->save();
        }
    }
}
