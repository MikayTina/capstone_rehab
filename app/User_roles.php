<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User_roles extends Model
{
	use Notifiable;

    protected $fillable = [
        'name','description'
    ];
}
