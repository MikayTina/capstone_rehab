<ul class="sidebar navbar-nav" style="">
      <li class="nav-item active" style="margin-top: 10px">
        <a class="nav-link" href="{{URL::to('/profile')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @if(Auth::user()->user_role()->first()->name == 'Superadmin' || Auth::user()->user_role()->first()->name == 'Admin')
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
        @if(Auth::user()->user_role()->first()->name == 'Superadmin')
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          @foreach($roles as $role)
            @if($role->name != 'Superadmin')
          <a class="dropdown-item" href="{{ route('showUsers',$role->id) }}">{{$role->name}}s</a>
          @endif
          @endforeach
        </div>
        @elseif(Auth::user()->user_role()->first()->name == 'Admin')
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          @foreach($roles as $role)
            @if($role->name != 'Admin' && $role->name != 'Superadmin')
          <a class="dropdown-item" href="{{ route('showUsers',$role->id) }}">{{$role->name}}s</a>
          @endif
          @endforeach
        </div>
        @endif
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-building"></i>
          <span>Departments</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
         @foreach($deps as $dep)
          <a class="dropdown-item" href="{{ route('showDeps',$dep->id) }}">{{$dep->department_name}}</a>
         @endforeach
        </div>
      </li>
      @if(Auth::user()->user_role()->first()->name == 'Superadmin')
       <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/showemployees')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Employees</span></a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/showpatients')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Patients</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/showCalendar')}}">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Calendar</span></a>
      </li>
      <li class="nav-item" style="">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Reports</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-list"></i>
          <span>Forms</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/logs')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>System Logs</span></a>
      </li>
    @else
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/showpatients')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Patients</span></a>
      </li>
      @if(Auth::user()->user_role()->first()->name == 'Social Worker')
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>My Reports</span></a>
      </li>
      @endif
      @if(Auth::user()->user_role()->first()->name == 'Doctor')
      <li class="nav-item">
         <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-briefcase-medical"></i>
          <span>My Appointments</span></a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-list"></i>
          <span>Forms</span></a>
      </li>
    @endif
    </ul>