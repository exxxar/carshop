 <?php

use AutoKit\Category;
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
        $categories = ["Щётка", "Масло моторное","Масло трансмиссионное","Лампа","Жидкость","Дворники","АКБ"];

        Category::create([
            'title' => 'Масло моторное',
            'alias' => 'engine-parts',
            'menu_id' => 2,
            'img' => 'cat_1_lt_5.jpg'
        ]);
        Category::create([
            'title' => 'Масло трансмиссионное',
            'alias' => 'suspension-parts',
            'menu_id' => 2,
            'img' => 'cat_2_lt_5.jpg'
        ]);
        Category::create([
            'title' => 'Жидкость гидроусилителя',
            'alias' => 'brake-parts',
            'menu_id' => 2,
            'img' => 'cat_3_lt_5.jpg'
        ]);
        Category::create([
            'title' => 'АКБ',
            'alias' => 'steering-parts',
            'menu_id' => 2,
            'img' => 'cat_5_lt_5.jpg'
        ]);
        Category::create([
            'title' => 'Дворники',
            'alias' => 'transmission-parts',
            'menu_id' => 2,
            'img' => 'cat_6_lt_5.jpg'
        ]);
        Category::create([
            'title' => 'Выхлоп',
            'alias' => 'exhaust-parts',
            'menu_id' => 2,
            'img' => 'cat_4_lt_5.jpg'
        ]);
        Category::create([
            'title' => 'Кузов',
            'alias' => 'body-kits',
            'menu_id' => 2,
            'img' => 'cat_7_lt_5.jpg'
        ]);
        Category::create([
            'title' => 'Масло',
            'alias' => 'motor-oil',
            'menu_id' => 2,
            'img' => 'cat_8_lt_5.jpg'
        ]);
        Category::create([
            'title' => 'Видеорегистраторы',
            'alias' => 'dvrs',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Огнетушители',
            'alias' => 'fire-extinguishers',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Коврики',
            'alias' => 'interior-mats',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Шины летние',
            'alias' => 'tires-summer',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Шины зимние',
            'alias' => 'tires-winter',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Шины всесезонные',
            'alias' => 'tires-all-season',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Диски, литые',
            'alias' => 'disks-cast',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Диски, штампованные',
            'alias' => 'disks-pressed',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Передние фары',
            'alias' => 'headlights',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Задние фары',
            'alias' => 'rear-lights',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Противотуманные фары',
            'alias' => 'fog-lights',
            'menu_id' =>2
        ]);
        Category::create([
            'title' => 'Указатели поворотов',
            'alias' => 'direction-indicators',
            'menu_id' => 2
        ]);
        Category::create([
            'title' => 'Бампера',
            'alias' => 'bumper',
            'menu_id' => 2
        ]);
    }
}
