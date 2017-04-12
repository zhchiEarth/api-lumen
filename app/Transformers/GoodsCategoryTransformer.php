<?php

namespace App\Transformers;

use App\Models\GoodsCategory;
use League\Fractal\TransformerAbstract;

class GoodsCategoryTransformer extends TransformerAbstract
{
    public function transform(GoodsCategory $category)
    {
        $data = [
                'category_id'   => $category->category_id,
                'category_name' => $category->category_name,
                'category_code' => $category->category_code,
                'category_logo' => $category->category_logo,
                'parent_id'     => $category->parent_id,
                'level'         => $category->level,
                'status'        => $category->status ? true : false,
                'weight'        => $category->weight,
                'created_at'    => $category->created_at,
                'updated_at'    => $category->updated_at
        ];

        if ($category->level == 1) {
             $data['children'] = [];
        }
        return $data;
    }
}