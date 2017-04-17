<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    public function doctors()
    {
    	return $this->hasMany('App\Doctor');
    }
}
