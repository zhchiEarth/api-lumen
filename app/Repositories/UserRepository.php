<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
	use BaseRepository;
	
	protected $model;
	
	protected $columns = [];
	
	public function __construct(User $user)
	{
		$this->model = $user;
	}
}