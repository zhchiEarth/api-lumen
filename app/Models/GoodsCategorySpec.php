<?php

namespace App\Models;


class GoodsCategorySpec extends BaseModel
{
    protected $primaryKey  = 'spec_id';
    protected $fillable = ['attr_id', 'attribute_value'];
}