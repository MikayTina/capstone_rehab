@extends('main')
@section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">{{$depsx->department_name}} Department</li>
        </ol> 

        <!-- Icon Cards-->
        <div class="row" style="margin-left: 5px;margin-bottom: 10px">
          <div class="col-xl-12 col-sm-9 mb-10" style="height: 6rem;">
            <div class="mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 45px;margin-top: 0px">{{$depsx->department_name}} Department</p>             
              </div>
              
            </div>
          </div>
        </div>
        <div class="row" style="margin-left: 10px;margin-bottom: 50px; margin-top: 0px">
           @foreach($roles as $role)
            @if($role->id >=3)
          <div class="col-xl-4 col-sm-9 mb-10" style="height: 12rem;margin-top: 10px">
            <div class="card border-dark mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 40px;margin-top: 7px">{{$role->name}}s</p>
              </div>
              <a style="color:black" class="card-footer text-white clearfix small z-1" href="{{URL::to('/showdep_users/'.$depsx->id.'/'.$role->id)}}">
                <span style="color:black" class="float-left">View Details</span>
                <span  style="color:black" class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
        </div>
         @endif
        @endforeach
      </div>

@endsection