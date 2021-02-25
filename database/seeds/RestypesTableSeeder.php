<?php

use Illuminate\Database\Seeder;
use App\Restype;

class RestypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restypes = [
            'pizza',
            'healthy',
            'sushi',
            'ethnic',
            'traditional',
            'chinese',
            'vegan',
            'hamburger',
            'pastry',
            'kebab'
        ];

        foreach ($restypes as $restype) {
            $newRestype = new Restype();

            $newRestype->restypes_status = $restype;

            $newRestype->save();
        }
    }
}
