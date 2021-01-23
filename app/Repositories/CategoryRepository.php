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
    public function getTree(): array
    {
        return $this->createTree(Category::all()->toArray());
    }

    /**
     * Create Tree
     *
     * @return array
     */
    private function createTree(array $arr): array {
        $parents_arr = array();
        foreach($arr as $key => $item) {

            $parents_arr[$item['parent_id']][$item['id']] = $item;
        }

        $treeElem = $parents_arr[''];
        $this->generateElemTree($treeElem, $parents_arr);

        return $treeElem;
    }

    /**
     * Generate Element Tree
     *
     * @return array
     */
    private function generateElemTree(array &$treeElem, array $parents_arr) {
        foreach ($treeElem as $key => $item) {
            if(!isset($item['children'])) {
                $treeElem[$key]['children'] = array();
            }

            if (array_key_exists($key, $parents_arr)) {
                $treeElem[$key]['children'] = $parents_arr[$key];
                $this->generateElemTree($treeElem[$key]['children'], $parents_arr);
            }
        }
    }
}
