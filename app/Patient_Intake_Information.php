<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_Intake_Information extends Model
{
    protected $fillable = [
    	'patient_id','emergency_id','educational_attainment','employment_status','spouse','father','mother','presenting_problems','impression','date',
    ];
}
