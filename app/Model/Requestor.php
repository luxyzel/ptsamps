<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Requestor extends Model
{
    public function procures()
    {
    	return $this->hasMany('App\Model\Procure');
    } 
}
