<?php

namespace App\Repositories;

use App\Models\GoodsCategorySpec;

class GoodsCategorySpecRepository
{
    use BaseRepository;

    protected $model;

    protected $columns = [];

    public function __construct(GoodsCategorySpec $goodsCategorySpec)
    {
        $this->model = $goodsCategorySpec;
    }
}