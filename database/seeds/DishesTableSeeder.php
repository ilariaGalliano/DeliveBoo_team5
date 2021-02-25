<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use App\Dish;
use App\Dishtype;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = Restaurant::all()->pluck('id')->toArray();
        $dishtypes = Dishtype::all()->pluck('id')->toArray();

        for ($i=0; $i < 20; $i++) { 

            $newDish = new Dish();

            $title = $faker->text(20);

            $newDish->restaurant_id = $faker->randomElement($restaurants);
            $newDish->dishtype_id = $faker->randomElement($dishtypes);

            $newDish->name = $title;

            $newDish->slug = Str::slug($title, '-');
            
            $newDish->description = $faker->paragraphs(2, true);
            $newDish->allergens = $faker->text(40);
            $newDish->price = $faker->randomFloat(2, 3, 25);
            $newDish->visibility = $faker->boolean();
            $newDish->vegan = $faker->boolean();
            $newDish->path_image = $faker->imageUrl(150, 150, 'animals', true);

            $newDish->save();
        }
    }
}
