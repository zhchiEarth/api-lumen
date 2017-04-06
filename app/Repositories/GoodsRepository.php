<?php

namespace App\Repositories;

use App\Models\Goods;

class GoodsRepository
{
    use BaseRepository;

    protected $model;

    protected $columns = [];

    public function __construct(Goods $goods)
    {
        $this->model = $goods;
    }
}