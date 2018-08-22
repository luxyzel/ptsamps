<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function procures()
    {
    	return $this->hasMany('App\Model\Procure');
    } 
}
