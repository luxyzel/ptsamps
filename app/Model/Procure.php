<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Procure extends Model
{
    public function groups()
    {
    	return $this->belongsTo('App\Model\Group_number','group_id','id');
    } 

    public function pos()
    {
    	return $this->belongsTo('App\Model\Po_number','po_id','id');
    }

     public function vendors()
    {
    	return $this->belongsTo('App\Model\Vendor','vendor_id','id');
    }

    public function requestors()
    {
        return $this->belongsTo('App\Model\Requestor','requestor_id','id');
    }


    public function ponumbers()
    {
        return $this->belongsTo('App\Model\Po_number','po_id','id');
    }  

    public function payments()
    {
        return $this->belongsTo('App\Model\Payment','po_id','po_id');
    } 

    public function approvers()
    {
        return $this->belongsTo('App\User','approver_id','id');
    }
}
