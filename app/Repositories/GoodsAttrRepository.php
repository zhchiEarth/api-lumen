<?php

namespace App\Repositories;

use App\Models\GoodsAttr;

class GoodsAttrRepository
{
    use BaseRepository;

    protected $model;

    protected $columns = [];

    public function __construct(GoodsAttr $goodsAttr)
    {
        $this->model = $goodsAttr;
    }
}