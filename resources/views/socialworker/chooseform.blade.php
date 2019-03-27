@extends('main')
@section('content')

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Choose What to fill-up</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row" style="margin-left: 10px;margin-bottom: 50px; margin-top: 0px">
          <div class="col-xl-6 col-sm-9 mb-10" style="height: 14rem;margin-top: 30px">
            <div class="card border-dark mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 40px;margin-top: 7px">Intake Form</p>
                <div class="mr-5"></div>
              </div>  
              <a style="color:white" href="{{URL::to('/intakeform/'.$id)}}"><button class="btn btn-dark btn-block" style="height: 50px">Proceed</button></a>
            </div>
        </div>
        <div class="col-xl-6 col-sm-9 mb-10" style="height: 14rem;margin-top: 30px">
            <div class="card border-dark mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 35px;margin-top: 7px">Drug Dependency Examination Report Form</p>
                <div class="mr-5"></div>
              </div>  
              <a style="color:white" href="{{URL::to('/ddeform/'.$id)}}"><button class="btn btn-dark btn-block" style="height: 50px">Proceed</button></a>
            </div>
        </div>
      </div>
        

@endsection