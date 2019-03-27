@extends('main')
@section('content')

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{URL::to('/chooseuser')}}">User Roles</a>
          </li>
          <li class="breadcrumb-item active">{{$rolex->name}} Creation</li>
        </ol>

        <!-- Icon Cards-->
    <div class="container">
    <div class="card card-register mx-auto mt-4">
      <div class="card-header">Create New {{$rolex->name}}</div>
      <div class="card-body">
      @if ($errors->any())
        @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
        @endforeach
      @endif
        <form action="{{URL::to('/registernow')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="fname" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="fname" value="{{ old('fname') }}">
                  <label for="fname">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lname" class="form-control" placeholder="Last name" required="required" name="lname" value="{{ old('lname') }}">
                  <label for="lname">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus" name="username" value="{{ old('username') }}">
                  <label for="username">Username</label>
                </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" class="form-control" placeholder="Password" required="required" name="password">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
            <div class="form-label-group">
              <input type="email" id="email" class="form-control" placeholder="Email address" required="required" name="email">
              <label for="email" value="{{ old('email') }}">Email address</label>
            </div>
            </div>
             <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="contact" class="form-control" placeholder="Contact No." required="required" name="contact" value="{{ old('contact') }}">
                  <label for="contact">Contact no.</label>
                  <input type="hidden" class="form-control" name="roleid" value="{{$rolex->id}}" id="roleid">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
              </div>
          </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              @if($rolex->name == 'Admin')
              <div class="col-md-6">
                <div class="form-label-group">
                 <input type="hidden" name="deparment" value="0">
                </div>
              </div>
              @else
              <div class="col-md-6">
                <div class="form-label-group">
                 <select class="form-control" id="department" placeholder="Department" required="required" name="department">
                  <label for="department">Department</label>
                  @foreach($deps as $dep)
                    <option value="{{$dep->id}}">{{$dep->department_name}} Department</option>
                  @endforeach
                    <option value="0">None</option>
                </select>
                </div>
              </div>
              @endif
              @if($rolex->name != 'Admin')
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="designation" class="form-control" placeholder="Designation" required="required" name="designation">
                  <label for="designation">Designation/Position</label>
                </div>
              </div>
              @else
               <div class="col-md-6">
                <div class="form-label-group">
                  <input type="hidden" id="designation" class="form-control" placeholder="Designation" required="required" name="designation" value="">
                </div>
              </div>
              @endif
            </div>
            </div>
           <input class="btn btn-primary btn-block" type="submit" name="submit" value="Create">
        </form>
      </div>
    </div> 
  </div>

@endsection
