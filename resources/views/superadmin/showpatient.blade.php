@extends('main')
@section('content')
 
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Patients</li>
        </ol> 

        <!-- Icon Cards-->
        <div class="row" style="margin-left: 5px;margin-bottom: 0px">
          <div class="col-xl-12 col-sm-9 mb-10" style="height: 6rem;">
            <div class="mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 50px;margin-top: 0px">Patients</p>
              </div>

                @include('flash::message')

            </div>
          </div>
        </div>
         <div class="card-body" style="margin-left: 10px">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($pat as $pats)  
                  @if(Auth::user()->department == $pats->department_id) 
                    @if($pats->flag != 'deleted')    
                  <tr>
                    <td>{{$pats->fname}} {{$pats->mname}}. {{$pats->lname}}</td>
                    <td>{{$pats->age}}</td>
                    <td>{{$pats->birthdate}}</td>
                    <td>{{$pats->address->street}},{{$pats->address->barangay}},{{$pats->address->city}}</td>
                    <td>{{$pats->departments->department_name}} Department</td>
                    <td style="text-align: center"><a class="btn btn-success" href="{{URL::to('/viewpatient/'.$pats->id)}}" style="margin-right: 10px;color:white">View</a>
                     @if(Auth::user()->user_role()->first()->name == 'Superadmin' || Auth::user()->user_role()->first()->name == 'Admin')
                      <button class="btn btn-danger" data-toggle="modal" data-target="#deletePatient" data-patientid="{{$pats->id}}">Delete</button>
                      @endif
                     @endif
                  </tr>
                  @elseif(Auth::user()->user_role()->first()->name == 'Superadmin')
                    @if($pats->flag != 'deleted')
                  <tr>
                    <td>{{$pats->fname}} {{$pats->mname}}. {{$pats->lname}}</td>
                    <td>{{$pats->age}}</td>
                    <td>{{$pats->birthdate}}</td>
                    <td>{{$pats->address->street}},{{$pats->address->barangay}},{{$pats->address->city}}</td>
                    <td>{{$pats->departments->department_name}} Department</td>
                    <td style="text-align: center"><a class="btn btn-success" href="{{URL::to('/viewpatient/'.$pats->id)}}" style="margin-right: 10px;color:white">View</a>
                     @if(Auth::user()->user_role()->first()->name == 'Superadmin' || Auth::user()->user_role()->first()->name == 'Admin')
                      <button class="btn btn-danger" data-toggle="modal" data-target="#deletePatient" data-patientid="{{$pats->id}}">Delete</button>
                     @endif
                    </td>
                  </tr>
                    @endif
                  @elseif(Auth::user()->user_role()->first()->name == 'Admin')
                    @if($pats->flag != 'deleted')
                  <tr>
                    <td>{{$pats->fname}} {{$pats->mname}}. {{$pats->lname}}</td>
                    <td>{{$pats->age}}</td>
                    <td>{{$pats->birthdate}}</td>
                    <td>{{$pats->address->street}},{{$pats->address->barangay}},{{$pats->address->city}}</td>
                    <td>{{$pats->departments->department_name}} Department</td>
                    <td style="text-align: center"><a class="btn btn-success" href="{{URL::to('/viewpatient/'.$pats->id)}}" style="margin-right: 10px;color:white">View</a>
                      @if(Auth::user()->user_role()->first()->name == 'Superadmin' || Auth::user()->user_role()->first()->name == 'Admin')
                      <button class="btn btn-danger" data-toggle="modal" data-target="#deletePatient" data-patientid="{{$pats->id}}">Delete</button>
                      @endif
                    </td>
                  </tr>
                    @endif
                  @endif
                @endforeach
                </tbody>
              </table>
            </div>
          </div>


@endsection