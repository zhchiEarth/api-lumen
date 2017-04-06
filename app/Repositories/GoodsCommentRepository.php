<?php

namespace App\Repositories;

use App\Models\GoodsComment;

class GoodsCommentRepository
{
    use BaseRepository;

    protected $model;

    protected $columns = [];

    public function __construct(GoodsComment $goodsComment)
    {
        $this->model = $goodsComment;
    }
}