<?php

namespace App\Models;


class GoodsBrand extends BaseModel
{
    protected $primaryKey  = 'brand_id';
    protected $fillable = ['brand_name', 'telephone', 'brand_web', 'brand_logo', 'brand_desc', 'status', 'weight'];
}