<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  	public function brands()
    {
    	return $this->hasMany('App\Model\Brand');
    } 

	public function assets()
    {
    	return $this->hasMany('App\Model\Asset');
    } 

}
