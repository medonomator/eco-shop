<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository  
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function getTree()
    {
        function createTree($arr) {
            $parents_arr = array();
            foreach($arr as $key => $item) {

                $parents_arr[$item['parent_id']][$item['id']] = $item;
            }

            $treeElem = $parents_arr[''];
            generateElemTree($treeElem, $parents_arr);

            return $treeElem;
        }

        function generateElemTree(&$treeElem, $parents_arr) {
            foreach ($treeElem as $key => $item) {
                if(!isset($item['children'])) {
                    $treeElem[$key]['children'] = array();
                }

                if (array_key_exists($key, $parents_arr)) {
                    $treeElem[$key]['children'] = $parents_arr[$key];
                    generateElemTree($treeElem[$key]['children'], $parents_arr);
                }
            }
        }
         
        return createTree(Category::all()->toArray());
    }
}
