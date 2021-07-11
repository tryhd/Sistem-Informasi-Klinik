@section('header')
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <div class="navbar-custom-menu" class="full-right image">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" data-toggle="dropdown">
              <span class="hidden-xs">Selamat Datang </span>
              <i class="fas fa-cog"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                  
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">

                <div class="float-sm-right">
                  <a href="{{ ('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="btn btn-default btn-flat"><i class="fas fa-power-off"></i> Sign out</a>
                  <form id="logout-form" action="{{ ('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
              </li>
              <!-- Menu Footer-->
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
</ul>
@endsection
