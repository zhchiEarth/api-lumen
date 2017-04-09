<?php

namespace App\Models;


class GoodsCategoryAttribute extends BaseModel
{
    protected $primaryKey  = 'attr_id';
    protected $fillable = ['category_id', 'attr_name'];

    public function specs()
    {
        return $this->hasMany(GoodsCategorySpec::Class, 'attr_id');
    }
}