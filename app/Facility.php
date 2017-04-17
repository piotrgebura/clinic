<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public function doctors()
    {
    	return $this->belongsToMany('App\Doctor');
    }
}
