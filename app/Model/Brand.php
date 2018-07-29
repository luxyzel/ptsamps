<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function categories()
    {
    	return $this->belongsTo('App\Model\Category');
    } 
}
