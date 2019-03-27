<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergency_Person extends Model
{
    protected $fillable = [
    	'id','name','phone','cellphone','relationship','email',
    ];
}
