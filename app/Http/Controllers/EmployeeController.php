<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MyNotifications;
use Auth;
use DB;
use App\Users;
use App\User_roles;
use App\Departments;
use App\Transfer_Requests;
use App\Employees;
use Notification;
use Hash;
use Session;

class EmployeeController extends Controller
{
    public function update_employeenow(Request $request)
    {
    	$employee = Employees::find($request->userid);
    	$employee->update($request->all());

    	Session::flash('alert-class', 'success'); 
		flash('Successfully Updated', '')->overlay();
 
		return redirect()->back();

    }

    public function delete_employeenow(Request $request)
	{
		$deleteuser = Employees::findorfail($request->employee_id);
		$deleteuser->delete();
	

		Session::flash('alert-class', 'danger'); 
		flash('Employee Deleted', '')->overlay();

		return back();
	}
}
