<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = ['updated_at'];

    protected $dates = ['created_at', 'updated_at'];
}