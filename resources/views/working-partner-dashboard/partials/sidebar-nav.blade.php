<nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="{{asset('admin-assets/img/avatar-7.jpg')}}" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">{{auth()->user()->name}}</h2><span>Working Partner</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="#" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="{{asset('/')}}"> <i class="fa fa-home"></i>Home</a></li>
            <li><a href="{{route('workingPartner.profile')}}"> <i class="fa fa-user-o"></i>Profile Settings</a></li>
            <li><a href="{{route('working-partner.chats')}}"> <i class="fa fa-envelope-o"></i>Messages</a></li>
            <li><a href="{{route('workingPartner.offersRecieved')}}"><i class="fa fa-handshake-o"></i>Offers Received</a></li>
            <!-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{asset('admin-assets/#')}}">Page</a></li>
                <li><a href="{{asset('admin-assets/#')}}">Page</a></li>
                <li><a href="{{asset('admin-assets/#')}}">Page</a></li>
              </ul>
            </li>
            <li><a href="{{asset('admin-assets/login.html')}}"> <i class="icon-interface-windows"></i>Login page                             </a></li>
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