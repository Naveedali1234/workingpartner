<nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="{{asset('admin-assets/img/avatar-7.jpg')}}" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">Naveed Ali</h2><span>Web Developer</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="{{asset('admin-assets/index.html')}}" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li class="{{ (request()->routeIs('admin.home')) ? 'active' : '' }}"><a href="{{route('admin.home')}}"> <i class="icon-home"></i>Home</a></li>
            <li><a href="{{route('admin.profile')}}"> <i class="icon-home"></i>Profile Settings</a></li>
            @if(auth()->user()->role=='superadmin')
            <li><a href="{{route('admins.index')}}"> <i class="icon-home"></i>Admins Management</a></li>
            @endif
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Registered Users</a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{route('all.sellers')}}">Sellers</a></li>
                <li><a href="{{route('all.workingPartners')}}">Working Partners</a></li>
              </ul>
            </li>
            <li><a href="#businessdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Businesses</a>
              <ul id="businessdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{route('verified.businesses')}}">Verified Businesses</a></li>
                <li><a href="{{route('unverified.businesses')}}">Unverified Businesses</a></li>
              </ul>
            </li>
            <li><a href="#offerdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Offers</a>
              <ul id="offerdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{route('sent.offers')}}">Sent Offers</a></li>
                <li><a href="{{route('accepted.offers')}}">Accepted Offers</a></li>
              </ul>
            </li>
            <li><a href="{{route('all.conversations')}}"> <i class="icon-home"></i>Conversations</a></li>
             <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" class="logout"> <i class="fa fa-sign-out"></i>Logout</a></li>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
            <!-- <li><a href="{{asset('admin-assets/login.html')}}"> <i class="icon-interface-windows"></i>Login page                             </a></li>
            <li> <a href="{{asset('admin-assets/#')}}"> <i class="icon-mail"></i>Demo
                <div class="badge badge-warning">6 New</div></a></li> -->
          </ul>
        </div>
        <!-- <div class="admin-menu">
          <h5 class="sidenav-heading">Second menu</h5>
          <ul id="side-admin-menu" class="side-menu list-unstyled"> 
            <li> <a href="{{asset('admin-assets/#')}}"> <i class="icon-screen"> </i>Demo</a></li>
            <li> <a href="{{asset('admin-assets/#')}}"> <i class="icon-flask"> </i>Demo
                <div class="badge badge-info">Special</div></a></li>
            <li> <a href="{{asset('admin-assets/')}}"> <i class="icon-flask"> </i>Demo</a></li>
            <li> <a href="{{asset('admin-assets/')}}"> <i class="icon-picture"> </i>Demo</a></li>
          </ul>
        </div> -->
      </div>
    </nav>