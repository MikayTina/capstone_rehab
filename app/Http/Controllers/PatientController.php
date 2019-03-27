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
use App\Notifications\MySecondNotification;
use App\Notifications\MyThirdNotifications;
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
use App\Transfer_Requests;
use App\Patient_History;
use Notification;
use Hash;
use Session;

class PatientController extends Controller
{
    public function addpatient()
    {
    	$roles = User_roles::all();
		$deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

    	return view('superadmin.addpatient')->with('roles',$roles)->with('deps',$departmentsps)->with('users',$users)->with('transfer',$transfer);
    }

    public function refer()
    {
    	$roles = User_roles::all();
		$deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

    	return view('superadmin.refpatient')->with('roles',$roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
    }

    public function showpatient()
    {
        $pat = Patients::with('departments')->with('address')->get();
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.showpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.showpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.showpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('transfer',$transfer);
        }
    }

    public function viewpatient($id)
    {   
        $pid = 0;
        $pat = Patients::where('id',$id)->get();
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();
        $history = Patient_History::where('patient_id',$id)->get();

        $notif = DB::table('notifications')->where('notifiable_id',Auth::user()->id)->update(['read_at' => date('Y-m-d')]);

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfer',$transfer)->with('history',$history);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfer',$transfer)->with('history',$history);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfer',$transfer)->with('history',$history);
        }

    }

    public function viewpatients($id,$pid,$tid)
    {
        $pat = Patients::where('id',$id)->get();
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfers = Transfer_Requests::where('transfer_id',$tid)->get();
        $transfer = Transfer_Requests::all();
        $history = Patient_History::where('patient_id',$id)->get();


        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfers',$transfers)->with('transfer',$transfer)->with('history',$history);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfers',$transfers)->with('transfer',$transfer)->with('history',$history);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfers',$transfers)->with('transfer',$transfer)->with('history',$history);
        }
    }

    public function viewpatientz($id,$nid)
    {
        $pid = 0;
        $pat = Patients::where('id',$id)->get();
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();
        $history = Patient_History::where('patient_id',$id)->get();

        $notif = DB::table('notifications')->where('id',$nid)->update(['read_at' => date('Y-m-d')]);

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfer',$transfer)->with('history',$history);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfer',$transfer)->with('history',$history);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfer',$transfer)->with('history',$history);
        }
    }

    public function patientdep()
    {
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();


        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.patientdep')->with('roles' , $roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.patientdep')->with('roles' , $roles)->with('deps',$deps)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            $id = Auth::user()->department;
            return view('socialworker.chooseform')->with('roles' , $roles)->with('deps',$deps)->with('id',$id)->with('users',$users)->with('transfer',$transfer);
        }
    }

    public function chooseform($id)
    {
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

         if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.patientform')->with('roles' , $roles)->with('deps',$deps)->with('id',$id)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.patientform')->with('roles' , $roles)->with('deps',$deps)->with('id',$id)->with('users',$users)->with('transfer',$transfer);
        }
    }

    public function intakeform($id)
    {
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

        return view('socialworker.intakeform')->with('roles' , $roles)->with('deps',$deps)->with('id',$id)->with('users',$users)->with('transfer',$transfer);
    }

    public function ddeform($id)
    {
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

        return view('socialworker.ddeform')->with('roles' , $roles)->with('deps',$deps)->with('id',$id)->with('users',$users)->with('transfer',$transfer);
    }

    public function save_intake(Request $request)
    {
        $add = rand();
        $emer = rand();
        $pat = rand();

        $address = new Address([
            'address_id' => $add,
            'street' => $request->input('street'),
            'barangay' => $request->input('barangay'),
            'city'  => $request->input('city')

        ]);

        $address->save();

        $addr = Address::where('address_id',$add)->get();

        foreach($addr as $adds)
        {
            $address_id = $adds->id;
        }

        date_default_timezone_set('Asia/Singapore');

        $patient = new Patients([
            'patient_id' => $pat,
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'mname' => $request->input('mname'),
            'age' => $request->input('age'),
            'birthdate' => $request->input('bday'),
            'civil_status' => $request->input('civils'),
            'address_id' => $address_id,
            'date_admitted' => date('M-j-Y g:i A'),
            'department_id' => $request->input('department'),
        ]);

        $patient->save();

        $patient = Patients::with('departments')->where('patient_id', $pat)->get();

        foreach($patient as $patz)
        {
            $patz->patient_id;
        }

        $allusers = Users::all();
        
        Notification::send($allusers, new MySecondNotification($patz));

        $pats = Patients::where('patient_id',$pat)->get();

        foreach($pats as $patss)
        {
            $patient_id = $patss->id;
            $patient_department = $patss->department_id;
        }

        date_default_timezone_set('Asia/Singapore');

        $history = new Patient_History([
            'date' => date('M-j-Y g:i A'),
            'patient_id' => $patient_id,
            'by' => Auth::user()->id,
            'type' => 'Enrolled',
            'to_dep' => $patient_department,
        ]);

        $history->save();

        $emergency_people = new Emergency_Persons([
            'emergency_id' => $emer,
            'name' => $request->input('emername'),
            'phone' => $request->input('emerphone'),
            'cellphone' => $request->input('emercell'),
            'relationship' => $request->input('emerelation'),
            'email' => $request->input('emeremail'),
        ]);

        $emergency_people->save();

        $emers = Emergency_Persons::where('emergency_id',$emer)->get();

        foreach($emers as $emerss)
        {
            $emergency_id = $emerss->id;
        }


        $patient_intake_info = new Patient_Intake_Information([
            'patient_id' => $patient_id,
            'emergency_id' => $emergency_id,
            'educational_attainment' => $request->input('eduattain'),
            'employment_status' => $request->input('edstat'),
            'spouse' => $request->input('spouse'),
            'father' => $request->input('fathname'),
            'mother' => $request->input('mothname'),
            'presenting_problems' => $request->input('preprob'),    
            'impression' => $request->input('impre'),
            'date' => date('M-j-Y'),
        ]);

        $patient_intake_info->save();

        Session::flash('alert-class', 'success'); 
        flash('Patient Created', '')->overlay();

        $pat = Patients::with('departments')->with('address')->get();
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat)->with('users',$users)->with('transfer',$transfer);
        }

    }

    public function save_dde(Request $request)
    {
        $add = rand();
        $inf = rand();
        $pat = rand();

        $address = new Address([
            'address_id' => $add,
            'street' => $request->input('street'),
            'barangay' => $request->input('barangay'),
            'city'  => $request->input('city')

        ]);

        $address->save();

        $addr = Address::where('address_id',$add)->get();

        foreach($addr as $adds)
        {
            $address_id = $adds->id;
        }

        date_default_timezone_set('Asia/Singapore');

        $patient = new Patients([
            'patient_id' => $pat,
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'mname' => $request->input('mname'),
            'age' => $request->input('age'),
            'birthdate' => $request->input('bday'),
            'birthorder' => $request->input('border'),
            'address_id' => $address_id,
            'contact' => $request->input('contact'),
            'gender' => $request->input('gender'),
            'civil_status' => $request->input('civils'),
            'nationality' => $request->input('nation'),
            'religion' => $request->input('religion'),
            'case' => $request->input('casetype'),
            'submission' => $request->input('type'),
            'date_admitted' => date('M-j-Y g:i A'),
            'department_id' => $request->input('department'),
        ]);

        $patient->save();

        $patient = Patients::with('departments')->where('patient_id', $pat)->get();

        foreach($patient as $patz)
        {
            $patz->patient_id;
        }

        $allusers = Users::all();
        
        Notification::send($allusers, new MySecondNotification($patz));

        $pats = Patients::where('patient_id',$pat)->get();

        foreach($pats as $patss)
        {
            $patient_id = $patss->id;
            $patient_department = $patss->department_id;
        }

        date_default_timezone_set('Asia/Singapore');

        $history = new Patient_History([
            'date' => date('M-j-Y g:i A'),
            'patient_id' => $patient_id,
            'by' => Auth::user()->id,
            'type' => 'Enrolled',
            'to_dep' => $patient_department,
        ]);

        $history->save();

        $patient_informant = new Patient_Informant([
            'informant_id' => $inf,
            'name' => $request->input('infoname'),
            'address' => $request->input('infoadd'),
            'contact' => $request->input('infocontact'),
        ]);

        $patient_informant->save();

        $infos = Patient_Informant::where('informant_id',$inf)->get();

        foreach($infos as $info)
        {
            $informant_id = $info->id;
        }

        $information = new Patient_Information([
            'patient_id' => $patient_id,
            'informant_id' => $informant_id,
            'referred_by' => $request->input('referred'),
            'drugs_abused' => $request->input('dabused'),
            'chief_complaint' => $request->input('ccomplaint'),
            'h_present_illness' => $request->input('pillness'),
            'h_drug_abuse' => $request->input('dused'),
            'famper_history' => $request->input('background'),
        ]);

        $information->save();

        Session::flash('alert-class', 'success'); 
        flash('Patient Created', '')->overlay();

        $pat = Patients::with('departments')->with('address')->get();
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat)->with('users',$users)->with('transfer',$transfer);
        }

    }

    public function flagdelete(Request $request)
    {
        $id = $request->input('patientid');

        Patients::where('id',$id)->update(['flag' => 'deleted']);
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::all();

        Session::flash('alert-class', 'danger'); 
        flash('Patient Deleted', '')->overlay();

        $pat = Patients::with('departments')->with('address')->get();
        $roles = User_roles::all();
        $deps = Departments::all();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat)->with('users',$users)->with('transfer',$transfer);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.showpatient')->with('roles',$roles)->with('deps',$deps)->with('pat',$pat)->with('users',$users)->with('transfer',$transfer);
        }
    }

    public function transferPatient(Request $request)
    {
        $trans = rand();

        $transfer = new Transfer_Requests([
            'transfer_id' => $trans,
            'from_department' => $request->input('patientdep'),
            'to_department' => $request->input('depid'),
            'patient_id' => $request->input('patientid'),
            'remarks' => $request->input('referral'),
        ]);

        $transfer->save();


        $tranz = Transfer_Requests::with('transfer_departments')->where('transfer_id',$trans)->get();

        foreach($tranz as $transf)
        {
            $transf->transfer_id;
            $to_department = $transf->transfer_department->department_name;
            $from_department = $transf->transfer_departments->department_name;
        }

        date_default_timezone_set('Asia/Singapore');

        $history = new Patient_History([
            'date' => date('M-j-Y g:i A'),
            'patient_id' => $request->input('patientid'),
            'by' => Auth::user()->id,
            'type' => 'For Transfer',
            'from_dep' => $request->input('patientdep'),
            'to_dep' => $request->input('depid'),
            'remarks' => $request->input('referral'),
        ]);

        $history->save();

        $allusers = Users::all();

        Notification::send($allusers, new MyThirdNotifications($transf));

        Session::flash('alert-class', 'success'); 
        flash('Transfer Request Sent', '')->overlay();

        return back();
    }

    public function patientTransfer($id,$did,$tid,$pid)
    {

        date_default_timezone_set('Asia/Singapore');

        Patients::where('id',$id)->update(['department_id' => $did],['date_admitted' => date('M-j-Y')]);
        Patients::where('id',$id)->update(['date_admitted' => date('M-j-Y g:i A')]);
        Transfer_Requests::where('transfer_id',$tid)->update(['status' => 'transfered']);
        $notif = DB::table('notifications')->where('id',$pid)->update(['read_at' => date('Y-m-d')]);
        
        date_default_timezone_set('Asia/Singapore');

        $nhistory = new Patient_History([
            'date' => date('M-j-Y g:i A'),
            'patient_id' => $id,
            'by' => Auth::user()->id,
            'type' => 'Enrolled',
            'to_dep' => $did,
        ]);

        $nhistory->save();

        $pid = 0;
        $pat = Patients::where('id',$id)->get();
        $roles = User_roles::all();
        $deps = Departments::all();
        $users = Users::find(Auth::user()->id);
        $transfer = Transfer_Requests::where('transfer_id',$tid)->get();
        $history = Patient_History::where('patient_id',$id)->get();

        Session::flash('alert-class', 'success'); 
        flash('Patient Enrolled', '')->overlay();

        if(Auth::user()->user_role()->first()->name == 'Superadmin'){
            return view('superadmin.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfer',$transfer)->with('history',$history);
        }
        else if(Auth::user()->user_role()->first()->name == 'Admin'){
            return view('admin.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfer',$transfer)->with('history',$history);
        }
        else if(Auth::user()->user_role()->first()->name == 'Social Worker'){
            return view('socialworker.viewpatient')->with('roles' , $roles)->with('deps',$deps)->with('pat' ,$pat)->with('users',$users)->with('pid',$pid)->with('transfer',$transfer)->with('history',$history);
        }
    }
}
