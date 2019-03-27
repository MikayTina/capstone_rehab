@extends('main')
@section('content')


 <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{URL::to('/profile')}}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Create Event</li>
        </ol>

        <!-- Icon Cards-->
         <div class="container" style="margin-top: 30px">
        <p style="font-size:50px;margin-bottom: 20px">Create Event</p>
    <form action="{{URL::to('/add_event')}}" method="post">
          {{csrf_field()}}
            <fieldset style="margin-bottom: 30px">
            <legend style="color:white;text-indent: 20px;width:1100px;margin-bottom: 40px" class="bg bg-dark">Event Details</legend>
                <div class="form-group" style="margin-left:20px">
                    <div class="form-row">
                       <div class="col-md-12">
                          <div class="form-label-group">
                             <h6>Title*</h6>
                              <input type="text" id="title" class="form-control" placeholder="Title" required="required" autofocus="autofocus" name="title" value="{!! old('title') !!}">
                          </div>
                       </div>
                    </div>
                </div>
                <div class="form-group" style="margin-left:20px">
                    <div class='form-row'>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-11">
                                  <div class="form-label-group">
                                    <h6>Venue*</h6>
                                      <input type="text" id="venue" class="form-control" placeholder="Venue" name="venue">
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-11">
                                <div class="form-label-group">
                                    <h6>Scedule Date*</h6>
                                    <input type="date" id="event_date" class="form-control" placeholder="Scedule Date" name="event_date">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-11">
                                <div class="form-label-group">
                                  <h6>Start Time*</h6>
                                  <input type="time" id="start_time" class="form-control" placeholder="Start Time" name="start_time" value="12:00">
                                </div>
                              </div>
                            </div>
                          </div>
                           <div class="form-group">
                              <div class="form-row">
                                <div class="col-md-11">
                                  <div class="form-label-group">
                                    <h6>End Time*</h6>
                                    <input type="time" id="end_time" class="form-control" placeholder="End Time" name="end_time" value="12:00">
                                  </div>
                                </div>
                             </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-register mx-auto" style="margin-bottom: 30px">
                              <div class="card-header"><h6>Add Patient</h6></div>
                               <div class="card-body"> 

                                <div class="form-group">
                                <div class="form-row">
                                  <a href='#' id='select-all_pat'>select all</a>
                                </div>
                                <div class="form-row">
                                <select multiple='multiple' id="patient_select" name="patient-select[]">
                                  @foreach($patients as $patient)
                                       <option value="{{ $patient->id }}">{{ $patient->lname }}, {{ $patient->fname }}</option>
                                  @endforeach
                              </select>
                         
                               </div>
                              </div> 
                            </div>
                           </div>
                         </div>
                      <div class="col-md-6">
                            <div class="card card-register mx-auto" style="margin-bottom: 30px">
                              <div class="card-header"><h6>Add Interventions</h6></div>
                               <div class="card-body"> 

                                <div class="form-group">
                                <div class="form-row">
                                  <a href='#' id='select-all'>select all</a>
                                </div>
                                <div class="form-row">
                         
                              <select multiple='multiple' id="interven-select" name="interven-select[]">
                                  @foreach($interven as $interven)
                                       <option value="{{ $interven->id }}">{{ $interven->interven_name }}</option>
                                  @endforeach
                              </select>
                         
                               </div>
                              </div> 
                            </div>
                           </div>
                         </div>
                  </div>    

        </fieldset>

          <div class="col-md-12">
             <input style="width:400px;float:right;margin-top: 10px" class="btn btn-primary btn-block" type="submit" name="submit" value="Create">
           </div><br>
           <br>
           <br>
           <br>
         

           </form>
         </div>
      
@endsection

@section('script')

  <script type="text/javascript">

  $('#patient_select').multiSelect();
  $('#interven-select').multiSelect();

  $('#select-all_pat').click(function(){
      $('#patient_select').multiSelect('select_all');
          return false;
    });

  const element = document.getElementById('event_date');
element.valueAsNumber = Date.now()-(new Date()).getTimezoneOffset()*60000;
  </script>  

@endsection


