<!DOCTYPE html>
<html lang="en"> 

@include('parts.head')

<body class="bg-dark">

  <div class="container row" style="margin-left:550px;margin-top:80px">
       <div class="card card-login">
      <img style="height:150px;width:150px;margin-top: 30px;margin-left: 120px;" src="{{asset('images/logo2.png')}}">
      <div class="card-header" style="font-size: 20px;text-align: center">CEBU TREATMENT AND REHABILITATION CENTER FOR FEMALES</div>
      <div class="card-body">
        @if ($error = $errors->first('password'))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endif
        <form action="{{URL::to('/loginnow')}}" method="Post">
           {{csrf_field()}}
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus" name="username">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" class="form-control" placeholder="Password" required="required" name="password">
              <label for="password">Password</label>
            </div>
          </div>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input class="btn btn-primary btn-block" type="submit" name="submit" value="Login">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{URL::to('/register')}}">Register an Account</a>
        </div> 
      </div>
    </div>
  </div>

  @include('parts.scripts')

</body>

</html>
