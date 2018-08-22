<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function groups()
    {
    	return $this->belongsTo('App\Model\Group_number','group_id','id');
    } 

    public function pos()
    {
    	return $this->belongsTo('App\Model\Po_number','po_id','id');
    } 
}
