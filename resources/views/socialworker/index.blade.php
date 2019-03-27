@extends('main')
@section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb" style="height: 100px;font-size:50px;text-align: center">
          <li class="breadcrumb-item active" style="margin-left: 300px"><i class="fas fa-fw fa fa-hospital"></i>{{Auth::user()->user_department()->first()->department_name}} Department</li>
        </ol> 

        <!-- Icon Cards-->
        <div class="row" style="margin-left: 10px;margin-bottom: 50px">
         <div class="col-xl-4 col-sm-9 mb-10" style="height: 18rem;">
            <div class="card border-dark mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 45px;margin-top: 50px"><i class="fas fa-fw fa fa-user"></i> Patients</p>
                <div class="mr-5"></div>
              </div>
               <a style="color:white" href="{{URL::to('/patient_dep')}}"><button class="btn btn-dark btn-block" style="height: 50px">Create New Patient</button></a>
            </div>
          </div>
         </div>
@endsection