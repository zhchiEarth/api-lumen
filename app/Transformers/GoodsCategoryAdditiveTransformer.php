<?php

namespace App\Transformers;

use App\Models\GoodsCategoryAdditive;
use League\Fractal\TransformerAbstract;

class GoodsCategoryAdditiveTransformer extends TransformerAbstract
{
    public function transform(GoodsCategoryAdditive $goodsCategoryAdditive)
    {
        return [
            'additive_id'   => $goodsCategoryAdditive->additive_id,
            'category_id'   => $goodsCategoryAdditive->category_id,
            'additive_name' => $goodsCategoryAdditive->additive_name,
            'created_at'    => $goodsCategoryAdditive->created_at,
            'updated_at'    => $goodsCategoryAdditive->updated_at
        ];
    }
}