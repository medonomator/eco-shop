<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [];
        $count = 100;

        for ($i = 0; $i < $count; $i++) {
            $products[] = [
                'category_id' => rand(1, 9),
                'brand_id' => rand(1, 10),
                'title' => 'Sharme Essential Бергамот',
                'alias' =>  $i . 'casio-mrp-700-1avefff123',
                'content' => 'Эфирное масло бергамота (от лат. citrus bergamia) обладает множеством полезных свойств для организма: устраняет проблемы жирной кожи, снимает воспаления, раздражение и шелушение, осветляет и тонизирует кожу, помогает при герпесе и угревой сыпи, купирует отеки. Более того, оно успешно применяется для борьбы с целлюлитом.
                Являясь прекрасным антисептиком, оно повышает иммунитет, избавляет от жара, помогает при мышечных болях, эффективно действует при спазмах и отеках, улучшает пищеварение.
                Таинственный, терпкий, горьковато-дымный аромат бергамота вдохновляет и дарует жизненные силы.',
                'price' => rand(100, 500),
                'old_price' => rand(100, 500),
                'status' => '1',
                'keywords' => 'watch',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                'img' => '1.jpg',
            ];

            $products[] = [
                'category_id' => rand(1, 9),
                'brand_id' => rand(1, 10),
                'title' => 'Sharme Essential Герань',
                'alias' =>  $i . 'casio-mrp-700-1avefff123',
                'content' => 'Эфирное масло бергамота (от лат. citrus bergamia) обладает множеством полезных свойств для организма: устраняет проблемы жирной кожи, снимает воспаления, раздражение и шелушение, осветляет и тонизирует кожу, помогает при герпесе и угревой сыпи, купирует отеки. Более того, оно успешно применяется для борьбы с целлюлитом.
                Являясь прекрасным антисептиком, оно повышает иммунитет, избавляет от жара, помогает при мышечных болях, эффективно действует при спазмах и отеках, улучшает пищеварение.
                Таинственный, терпкий, горьковато-дымный аромат бергамота вдохновляет и дарует жизненные силы.',
                'price' => rand(100, 500),
                'old_price' => rand(100, 500),
                'status' => '1',
                'keywords' => 'watch',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                'img' => '1.jpg',
                // 'hit' => rand(0, 1),
            ];

            $products[] = [
                'category_id' => rand(1, 9),
                'brand_id' => rand(1, 10),
                'title' => 'Sharme Essential Грейпфрут',
                'alias' =>  $i . 'casio-mrp-700-1avefff123',
                'content' => 'Эфирное масло бергамота (от лат. citrus bergamia) обладает множеством полезных свойств для организма: устраняет проблемы жирной кожи, снимает воспаления, раздражение и шелушение, осветляет и тонизирует кожу, помогает при герпесе и угревой сыпи, купирует отеки. Более того, оно успешно применяется для борьбы с целлюлитом.
                Являясь прекрасным антисептиком, оно повышает иммунитет, избавляет от жара, помогает при мышечных болях, эффективно действует при спазмах и отеках, улучшает пищеварение.
                Таинственный, терпкий, горьковато-дымный аромат бергамота вдохновляет и дарует жизненные силы.',
                'price' => rand(100, 500),
                'old_price' => rand(100, 500),
                'status' => '1',
                'keywords' => 'watch',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.',
                'img' => '1.jpg',
                // 'hit' => rand(0, 1),
            ];
        }


        \DB::table('products')->insert($products);
    }
}
