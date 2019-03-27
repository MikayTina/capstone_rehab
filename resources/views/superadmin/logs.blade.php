@extends('main')
@section('content')
 <style>

      th {
      text-align: inherit;
      background-color: #343a40;
      color:white;
      }

</style>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">System Logs</li>
        </ol> 

        <!-- Icon Cards-->
        <div class="row" style="margin-left: 5px;margin-bottom: 0px">
          <div class="col-xl-8 col-sm-9 mb-10" style="height: 6rem;">
            <div class="mb-3 text-black o-hidden h-100">
              <div class="card-body">
                  <p style="font-size: 50px;margin-top: 0px">System Logs</p> 
              </div>

                @include('flash::message')

            </div>
        </div>
         <div class="card-body" style="margin-left: 10px">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Performed by</th>
                    <th>Type</th>
                    <th>Action</th>
                    <th>Department</th>
                  </tr>
                </thead>
                <tbody>
                 
                </tbody>
              </table>
            </div>
          </div>

  <div class="modal fade" id="editemployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
  <div class="container">
    <div class="card card-register mx-auto mt-4">
      <div class="card-body">
        <form action="{{URL::to('/update_employeenow')}}" method="post">
          {{csrf_field()}}
          <div class="modal-body">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="fname" class="form-control" placeholder="First name" required="required" autofocus="autofocus" name="fname" value="">
                  <label for="fname">First name</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="lname" class="form-control" placeholder="Last name" required="required" name="lname" value="">
                  <label for="lname">Last name</label>
                </div>
              </div>
               <div class="col-md-4">
               <div class="form-label-group">
                  <input type="text" id="mname" class="form-control" placeholder="Middle name" required="required" autofocus="autofocus" name="mname" value="">
                  <label for="mname">Middle Name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
              <input type="email" id="email" class="form-control" placeholder="Email address" required="required" name="email" value="">
              <label for="email">Email address</label>
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-label-group">
                  <input type="text" id="contact" class="form-control" placeholder="Contact No." required="required" name="contact" value="">
                  <label for="contact">Contact no.</label>
                  <input type="hidden" class="form-control" name="userid" id="userid" value="">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="designation" class="form-control" placeholder="Designation" required="required" name="designation" value="">
                  <label for="contact">Designation</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                 <select class="form-control" id="department" placeholder="Department" required="required" name="department" value="">
                  <label for="department">Department</label>
                    @foreach($deps as $dep)
                    <option value="{{$dep->id}}">{{$dep->department_name}} Department</option>
                    @endforeach
                    <option value="0">None</option>
                </select>
                </div>
              </div>
    
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Save Changes</button>  
          </div>
        </form>
      </div>
      </div>
    </div> 
  </div>
  </div>
  </div>


@endsection