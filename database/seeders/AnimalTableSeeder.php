<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Seeder;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Animal::create([
            'name'=>'Gato',
            'type'=>'Felino',
            'description'=>'Negro con ojos grandes',
            'image'=>'gato.jpg',
        ]);
        $user = Animal::create([
            'name'=>'Perro',
            'type'=>'Canido',
            'description'=>'Blanco con manchas cafes',
            'image'=>'perro.png',
        ]);
        $user = Animal::create([
            'name'=>'Lobo',
            'type'=>'Canido',
            'description'=>'Blanco y muy grande',
            'image'=>'lobo.jpg',
        ]);
        $user = Animal::create([
            'name'=>'Pez Rojo',
            'type'=>'Carpa',
            'description'=>'Su tono varia entre rojo y dorado con aletas',
            'image'=>'pez.png',
        ]);
    }
}
