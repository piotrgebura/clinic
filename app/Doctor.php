<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function specialization()
    {
    	return $this->belongsTo('App\Specialization');
    }

    public function facilities()
    {
    	return $this->belongsToMany('App\Facility');
    }
}
