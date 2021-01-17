<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'title' => 'Все товары', 'alias' => 'all', 'parent_id' => null, 'keywords' => 'all', 'description' => 'all'],
            ['id' => '2', 'title' => 'Дом', 'alias' => 'house', 'parent_id' => null, 'keywords' => 'house', 'description' => 'house'],
            ['id' => '3', 'title' => 'Красота и уход', 'alias' => 'beautiful', 'parent_id' => null, 'keywords' => 'beautiful', 'description' => 'beautiful'],
            ['id' => '4', 'title' => 'Здоровье', 'alias' => 'healf', 'parent_id' => null, 'keywords' => 'healf', 'description' => 'healf'],
            ['id' => '5', 'title' => 'Питание', 'alias' => 'feed', 'parent_id' => null, 'keywords' => 'feed', 'description' => 'feed'],
            ['id' => '6', 'title' => 'Текстиль', 'alias' => 'textil', 'parent_id' => null, 'keywords' => 'textil', 'description' => 'textil'],
            ['id' => '7', 'title' => 'Чаи и напитки', 'alias' => 'teas', 'parent_id' => null, 'keywords' => 'teas', 'description' => 'teas'],
            ['id' => '8', 'title' => 'Новинки и акции', 'alias' => 'news', 'parent_id' => null, 'keywords' => 'news', 'description' => 'news'],
            ['id' => '9', 'title' => 'Бренды', 'alias' => 'brands', 'parent_id' => null, 'keywords' => 'brands', 'description' => 'brands'],
            ['id' => '10', 'title' => 'Средства для стирки', 'alias' => 'deashes', 'parent_id' => '2', 'keywords' => 'deashes', 'description' => 'deashes'],
            ['id' => '11', 'title' => 'Текстиль', 'alias' => 'textil2', 'parent_id' => '2', 'keywords' => 'textil', 'description' => 'textil'],
            ['id' => '12', 'title' => 'Чистящие средства', 'alias' => 'sredstvo', 'parent_id' => '2', 'keywords' => 'sredstvo', 'description' => 'sredstvo'],
            ['id' => '13', 'title' => 'Швабры', 'alias' => 'shvabr', 'parent_id' => '2', 'keywords' => 'shvabr', 'description' => 'shvabr'],
            ['id' => '14', 'title' => 'Восстанавливающий гель', 'alias' => 'royal-london', 'parent_id' => '3', 'keywords' => 'Royal London', 'description' => 'RoyalLondon'],
            ['id' => '15', 'title' => 'Зубные порошки', 'alias' => 'poroshok', 'parent_id' => '3', 'keywords' => 'poroshok', 'description' => 'poroshok'],
            ['id' => '16', 'title' => 'Маски и бустеры', 'alias' => 'maski', 'parent_id' => '3', 'keywords' => 'maski', 'description' => 'maski'],
            ['id' => '17', 'title' => 'Минеральная косметика', 'alias' => 'mineral', 'parent_id' => '3', 'keywords' => 'mineral', 'description' => 'mineral'],
            ['id' => '18', 'title' => 'Натуральное мыло', 'alias' => 'milo', 'parent_id' => '3', 'keywords' => 'milo', 'description' => 'milo'],
            ['id' => '19', 'title' => 'Природный антисептик', 'alias' => 'antisept', 'parent_id' => '3', 'keywords' => 'antisept', 'description' => 'antisept'],
            ['id' => '20', 'title' => 'Текстиль', 'alias' => 'textil3', 'parent_id' => '3', 'keywords' => 'textil', 'description' => 'textil'],
            ['id' => '21', 'title' => 'Уходовая косметика', 'alias' => 'yhodovaya', 'parent_id' => '3', 'keywords' => 'yhodovaya', 'description' => 'yhodovaya'],
            ['id' => '22', 'title' => 'Фитокрема', 'alias' => 'fitocrem', 'parent_id' => '3', 'keywords' => 'fitocrem', 'description' => 'fitocrem'],
            ['id' => '23', 'title' => 'Шампуни и кондиционеры', 'alias' => 'shampoo', 'parent_id' => '3', 'keywords' => 'shampoo', 'description' => 'shampoo'],
            ['id' => '24', 'title' => 'Эфирные масла', 'alias' => 'efir', 'parent_id' => '3', 'keywords' => 'efir', 'description' => 'efir'],
            ['id' => '25', 'title' => 'Аромамасла', 'alias' => 'aromaslo', 'parent_id' => '4', 'keywords' => 'aromaslo', 'description' => 'aromaslo'],
            ['id' => '26', 'title' => 'Биоминеральные комплексы', 'alias' => 'biocomplex', 'parent_id' => '4', 'keywords' => 'biocomplex', 'description' => 'biocomplex'],
            ['id' => '27', 'title' => 'Восстанавливающий гель', 'alias' => 'vostgel', 'parent_id' => '4', 'keywords' => 'vostgel', 'description' => 'vostgel'],
            ['id' => '28', 'title' => 'Генетические тесты', 'alias' => 'gentest', 'parent_id' => '4', 'keywords' => 'gentest', 'description' => 'gentest'],
            ['id' => '29', 'title' => 'Природный антисептик', 'alias' => 'pridanti', 'parent_id' => '4', 'keywords' => 'pridanti', 'description' => 'pridanti'],
            ['id' => '30', 'title' => 'Природный сорбент', 'alias' => 'sorbent', 'parent_id' => '4', 'keywords' => 'sorbent', 'description' => 'sorbent'],
            ['id' => '31', 'title' => 'Растворимые напитки', 'alias' => 'rastnpitk', 'parent_id' => '4', 'keywords' => 'rastnpitk', 'description' => 'rastnpitk'],
            ['id' => '32', 'title' => 'Фульвовые кислоты', 'alias' => 'fulvkislot', 'parent_id' => '4', 'keywords' => 'fulvkislot', 'description' => 'fulvkislot'],
            ['id' => '33', 'title' => 'Функциональное питание', 'alias' => 'funcpit', 'parent_id' => '4', 'keywords' => 'funcpit', 'description' => 'funcpit'],
            ['id' => '34', 'title' => 'Функциональные леденцы', 'alias' => 'funcledenec', 'parent_id' => '4', 'keywords' => 'funcledenec', 'description' => 'funcledenec'],
            ['id' => '35', 'title' => 'Функциональные чаи', 'alias' => 'functea', 'parent_id' => '4', 'keywords' => 'functea', 'description' => 'functea'],
            ['id' => '36', 'title' => 'Функциональное питание', 'alias' => 'funcpeat', 'parent_id' => '5', 'keywords' => 'funcpeat', 'description' => 'funcpeat'],
            ['id' => '37', 'title' => 'Авто', 'alias' => 'avto', 'parent_id' => '6', 'keywords' => 'avto', 'description' => 'avto'],
            ['id' => '38', 'title' => 'Детям', 'alias' => 'kids', 'parent_id' => '6', 'keywords' => 'kids', 'description' => 'kids'],
            ['id' => '39', 'title' => 'Дом', 'alias' => 'dom', 'parent_id' => '6', 'keywords' => 'dom', 'description' => 'dom'],
            ['id' => '40', 'title' => 'Полотенца', 'alias' => 'polotenca', 'parent_id' => '6', 'keywords' => 'polotenca', 'description' => 'polotenca'],
            ['id' => '41', 'title' => 'Спорт', 'alias' => 'sport', 'parent_id' => '6', 'keywords' => 'sport', 'description' => 'sport'],
            ['id' => '42', 'title' => 'Уход', 'alias' => 'yhod', 'parent_id' => '6', 'keywords' => 'yhod', 'description' => 'yhod'],
            ['id' => '43', 'title' => 'Ежедневные чаи', 'alias' => 'everytea', 'parent_id' => '7', 'keywords' => 'everytea', 'description' => 'everytea'],
            ['id' => '44', 'title' => 'Растворимые напитки', 'alias' => 'rastvornapot', 'parent_id' => '7', 'keywords' => 'rastvornapot', 'description' => 'rastvornapot'],
            ['id' => '45', 'title' => 'Функциональные чаи', 'alias' => 'functea2', 'parent_id' => '7', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '46', 'title' => 'Стартовые наборы', 'alias' => 'startpack', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '47', 'title' => 'Aquamagic', 'alias' => 'Aquamagic', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '48', 'title' => 'Aquamatic', 'alias' => 'Aquamatic', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '49', 'title' => 'Balancer', 'alias' => 'Balancer', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '50', 'title' => 'BioTrim', 'alias' => 'BioTrim', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '51', 'title' => 'Foet', 'alias' => 'Foet', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '52', 'title' => 'Healthberry', 'alias' => 'Healthberry', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '53', 'title' => 'Hemp Beauty Collection', 'alias' => 'Hemp', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '54', 'title' => 'iGen', 'alias' => 'iGen', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '55', 'title' => 'Nice Code', 'alias' => 'Nice Code', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '56', 'title' => 'Revitall', 'alias' => 'Revitall', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '57', 'title' => 'Sharme', 'alias' => 'Sharme', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '58', 'title' => 'Sharme-Essential', 'alias' => 'Sharme-Essential', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '59', 'title' => 'TeaVitall', 'alias' => 'TeaVitall', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '60', 'title' => 'Welllab', 'alias' => 'Welllab', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],
            ['id' => '61', 'title' => 'Аксессуары', 'alias' => 'aksessuar', 'parent_id' => '9', 'keywords' => 'functea2', 'description' => 'functea2'],

        ];

        \DB::table('categories')->insert($data);
    }
}
