<?php

namespace App\Models;


class Region extends BaseModel
{
	protected $primaryKey  = 'region_id';
	protected $fillable = ['region_name', 'province_name', 'city_name', 'parent_id', 'region_level'];
}