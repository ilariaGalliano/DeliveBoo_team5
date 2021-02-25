<?php

use Illuminate\Database\Seeder;
use App\Dishtype;

class DishtypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishtypes = [
            'appetizer',
            'main',
            'second',
            'sides',
            'dessert',
            'beverage'
        ];

        foreach ($dishtypes as $dishtype) {
            $newDishtype = new Dishtype();

            $newDishtype->dishtypes_status = $dishtype;

            $newDishtype->save();
        }
    }
}
