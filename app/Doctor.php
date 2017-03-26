<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function Specialization()
    {

    	return $this->belongsTo('App\Specialization');
    }
}
