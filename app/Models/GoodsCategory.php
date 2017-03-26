<?php

namespace App\Models;


class GoodsCategory extends BaseModel
{
    protected $fillable = ['category_name', 'category_code', 'category_logo', 'parent_id', 'level', 'status'];
}