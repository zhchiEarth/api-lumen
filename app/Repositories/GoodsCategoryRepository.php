<?php

namespace App\Repositories;

use App\Models\GoodsCategory;

class GoodsCategoryRepository
{
    use BaseRepository;

    protected $model;

    protected $columns = [
        'category_name' => ['operator' => 'like', 'value' => "%@%"]
    ];

    public function __construct(GoodsCategory $category)
    {
        $this->model = $category;
    }

}