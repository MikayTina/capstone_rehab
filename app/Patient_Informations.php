<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_Information extends Model
{
    protected $fillable = [
    	'patient_id','informant_id','referred_by','drugs_abused','chief_complaint','h_present_illness','h_drug_abuse','famper_history',
    ];
}
