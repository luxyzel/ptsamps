<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Po_number extends Model
{
    public function procures()
    {
    	return $this->hasMany('App\Model\Procure');
    }

    public function payments()
    {
    	return $this->hasMany('App\Model\Payment');
    } 

}
