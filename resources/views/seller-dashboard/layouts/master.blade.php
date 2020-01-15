<!DOCTYPE html>
<html>
  @include('seller-dashboard.partials.head')
  <body>
    <div id="app">
    <!-- Side Navbar -->
    @include('seller-dashboard.partials.sidebar-nav')
    <div  class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="{{asset('admin-assets/#')}}" class="menu-btn"><i class="icon-bars"> </i></a><a href="{{url('/')}}" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Shared </span><strong class="text-primary"> Business</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
               
                <!-- Messages dropdown-->
                
                <!-- Languages dropdown    -->
                
                <!-- Log out-->
                <li class="nav-item"><a href="{{route('logout')}}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
      <!-- //analytics -->

      <!-- analytics end -->
      <!-- Header Section-->
      <section class="dashboard-header section-padding">
        <div class="container-fluid">
          @if($message = Session::get('success'))
          <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('danger'))

<div class="alert alert-danger alert-block">

  <button type="button" class="close" data-dismiss="alert">×</button> 

        <strong>{{ $message }}</strong>

</div>

@endif
          @yield('content')
        </div>
      </section>
      <!-- Statistics Section-->
      
      <!-- Updates Section -->
      
     @include('seller-dashboard.partials.footer')
    </div>
    <!-- JavaScript files-->
   @include('seller-dashboard.partials.js-libraries')
   @yield('additional-js')
 </div>
  </body>
</html>