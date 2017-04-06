<?php

namespace App\Repositories;

use App\Models\GoodsCategoryAdditive;

class GoodsCategoryAdditiveRepository
{
    use BaseRepository;

    protected $model;

    protected $columns = [
        'additive_name' => ['operator' => 'like', 'value' => "%@%"]
    ];

    public function __construct(GoodsCategoryAdditive $goodsCategoryAdditive)
    {
        $this->model = $goodsCategoryAdditive;
    }
}