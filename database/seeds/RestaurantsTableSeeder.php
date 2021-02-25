<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Restaurant;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all()->pluck('id')->toArray();
        for ($i=0; $i < 5; $i++) { 
            $title = $faker->text(20);

            $newRestaurant = new Restaurant();
            $newRestaurant->user_id = $faker->randomElement($users);
            $newRestaurant->name = $title;
            $newRestaurant->slug = Str::slug($title, '-');
            // secondo parametro per dare numero fisso 
            $newRestaurant->vat = $faker->randomNumber(9, true);
            $newRestaurant->address = $faker->text(20);
            $newRestaurant->body = $faker->paragraphs(2, true);
            $newRestaurant->phone = $faker->randomNumber(9, true);
            // primo num dopo la virgola. e poi il range da 1 a 8
            $newRestaurant->delivery_price = $faker->randomFloat(2, 1, 8);
            $newRestaurant->min_order = $faker->randomFloat(2, 4, 8);
            $newRestaurant->path_image = $faker->imageUrl(150, 150, 'animals', true);
            $newRestaurant->open_hours = $faker->text(20);

            $newRestaurant->save();
            
        }
    }
}
