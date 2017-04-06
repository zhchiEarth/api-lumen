<?php

namespace App\Models;


class GoodsCategoryAttribute extends BaseModel
{
    protected $primaryKey  = 'attr_id';
    protected $fillable = ['category_id', 'attr_name'];

    public function category()
    {
        return $this->hasMany(GoodsCategory::Class, 'category_id');
    }
}