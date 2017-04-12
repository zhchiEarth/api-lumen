<?php

namespace App\Transformers;

use App\Models\Region;
use League\Fractal\TransformerAbstract;

class RegionTransformer extends TransformerAbstract
{
	public function transform(Region $region)
	{
		return [
			'region_id'     => $region->region_id,
			'region_name'   => $region->region_name,
			'province_name' => $region->province_name,
			'city_name'     => $region->city_name,
			'parent_id'     => $region->parent_id,
			'region_level'  => $region->region_level,
			'created_at'    => $region->created_at,
			'updated_at'    => $region->updated_at
		];
	}
}