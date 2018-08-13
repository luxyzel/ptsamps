<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function categories()
    {
    	return $this->belongsTo('App\Model\Category','category_type','category_type');
    } 
}
