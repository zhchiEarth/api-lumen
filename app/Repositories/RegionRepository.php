<?php

namespace App\Repositories;

use App\Models\Region;

class RegionRepository
{
	use BaseRepository;
	
	protected $model;
	
	protected $columns = [];
	
	public function __construct(Region $region)
	{
		$this->model = $region;
	}
}