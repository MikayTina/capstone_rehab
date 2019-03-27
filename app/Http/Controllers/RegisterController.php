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

class RegisterController extends Controller 
{
    public function registernow(request $request)
    {
     $id = rand();

      $validation = $this->validate($request,[
        'username' =>'required|unique:users',
        'contact'=>'required|unique:users',
        'email' => 'required|unique:users'
      ]);

      if(!$validation){
        $errors = new MessageBag(['username' => ['Username should be unique']]);
           return Redirect::back()->withErrors($errors)->withInput(Input::all());
      }
      else{

    	$user = new Users([
            'user_id' => $id,
    		'fname' => $request->input('fname'),
    		'lname' => $request->input('lname'),
    		'username' => $request->input('username'),
    		'password' => Hash::make($request->input('password')),
    		'contact' => $request->input('contact'),
    		'email' => $request->input('email'),
    		'role' => $request->input('roleid'),
            'designation' => $request->input('designation'),
    		'department' => $request->input('department'),
    	]);


            $user->save();

        }

        $users = Users::where('user_id',$id)->with('user_departments')->with('user_roles')->get();

        foreach($users as $usz)
        {
            
        }

        $allusers = Users::all();

        Notification::send($allusers, new MyNotifications($usz));

    	Session::flash('alert-class', 'success'); 
		flash('User Created', '')->overlay();

        $roles = User_roles::all();
        $deps = Departments::all();
        $rolex = User_roles::find($request->input('roleid'));
        $urole = Users::where('role',$request->input('roleid'))->with('user_departments')->with('user_roles')->get();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.showusers')->with('roles',$roles)->with('deps',$deps)->with('rolex',$rolex)->with('urole' ,$urole)->with('users',$users)->with('transfer',$transfer);
        }
        else if (Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.showusers')->with('roles',$roles)->with('deps',$deps)->with('rolex',$rolex)->with('urole' ,$urole)->with('users',$users)->with('transfer',$transfer);
        }


    }

    public function register_role(request $request)
    {
        

        $role = new User_roles([
            'name' => $request->input('rname'),
            'description' => $request->input('rdesc')
        ]);

        $role->save();

        Session::flash('alert-class', 'success'); 
		flash('Role Created', '')->overlay();

		$roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.chooseuser')->with('roles',$roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.chooseuser')->with('roles',$roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
        }
    }

    public function register_dep(request $request)
    {


        $role = new Departments([
            'department_name' => $request->input('depname'),
            'description' => $request->input('depdesc')
        ]);

        $role->save();

        Session::flash('alert-class', 'success'); 
		flash('Department Created', '')->overlay();

		$roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

      if(Auth::user()->user_role()->first()->name == 'Superadmin'){
        return view('superadmin.postcreatedep')->with('roles',$roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
      }
      elseif(Auth::user()->user_role()->first()->name == 'Admin'){
        return view('admin.postcreatedep')->with('roles',$roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
      }
    }

    public function newemployee()
    {

        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.createemployee')->with('roles',$roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('superadmin.createemployee')->with('roles',$roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
        }

    }

    public function create_employee(Request $request)
    {

        $id = rand();

        $validation = $this->validate($request,[
        'contact'=>'required|unique:employees',
        'email' => 'required|unique:employees'
        ]);

      if(!$validation){
        $errors = new MessageBag(['contact' => ['Username should be unique']]);
           return Redirect::back()->withErrors($errors)->withInput(Input::all());
      }
      else{

        $employee = new Employees([
            'employee_id' => $id,
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'mname' => $request->input('mname'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'designation' => $request->input('designation'),
            'department' => $request->input('department'),
        ]);

        $employee->save();

        }

        Session::flash('alert-class', 'success'); 
        flash('Employee Created', '')->overlay();


        $roles = User_roles::all();
         $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();
        $emp = Employees::all();


        
       if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.showemployees')->with('roles' , $roles)->with('deps',$deps)->with('emp' ,$emp)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.showemployees')->with('roles' , $roles)->with('deps',$deps)->with('emp' ,$emp)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.showemployees')->with('roles' , $roles)->with('deps',$deps)->with('emp' ,$emp)->with('users',$users)->with('transfer',$transfer);
        }
    }

}
