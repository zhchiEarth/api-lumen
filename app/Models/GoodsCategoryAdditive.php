<?php

namespace App\Models;


class GoodsCategoryAdditive extends BaseModel
{
    protected $primaryKey  = 'additive_id';
    protected $fillable = ['category_id', 'additive_name'];
}