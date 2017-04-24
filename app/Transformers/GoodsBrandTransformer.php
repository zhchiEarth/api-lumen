<?php

namespace App\Transformers;

use App\Models\GoodsBrand;
use League\Fractal\TransformerAbstract;

class GoodsBrandTransformer extends TransformerAbstract
{
    public function transform(GoodsBrand $goodsBrand)
    {
        return [
            'brand_id'   => $goodsBrand->brand_id,
            'brand_name' => $goodsBrand->brand_name,
            'telephone'  => $goodsBrand->telephone,
            'brand_web'  => $goodsBrand->brand_web,
            'brand_logo' => $goodsBrand->brand_logo,
            'brand_desc' => $goodsBrand->brand_desc,
            'status'     => $goodsBrand->status ? true : false,
            'weight'     => $goodsBrand->weight,
//            'created_at' => $goodsBrand->created_at ? $goodsBrand->created_at->toDateTimeString : '',
        ];
    }
}