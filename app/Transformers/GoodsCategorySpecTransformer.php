<?php

namespace App\Transformers;

use App\Models\GoodsCategorySpec;
use League\Fractal\TransformerAbstract;

class GoodsCategorySpecTransformer extends TransformerAbstract
{
    public function transform(GoodsCategorySpec $goodsCategorySpec)
    {
        return [
            'spec_id'         => $goodsCategorySpec->spec_id,
            'attr_id'         => $goodsCategorySpec->attr_id,
            'attribute_value' => $goodsCategorySpec->attribute_value,
            'created_at'      => $goodsCategorySpec->created_at,
            'updated_at'      => $goodsCategorySpec->updated_at
        ];
    }
}