@extends('main')
@section('content')
        <!-- Breadcrumbs-->

      
        @if(Auth::user()->user_role()->first()->name == 'Superadmin')
        <ol class="breadcrumb" style="height: 100px;font-size:50px;text-align: center">
          <li class="breadcrumb-item active" style="margin-left: 400px"><i class="fas fa-fw fa fa-user"></i>{{Auth::user()->user_role()->first()->name}}</li>
        </ol>
        @elseif(Auth::user()->user_role()->first()->name == 'Admin')
        <ol class="breadcrumb" style="height: 100px;font-size:50px;text-align: center">
          <li class="breadcrumb-item active" style="margin-left: 400px"><i class="fas fa-fw fa fa-user"></i>{{Auth::user()->user_role()->first()->name}}</li>
        </ol>
        @else
        <ol class="breadcrumb" style="height: 100px;font-size:50px;text-align: center">
          <li class="breadcrumb-item active" style="margin-left: 400px"><i class="fas fa-fw fa fa-user"></i>{{Auth::user()->department()->department_name}}</li>
        </ol>
        @endif

        <!-- Icon Cards-->
        <div class="row" style="margin-left: 10px;margin-bottom: 50px">
          <div class="col-xl-4 col-sm-4 mb-10" style="height: 18rem;">
            <div class="card border-dark mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 50px;margin-top: 50px"><i class="fas fa-fw fa fa-users"></i> Users</p>
                <div class="mr-5">@foreach($roles as $role) {{$role->name}}s  @endforeach</div>
              </div>
                <a style="color:white" href="{{URL::to('/chooseuser')}}"><button class="btn btn-dark btn-block" style="height: 50px">Create New User</button></a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-9 mb-10" style="height: 18rem;">
            <div class="card border-dark mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 45px;margin-top: 50px"><i class="fas fa-fw fa fa-hospital"></i> Departments</p>
                <div class="mr-5">@foreach($deps as $dep) {{$dep->department_name}}  @endforeach</div>
              </div>
                <a style="color:white" href="{{URL::to('/create_dep')}}"><button class="btn btn-dark btn-block" style="height: 50px">Create New Department</button></a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-9 mb-10" style="height: 18rem;">
            <div class="card border-dark mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 50px;margin-top: 50px"><i class="fas fa-fw fa fa-user"></i> Patients</p>
                <div class="mr-5"></div>
              </div>
                <a style="color:white" href="{{URL::to('/patient_dep')}}"><button class="btn btn-dark btn-block" style="height: 50px">Create New Patient</button></a>
            </div>
          </div>
      </div>
@endsection