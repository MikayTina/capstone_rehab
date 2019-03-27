  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

   <script src="{{asset('vendor/fullcalendar/lib/jquery.min.js')}}"></script>
   <script src="{{asset('vendor/fullcalendar/lib/jquery-ui.min.js')}}"></script>
   <script src="{{asset('vendor/fullcalendar/lib/moment.min.js')}}"></script>
   <script src="{{asset('vendor/multi-select/js/jquery.multi-select.js')}}"></script>

   <script src="{{asset('vendor/fullcalendar/fullcalendar.min.js')}}"></script>

  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin.min.js')}}"></script>
  <script src="{{asset('js/bootbox.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>

   <script>
    $('#flash-overlay-modal').modal();
    </script>
    
  <script>
    $(window).on('load',function() {
      $('#loading').fadeOut('slow');
    });
</script>

  <script type="text/javascript">

  $(function () {

    var evt = [];
     $.ajax({ 
          url:"{{URL::route('getEvent')}}",
          type:"GET",
          dataType:"JSON",
          async:false
    }).done(function(r){

          evt = r;
    });
  
        

      $("#calendar").fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },

      minTime: "06:00:00",
      maxTime: "20:00:00",
      events: evt,
      textColor: 'white',

      dayClick: function(date, jsEvent, view, resourceObj) {


               var r = confirm('Do you want to plot on this date ' + date.format());

                if(r== true){

                   var base = '{{ URL::to('/create_event') }}';

                  window.location.href=base;
                }
        
        },

      
       eventClick: function(calEvent, jsEvent, view) {

          var er = confirm('Do you want to plot on this date ');
       }

    });




      })

</script>
  
  <script> 
  
  $('#editModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)

    var userid = button.data('userid')
    var fname = button.data('fname')
    var lname = button.data('lname')
    var username = button.data('uname')
    var email = button.data('email')
    var contact = button.data('contact')
    var department = button.data('department')
    var modal = $(this)

    modal.find('.modal-body #userid').val(userid);
    modal.find('.modal-body #fname').val(fname);
    modal.find('.modal-body #lname').val(lname);
    modal.find('.modal-body #username').val(username);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #contact').val(contact);
    modal.find('.modal-body #department').val(department);
  })

   $('#editemployeeModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)

    var userid = button.data('userid')
    var fname = button.data('fname')
    var lname = button.data('lname')
    var mname = button.data('mname')
    var email = button.data('email')
    var contact = button.data('contact')
    var designation = button.data('designation')
    var department = button.data('department')
    var modal = $(this)

    modal.find('.modal-body #userid').val(userid);
    modal.find('.modal-body #fname').val(fname);
    modal.find('.modal-body #lname').val(lname);
    modal.find('.modal-body #mname').val(mname);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #contact').val(contact);
    modal.find('.modal-body #designation').val(designation);
    modal.find('.modal-body #department').val(department);
  })

  $('#deleteModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)

    var user_id = button.data('userid')
    var modal = $(this)

    modal.find('.modal-body #user_id').val(user_id);
  })

  $('#deleteemployeeModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)

    var employee_id = button.data('employee_id')
    var modal = $(this)

    modal.find('.modal-body #employee_id').val(employee_id);
  })

  $('#deleteRole').on('show.bs.modal', function (event) {

    var a = $(event.relatedTarget)

    var role = a.data('role')
    var modal = $(this)

    modal.find('.modal-body #role').val(role);
  })

  $('#deletePatient').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)

    var patientid = button.data('patientid')
    var modal = $(this)

    modal.find('.modal-body #patientid').val(patientid);
  })

  $('#transferPatient').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);

    var patientid = button.data('patientid');
    var patientdep = button.data('patientdep');
    var modal = $(this);

    modal.find('.modal-body #patientid').val(patientid);
    modal.find('.modal-body #patientdep').val(patientdep);
  })

  $('#transferReferral').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);
    var button1 = $("#transferPatient #patientid").val().trim();
  
    var depid = button.data('depid');
    var patientid = $('#transferPatient #patientid').val().trim();
    var patientdep = $('#transferPatient #patientdep').val().trim();
    var modal = $(this);

    modal.find('.modal-body #depid').val(depid);
    modal.find('.modal-body #patientid').val(patientid);
    modal.find('.modal-body #patientdep').val(patientdep);
  })

  $(function() {
  $('input[name="casetype"]').on('click', function(){

    if ($(this).val() == 'New Case') {
      document.getElementById("casetype").disabled = true;
      $('#textboxes').hide();
    }
    else if ($(this).val() == 'Old Case'){
      document.getElementById("casetype").disabled = true;
      $('#textboxes').hide();
    }
    else if($(this).val() == 'With Court Case'){
      document.getElementById("casetype").disabled = false;
      $('#textboxes').show();
     }
    });
  });


  $(function() {
  $('input[name="type"]').on('click', function(){

    if ($(this).val() == 'Voluntary Submission') {
      document.getElementById("type").disabled = true;
      $('#textbox').hide();
    }
    else if ($(this).val() == 'Compulsory Submission'){
      document.getElementById("type").disabled = true;
      $('#textbox').hide();
    }
    else if($(this).val() == 'Others'){
      document.getElementById("type").disabled = false;
      $('#textbox').show();
     }
    });
  });
  
</script>