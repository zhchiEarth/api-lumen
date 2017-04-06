<?php

namespace App\Transformers;

use App\Models\GoodsComment;
use League\Fractal\TransformerAbstract;

class GoodsCommentTransformer extends TransformerAbstract
{
    public function transfer(GoodsComment $goodsComment)
    {
        return [
            'comment_id' => $goodsComment->comment_id,
            'goods_id'   => $goodsComment->goods_id,
            'order_id'   => $goodsComment->order_id,
            'user_id'    => $goodsComment->user_id,
            'title'      => $goodsComment->title,
            'content'    => $goodsComment->content,
            'status'     => $goodsComment->status,
            'created_at' => $goodsComment->created_at,
            'updated_at' => $goodsComment->updated_at
        ];
    }
}