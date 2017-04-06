<?php

namespace App\Transformers;

use App\Models\GoodsCategoryAttribute;
use League\Fractal\TransformerAbstract;

class GoodsCategoryAttributeTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'category',
    ];

    public function transform(GoodsCategoryAttribute $goodsCategoryAttribute)
    {
        return [
            'attr_id'     => $goodsCategoryAttribute->attr_id,
            'category_id' => $goodsCategoryAttribute->category_id,
            'attr_name'   => $goodsCategoryAttribute->attr_name,
            'created_at'  => $goodsCategoryAttribute->created_at,
            'updated_at'  => $goodsCategoryAttribute->updated_at
        ];
    }

    public function includeCategory(GoodsCategoryAttribute $goodsCategoryAttribute)
    {
        $category = $goodsCategoryAttribute->category;

        return $this->item($category, new GoodsCategoryTransformer());
    }
}