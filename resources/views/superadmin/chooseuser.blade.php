@extends('main')
@section('content')
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">User Roles</li>
        </ol>
        <div><a style="color:white" href="{{URL::to('/createuserrole')}}"><button class="btn btn-dark btn-block" style="height: 50px; width:200px;float: right;margin-top: 0px;margin-left: 0px">New User Role</button></a></div>

        @include('flash::message')

        <!-- Icon Cards-->
        @if(Auth::user()->role == 1)
        <div class="row" style="margin-left: 10px;margin-bottom: 50px; margin-top: 70px">
           @foreach($roles as $role)
            @if($role->id != 1)
          <div class="col-xl-4 col-sm-9 mb-10" style="height: 14rem;margin-top: 30px">
            <div class="card border-dark mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <a href="#" data-toggle="modal" data-target="#deleteRole" data-role="{{$role->id}}" aria-label="Close Account Info Modal Box" style="float:right;font-size:25px;color:black;text-decoration: none;">&times;</a>
                  <p style="font-size: 40px;margin-top: 7px">{{$role->name}}</p>
                <div class="mr-5">{{$role->description}}</div>
              </div>
                <a style="color:white" href="{{URL::to('/create_user/'.$role->id)}}"><button class="btn btn-dark btn-block" style="height: 50px">Create New {{$role->name}}</button></a>
            </div>
          </div>
            @endif
          @endforeach
        </div>
        @endif
@endsection