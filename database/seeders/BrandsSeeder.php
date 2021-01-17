<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'title' => 'Aquamagic',
                'alias' => 'aquamagic',
                'img' => 'brand_5.png',
                'description' => 'Новая технология чистоты без химии'
            ],
            [
                'id' => '2',
                'title' => 'AVITALL',
                'alias' => 'avitall',
                'img' => 'brand_3.png',
                'description' => 'Коктейли для коррекции привычек питания'
            ],
            [
                'id' => '3',
                'title' => 'BIOTRIM',
                'alias' => 'biotrim',
                'img' => 'brand_11.png',
                'description' => 'Чистящие средства'
            ],
            [
                'id' => '4',
                'title' => 'ECOPAM',
                'alias' => 'ecopam',
                'img' => 'brand_13.png',
                'description' => 'Биологически активные добавки'
            ],
            [
                'id' => '5',
                'title' => 'HEALTHBERRY',
                'alias' => 'healthberry',
                'img' => 'brand_2.png',
                'description' => 'Растворимые напитки и леденцы'
            ],
            [
                'id' => '6',
                'title' => 'IGEN',
                'alias' => 'igen',
                'img' => 'brand_1.png',
                'description' => 'Генетические тесты для домашнего использования'
            ],
            [
                'id' => '7',
                'title' => 'REVITALL',
                'alias' => 'revitall',
                'img' => 'brand_12.png',
                'description' => 'Оздоровительные программы для всего организма'
            ],
            [
                'id' => '8',
                'title' => 'SHARME',
                'alias' => 'sharme',
                'img' => 'brand_7.png',
                'description' => 'Линия сухой косметики и питательных кремов'
            ],
            [
                'id' => '9',
                'title' => 'SHARME ESSENTIAL',
                'alias' => 'sharme_essential',
                'img' => 'brand_8.png',
                'description' => 'Натуральные аромамасла для широкого применения'
            ],
            [
                'id' => '10',
                'title' => 'TEAVITALL',
                'alias' => 'teavitall',
                'img' => 'brand_6.png',
                'description' => 'Изысканная коллекция чайных напитков'
            ],

        ];

        \DB::table('brands')->insert($data);
    }
}
