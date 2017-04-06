<?php

namespace App\Repositories;

use App\Models\GoodsCategoryAttribute;

class GoodsCategoryAttributeRepository
{
    use BaseRepository;

    protected $model;

    protected $columns = [
        'attr_name' => ['operator' => 'like', 'value' => "%@%"]
    ];

    public function __construct(GoodsCategoryAttribute $goodsCategoryAttribute)
    {
        $this->model = $goodsCategoryAttribute;
    }
}