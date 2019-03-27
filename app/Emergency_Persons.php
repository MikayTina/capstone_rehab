<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergency_Persons extends Model
{
    protected $fillable = [
    	'emergency_id','name','phone','cellphone','relationship','email',
    ];
}
