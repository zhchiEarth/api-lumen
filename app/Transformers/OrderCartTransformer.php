<?php

namespace App\Transformers;

use App\Models\OrderCart;
use League\Fractal\TransformerAbstract;

class OrderCartTransformer extends TransformerAbstract
{
	public function transform(OrderCart $cart)
	{
		return [
			'user_id'       => $cart->id,
			'goods_attr_id' => $cart->goods_attr_id,
			'goods_image'   => $cart->goods_image,
			'price'         => $cart->price,
			'number'        => $cart->number,
			'created_at'    => $cart->created_at,
			'updated_at'    => $cart->updated_at
		];
	}
}