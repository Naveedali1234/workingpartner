   <header class="an-header">
        <nav class="navbar navbar-default home-nav">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand default" href="index.html"><img src="{{asset('assets/img/logo-primary.png')}}" alt=""></a>
              <a class="navbar-brand sticky" href="index.html"><img src="{{asset('assets/img/logo-new.png')}}" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="{{asset('/')}}">Home</a></li>

                <!-- <li class="dropdown">
                  <a href="{{route('business.featured')}}">Featured Businesses</a>
                </li> -->

                <!-- <li> -->
                  <!-- <a href="#">Business shares for Sale</a> -->
                  <!-- <ul class="dropdown-menu">
                    <li><a href="agents.html">Agent listing</a></li>
                    <li><a href="agent-profile.html">Agent profile</a></li>
                    <li><a href="agent-profile-2.html">Agent profile banner</a></li>
                  </ul> -->
                <!-- </li> -->
                <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                @guest
                <li class="dropdown">
                  <a href="{{route('login')}}">Login</a>
                </li>
                 <li class="dropdown">
                  <a data-toggle="modal" href="#register">Register</a>

                </li>
                @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                      </form>
                    </li>
                    @if(auth()->user()->role == 'superadmin')
                    <li><a href="{{route('admin.home')}}">My Account</a></li>
                    @elseif(auth()->user()->role == 'seller')
                    <li><a href="{{route('seller.home')}}">My Account</a></li>
                    @elseif(auth()->user()->role == 'working_partner')
                    <li><a href="{{route('workingPartner.home')}}">My Account</a></li>
                    @endif
                  </ul>
                </li>
                @endguest
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header> <!-- end an-header -->
