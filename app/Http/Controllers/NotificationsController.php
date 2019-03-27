<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MyNotifications;
use App\Notifications\MySecondNotification;
use Auth;
use DB;
use App\Users;
use App\User_roles;
use App\Departments;
use App\Patients;
use App\Address;
use App\Emergency_Persons;
use App\Patient_Intake_Information;
use App\Patient_Informant;
use App\Patient_Information;
use Notification;
use Hash;
use Session;

class NotificationsController extends Controller
{
    public function markAsRead()
    {
    	$users = Users::find(Auth::user()->id);

    	$users->unreadNotifications->markAsRead(Auth::user()->id);

    	return redirect()->back();
    }
}
