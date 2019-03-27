<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transfer_Requests extends Model
{
	use Notifiable;
	
    protected $fillable = [
    	'transfer_id','from_department','to_department','patient_id','remarks','status',
    ];

    public function transfer_departments()
    {
        return $this->belongsTo('App\Departments','from_department');
    }

    public function transfer_department()
    {
        return $this->belongsTo('App\Departments','to_department');
    }
}
