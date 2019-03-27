<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Employees extends Model
{
	use Notifiable;

    protected $fillable = ['employee_id','fname','lname','mname','email','contact','designation','department'];

    public function emp_department()
    {
        return $this->belongsTo('App\Departments','department');
    }
}
