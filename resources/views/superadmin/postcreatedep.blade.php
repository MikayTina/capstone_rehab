@extends('main')
@section('content')

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Departments</li>
        </ol>
        <a style="color:white" href="{{URL::to('/create_depnow')}}"><button class="btn btn-dark btn-block" style="height: 50px; width:200px;float: right;margin-top: 0px;margin-left: 120px">New Department</button></a>
        <!-- Icon Cards-->
        <div class="row" style="margin-left: 10px;margin-bottom: 50px; margin-top: 70px">
           @foreach($deps as $dep)
          <div class="col-xl-4 col-sm-9 mb-10" style="height: 14rem;margin-top: 30px">
            <div class="card border-dark mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 40px;margin-top: 7px">{{$dep->department_name}}</p>
                <div class="mr-5">{{$dep->description}}</div>
              </div>
              <a style="color:black" class="card-footer text-white clearfix small z-1" href="#">
                <span style="color:black" class="float-left">View Details</span>
                <span  style="color:black" class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
        </div>
        @endforeach
      </div> 

@endsection