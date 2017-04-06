<?php

namespace App\Models;

class GoodsCategoryAdditive extends BaseModel
{
    protected $primaryKey  = 'additive_id';
    protected $fillable = ['category_id', 'additive_name'];

    public function category()
    {
        return $this->belongsTo(GoodsCategory::Class);
    }

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
}