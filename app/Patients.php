<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
	protected $fillable = [
		'fname','lname','mname','age','birthdate','birthorder','address_id','contact','gender','civil_status','nationality','religion','case','submission','department_id','flag',
	];

	 public function departments()
    {
        return $this->belongsTo('App\Departments','department_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Address','address_id');
    }
}
