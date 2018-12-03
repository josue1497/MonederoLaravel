<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Alimentación','Transporte', 'Internet',
    'Energia Electrica', 'Netflix', 'Ropa', 'Comida'];

    foreach($names as $name){
        $category = \App\Category::create(['name' => $name]);
    }
    }
}
