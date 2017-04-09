<?php

namespace App\Transformers;

use App\Models\GoodsCategoryAttribute;
use League\Fractal\TransformerAbstract;

class GoodsCategoryAttributeTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'specs',
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

    public function includeSpecs(GoodsCategoryAttribute $goodsCategoryAttribute)
    {
        $specs = $goodsCategoryAttribute->specs;

        return $this->collection($specs, new GoodsCategorySpecTransformer);
    }
}