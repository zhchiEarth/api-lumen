<?php

namespace App\Repositories;

use App\Models\GoodsPic;

class GoodsPicRepository
{
    use BaseRepository;

    protected $model;

    protected $columns = [];

    public function __construct(GoodsPic $goodsPic)
    {
        $this->model = $goodsPic;
    }
}