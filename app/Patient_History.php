<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_History extends Model
{
    protected $fillable = [
    	'date','patient_id','by','type','from_dep','to_dep','remarks',
    ];

    public function userss()
    {
        return $this->belongsTo('App\Users','by');
    }

    public function dep()
    {
        return $this->belongsTo('App\Departments','from_dep');
    }

    public function deps()
    {
        return $this->belongsTo('App\Departments','to_dep');
    }
}
