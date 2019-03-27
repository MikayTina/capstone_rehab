<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_Informant extends Model
{
    protected $fillable = [
    	'informant_id','name','address','contact',
    ];
}
