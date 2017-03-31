<?php

namespace App\Repositories;

use App\Models\GoodsBrand;

class GoodsBrandRepository
{
    use BaseRepository;

    protected $model;

    protected $columns = [
        'brand_name' => ['operator' => 'like', 'value' => "%@%"]
    ];

    public function __construct(GoodsBrand $goodsBrand)
    {
        $this->model = $goodsBrand;
    }
}