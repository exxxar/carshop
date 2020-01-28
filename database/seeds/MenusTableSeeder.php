<?php

use Illuminate\Database\Seeder;
use AutoKit\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*  Menu::create([
            'title' => 'Интерьер',
            'alias' => 'interior'
        ]);
        Menu::create([
            'title' => 'Экстерьер',
            'alias' => 'exterior'
        ]);
        Menu::create([
            'title' => 'Оптика',
            'alias' => 'lighting'
        ]);

      */
        Menu::create([
            'title' => 'Запрос по VIN',
            'alias' => 'vin'
        ]);

        Menu::create([
            'title' => 'Запчасти',
            'alias' => 'parts'
        ]);


        Menu::create([
            'title' => 'Оплата и доставка',
            'alias' => 'delivery'
        ]);

        Menu::create([
            'title' => 'Контакты',
            'alias' => 'contacts'
        ]);
        /*
        Menu::create([
            'title' => 'Кузов',
            'alias' => 'body-parts'
        ]);
        */
        Menu::create([
            'title' => 'Блог',
            'alias' => 'blog'
        ]);
    }
}
