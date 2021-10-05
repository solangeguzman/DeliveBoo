<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Restaurant;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'italiano',
                'img' => '\img\spaghetti.jpg'
            ],
            [
                'name' => 'cinese',
                'img' => '\img\gyoza.jpeg'
            ],
            [
                'name' => 'messicano',
                'img' => '\img\tacos-carne-e-formaggio.jpg'
            ],
            [
                'name' => 'indiano',
                'img' => '\img\curry.jpg'
            ],
            [
                'name' => 'giapponese',
                'img' => '\img\sushi-nigiri-830x625.jpg'
            ],
            [
                'name' => 'americano',
                'img' => '\img\hamburger-di-carne-americano.jpg'
            ]
        ];


        $restaurants = [
            [
                'name' => 'Da Carlo',
                'address' => 'Via PoggiBonzi, 3',
                'img' => '\img\dacarlo.jpg',
                'type' => 'it'
            ],
            [
                'name' => 'La Capannina',
                'address' => 'Via Roma, 7',
                'img' => '\img\pippo.jpg',
                'type' => 'it'
            ],
            [
                'name' => 'Shaolin',
                'address' => 'Corso Umberto, 10',
                'img' => '\img\baudo.jpg',
                'type' => 'cn'
            ],
            [
                'name' => 'Oriente',
                'address' => 'Via Rossi, 27',
                'img' => '\img\marcogiordano.jpg',
                'type' => 'cn'
            ],
            [
                'name' => 'La Siesta',
                'address' => 'Via Paoli, 133',
                'img' => '\img\unnamed.jpg',
                'type' => 'mx'
            ],
            [
                'name' => 'Casa Sanchez',
                'address' => 'Via Verdi, 213',
                'img' => '\img\sala-mexican.jpg',
                'type' => 'mx'
            ],
            [
                'name' => 'Los Amigos',
                'address' => 'Vicolo SantoDomingo, 46',
                'img' => '\img\mexico.jpg',
                'type' => 'mx'
            ],
            [
                'name' => 'Habanero',
                'address' => 'Corso Giuseppe, 10',
                'img' => '\img\ciao.jpg',
                'type' => 'mx'
            ],
            [
                'name' => 'Thaijime Hale',
                'address' => 'Corso Giuseppe, 13',
                'img' => '\img\unnamed2.jpg',
                'type' => 'ind'
            ],
            [
                'name' => 'Oishi',
                'address' => 'Via Nuovo Ponente, 3b',
                'img' => '\img\marcogiordano.jpg',
                'type' => 'jp'
            ],
            [
                'name' => 'Sakura',
                'address' => 'Via Vecchio Ponente, 1c',
                'img' => '\img\baudo.jpg',
                'type' => 'jp'
            ],
            [
                'name' => 'Yuxi',
                'address' => 'Via Franchi, 27',
                'img' => '\img\dacarlo.jpg',
                'type' => 'jp'
            ],
            [
                'name' => 'Five Guys',
                'address' => 'Via De Gasperi, 43',
                'img' => '\img\Five-Guys.jpg',
                'type' => 'us'
            ],
            [
                'name' => 'American Graffiti',
                'address' => 'Via Maqueda, 29',
                'img' => '\img\america-graffiti.png',
                'type' => 'us'
            ],
            [
                'name' => 'Burger King',
                'address' => 'Via Fermi, 4',
                'img' => '\img\Burger_King.jpg',
                'type' => 'us'
            ],
            [
                'name' => 'McDonald',
                'address' => 'Via Nazionale Appia, 1',
                'img' => '\img\mcdonald.jpg',
                'type' => 'us'
            ],

        ];


        $categoriesID = [];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category['name'];
            $newCategory->img = $category['img'];
            $newCategory->save();
            $categoriesID[] = $newCategory->id;
        };

        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->img = $restaurant['img'];
            $newRestaurant->save();

            if ($restaurant['type'] == 'it') {
                $newRestaurant->category()->attach(1);
            };
            if ($restaurant['type'] == 'cn') {
                $newRestaurant->category()->attach(2);
            };
            if ($restaurant['type'] == 'mx') {
                $newRestaurant->category()->attach(3);
            };
            if ($restaurant['type'] == 'ind') {
                $newRestaurant->category()->attach(4);
            };
            if ($restaurant['type'] == 'jp') {
                $newRestaurant->category()->attach(5);
            };
            if ($restaurant['type'] == 'us') {
                $newRestaurant->category()->attach(6);
            }
        }
    }
}
