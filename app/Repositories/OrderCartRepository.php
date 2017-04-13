<?php

namespace App\Repositories;

use App\Models\OrderCart;

class OrderCartRepository
{
	use BaseRepository;
	
	protected $model;
	
	protected $columns = [];
	
	public function __construct(OrderCart $cart)
	{
		$this->model = $cart;
	}
}