<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
 
    protected $fillable = ['event_id','title','venue','start','end'];
}
