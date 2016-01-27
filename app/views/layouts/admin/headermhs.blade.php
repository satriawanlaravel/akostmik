<header class="header">
  <a href="" class="logo">        
    AKOSTMIK-BG
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>

    </a>     
    <div class="navbar-right">
      <ul class="nav navbar-nav">                        <!-- Messages: style can be found in dropdown.less-->
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i>
            <span>{{ Sentry::getUser()->first_name.' '.Sentry::getUser()->last_name }}
              <i class="caret"></i>
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header bg-light-blue">
              <img src="{{ asset('assets1/img/avatar5.png') }}" class="img-circle" alt="User Image" />
              <p>
                {{ Sentry::getUser()->first_name.' '.Sentry::getUser()->last_name }}
                <small>Dari {{ substr(Sentry::getUser()->created_at, 0, 10) }}</small>
              </p>
            </li>            

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ URL::to('/mahasiswa/profile') }}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{ URL::to('mahasiswa/logoutmhs') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>





