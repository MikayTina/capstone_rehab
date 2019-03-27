<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MyNotifications;
use Auth;
use DB;
use App\Users;
use App\User_roles;
use App\Departments;
use App\Patients;
use App\Transfer_Requests;
use Notifications;
use Hash;
use Session;

class LoginController extends Controller
{

    public function home(request $request) 
    {

      $roles = User_roles::all();
      $deps = Departments::all();
  

      if(Auth::check()){
        return redirect()->route('user.dashboard')->with('roles',$roles)->with('deps',$deps)->with('users',$users);
      }
      else{
        return redirect('/login')->with('roles',$roles)->with('deps',$deps);
      }
    }

    public function loginnow(request $request)
    {
        $this->validate($request,[
        'username' =>'required',
        'password'=>'required'
      ]);

       $roles = User_roles::all();
       $deps = Departments::all(); 
      

      if(Auth::attempt(['username'=>$request->input('username'), 'password'=>$request->input('password')]))
        {
          return redirect()->route('user.dashboard')->with('roles',$roles)->with('deps',$deps);
        }
        else{
          $errors = new MessageBag(['password' => ['Username and/or password invalid.']]);
           return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
        }
    }

    public function login()
    {

      $roles = User_roles::all();
      $deps = Departments::all();
      $users = Users::find(Auth::user()->id);


      if(Auth::check()){
        return redirect()->route('user.dashboard')->with('roles',$roles)->with('deps',$deps)->with('users',$users);
      }
      else{
        return redirect('/login')->with('roles',$roles)->with('deps',$deps);
      }
    }

    public function logout()
    {

      $roles = User_roles::all();
      Auth::logout(); 
      return redirect()->route('login')->with('roles',$roles);
    }

    public function getProfile()
    {
      $roles = User_roles::all();
      $deps = Departments::all();
      $users = Users::find(Auth::user()->id);
      $transfer = Transfer_Requests::all();
      $userss = Patients::where('department_id', Auth::user()->department)->get();
      
      if(Auth::user()->user_role()->first()->name == 'Superadmin'){
        return view('superadmin.index')->with('roles',$roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
      }
      else if(Auth::user()->user_role()->first()->name == 'Admin'){
         return view('admin.index')->with('roles',$roles)->with('deps',$deps)->with('userss',$userss);
      }
      else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
         return view('socialworker.index')->with('roles',$roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
      }
      else if(Auth::user()->user_role()->first()->name == 'Nurse'){
         return view('socialworker.index')->with('roles',$roles)->with('deps',$deps)->with('users',$users);
      }
      else if(Auth::user()->user_role()->first()->name == 'Doctor'){
         return view('doctor.index')->with('roles',$roles)->with('deps',$deps)->with('users',$users);
      }
      
    }
}
