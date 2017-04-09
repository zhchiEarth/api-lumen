<?php

namespace App\Transformers;

use App\Models\Goods;
use League\Fractal\TransformerAbstract;

class GoodsTransformer extends TransformerAbstract
{
    public function transform(Goods $goods)
    {
        return [
            'goods_id'        => $goods->goods_id,
            'goods_code'      => $goods->goods_code,
            'user_id'         => $goods->user_id,
            'goods_name'      => $goods->goods_name,
            'one_category_id' => $goods->one_category_id,
            'two_category_id' => $goods->two_category_id,
            'brand_id'        => $goods->brand_id,
            'price'           => bcdiv($goods->price, 100, 2),
            'audit_status'    => $goods->audit_status,
            'sale_count'      => $goods->sale_count,
            'view_count'      => $goods->view_count,
            'comment_count'   => $goods->comment_count,
            'created_at'      => $goods->created_at,
            'updated_at'      => $goods->updated_at
        ];
    }
}