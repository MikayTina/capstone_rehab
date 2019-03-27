@extends('main')
@section('content')

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Patient Creation</li>
        </ol>

        <!-- Icon Cards-->
    <div class="container" style="margin-top: 50px">
    
        <form action="{{URL::to('/patientinfo')}}" method="post">
          {{csrf_field()}}
        <div class="container border border-gray" style="margin-bottom: 20px;margin-top: 10px">
          <div class="form-group" style="margin-top: 10px">
            <div class="form-row">
              <div class="col-md-5">
                <div class="form-label-group">
                  <div class="custom-control custom-radio custom-control-inline" style="font-size: 50px">
                    <input type="radio" class="custom-control-input" id="new case" name="casetype" value="New Case" {{ ($input['casetype'] == "New Case") ? 'checked' : '' }}>
                    <label class="custom-control-label" for="new case">New Case</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="old case" name="casetype" value="Old Case" {{ ($input['casetype'] == "Old Case") ? 'checked' : '' }}>
                    <label class="custom-control-label" for="old case">Old Case</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="case" name="casetype" value="With Court Case" {{ ($input['casetype'] == "With Court Case") ? 'checked' : '' }}>
                    <label class="custom-control-label" for="case">With Court Case</label>
                   </div>  
                  </div>
                </div>
                <div class="col-md-5">
                <div class="form-label-group">
                  <div class="custom-control custom-radio custom-control-inline" style="font-size: 50px">
                    <input type="radio" class="custom-control-input" id="Voluntary Submission" name="type" value="Voluntary Submission" {{ (old('type') == 'Voluntary Submission') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="Voluntary Submission">Voluntary Submission</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="Compulsory Submission" name="type" value="Compulsory Submission" {{ (old('type') == 'Compulsory Submission') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="Compulsory Submission">Compulsory Submission</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="others" name="type" value="Others" {{ (old('type') == 'Others') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="others">Others</label>
                   </div>  
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-4">
                      <div class="form-label-group" id="textboxes" style="display: none;">
                          <input style="margin-left:0px" type="text" id="casetype" class="form-control" placeholder="Specify Nature/Case no." name="casetype">
                          <label for="casetype" style="margin-left:0px">Specify Nature/Case no.</label>
                      </div>
                      <div class="form-label-group" id="textback"></div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-label-group" id="textbox" style="display: none;">
                        <input style="margin-left:90px" type="text" id="type" class="form-control" placeholder="Please Specify" name="type">
                        <label for="type" style="margin-left:90px">Please specify</label>
                    </div>
                      <div class="form-label-group" id="textbax"></div>
                  </div>
                </div>
              </div>
            </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="lname" class="form-control" placeholder="Last name" required="required" autofocus="autofocus" name="lname" value="{{$input['lname']}}">
                  <label for="lname">Last name</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="fname" class="form-control" placeholder="First name" required="required" name="fname" value="{{ old('fname') }}">
                  <label for="fname">First name</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="mname" class="form-control" placeholder="Middle name" required="required" name="mname" value="{{ old('mname') }}">
                  <label for="mname">Middle  name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-1">
                <div class="form-label-group">
                  <input type="number" id="age" class="form-control" placeholder="Age" required="required" autofocus="autofocus" name="age" value="{{ old('age') }}">
                  <label for="age">Age</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="date" id="bday" class="form-control" placeholder="Birthday" required="required" autofocus="autofocus" name="bday">
                  <label for="bday">Birthday</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="number" id="border" class="form-control" placeholder="Birth Order" required="required" autofocus="autofocus" name="border">
                  <label for="border">Birth Order</label>
                </div>
              </div>
            
           <div class="col-md-5">
            <div class="form-label-group">
              <input type="text" id="address" class="form-control" placeholder="Password" required="required" name="address">
              <label for="address">Address</label>
            </div>
           </div>
          </div>
        </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="contact" class="form-control" placeholder="Contact No." required="required" name="contact">
                  <label for="contact">Contact no.</label>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
              </div>
              <div class="col-md-2">
                <div class="form-label-group">
                 <select class="form-control" id="gender" placeholder="Gender" required="required" name="gender">
                  <label for="gender">Gender</label>
                    <option value="" disabled selected hidden>Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="Others">Others</option>
                </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-label-group">
                 <select class="form-control" id="civils" placeholder="Civil Status" required="required" name="civils">
                  <label for="civils">Civil Status</label>
                    <option value="" disabled selected hidden>Civil Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Separated">Separated</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                <input type="text" id="nation" class="form-control" placeholder="Nationality" required="required" name="nation">
                   <label for="nation">Nationality</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                <input type="text" id="religion" class="form-control" placeholder="Nationality" required="required" name="religion">
                   <label for="religion">Religion</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                 <select class="form-control" id="department" placeholder="Department" required="required" name="department">
                  <label for="department">Department</label>
                  <option value="" disabled selected hidden>Department</option>
                  @foreach($deps as $dep)
                    <option value="{{$dep->id}}">{{$dep->department_name}} Department</option>
                  @endforeach
                    <option value="0">None</option>
                </select>
                </div>
              </div>
            </div>
          </div>
           <input style="width:400px;float:right;margin-top: 10px" class="btn btn-primary btn-block" type="submit" name="submit" value="Proceed">
         </form>
    </div>

       
@endsection
