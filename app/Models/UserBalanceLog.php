<?php

namespace App\Models;


class UserBalanceLog extends BaseModel
{
	protected $primaryKey = 'balance_id';
	protected $fillable = ['user_id', 'source', 'source_sn', 'amount'];
}