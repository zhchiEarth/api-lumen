<?php

namespace App\Transformers;

use App\Models\GoodsAttr;
use League\Fractal\TransformerAbstract;

class GoodsAttrTransformer extends TransformerAbstract
{
    public function transform(GoodsAttr $goodsAttr)
    {
        return [
            'goods_attr_id'   => $goodsAttr->goods_attr_id,
            'goods_id'        => $goodsAttr->goods_id,
            'attribute_key'   => $goodsAttr->attribute_key,
            'attribute_value' => $goodsAttr->attribute_value,
            'market_price'    => $goodsAttr->market_price,
            'shop_price'      => $goodsAttr->shop_price,
            'supplier_price'  => $goodsAttr->supplier_price,
            'goods_num'       => $goodsAttr->goods_num,
            'weight'          => $goodsAttr->weight,
            'created_at'      => $goodsAttr->created_at,
            'updated_at'      => $goodsAttr->updated_at
        ];
    }
}