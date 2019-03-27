<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_Informant extends Model
{
    protected $fillable = [
    	'id','name','address','contact',
    ];
}
