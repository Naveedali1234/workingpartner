<!DOCTYPE html>
<html>
  @include('working-partner-dashboard.partials.head')
  <body>
    <!-- Side Navbar -->
    @include('working-partner-dashboard.partials.sidebar-nav')
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="{{asset('admin-assets/#')}}" class="menu-btn"><i class="icon-bars"> </i></a><a href="{{asset('admin-assets/index.html')}}" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Bootstrap </span><strong class="text-primary">Dashboard</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
               
                <!-- Messages dropdown-->
                
                <!-- Languages dropdown    -->
                
                <!-- Log out-->
                <li class="nav-item">
                  <a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout1</span><i class="fa fa-sign-out">
                    </i>
                  </a>
                </li>
              </ul>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
      <!-- Header Section-->
      <section class="dashboard-header section-padding">
        <div class="container-fluid">
          
          @yield('content')
        </div>

      </section>
      <!-- Statistics Section-->
      
      <!-- Updates Section -->
      
     @include('working-partner-dashboard.partials.footer')
    </div>
    <!-- JavaScript files-->

   @include('working-partner-dashboard.partials.js-libraries')
   @yield('additional-js')

  </body>
</html>