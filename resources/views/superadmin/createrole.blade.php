@extends('main')
@section('content')

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">User Role Creation</li>
        </ol>

        <!-- Icon Cards-->
       <div class="container">
    <div class="card card-register mx-auto mt-4">
      <div class="card-header">Create User Role</div>
      <div class="card-body">
      @if ($errors->any())
        @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
        @endforeach
      @endif
        <form action="{{URL::to('/register_role')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="rname" class="form-control" placeholder="Role Name" required="required" autofocus="autofocus" name="rname">
                  <label for="rname">Name</label>
                </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input style="height:100px;" type="textbox" id="rdesc" class="form-control" placeholder="Department Description" required="required" name="rdesc">
              <label for="rdesc">Description</label>
            </div>
          </div>
           <input class="btn btn-primary btn-block" type="submit" name="submit" value="Create">
        </form>
      </div>
    </div> 
  </div>
@endsection