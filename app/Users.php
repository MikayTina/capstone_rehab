<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Users extends Model 
{
    use Notifiable;

     protected $fillable = [
        'user_id','fname','lname','username','password','contact','email', 'role', 'designation','department',
    ];

    public function user_departments()
    {
        return $this->belongsTo('App\Departments', 'department');
    }

     public function user_roles()
    {
        return $this->belongsTo('App\User_roles', 'role');
    }
}
