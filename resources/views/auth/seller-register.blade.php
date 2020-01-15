<!DOCTYPE html>
<html>
@include('front-end.partials.head')
<body>
<div id="an-main-wrapper">
     @include('front-end.partials.navigation')
      <div class="an-page-content">
      <div class="an-login-register-content">
        <div class="content">
          <a class="logo" href="{{url('/')}}"><img src="./assets/img/logo-primary.png" alt=""></a>
          <h1>Create new seller account</h1>

          <p>Already member? <a href="{{route('login')}}">Login!</a></p>

          <form class="an-form" action="{{route('register')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-4">
                <div class="element-single">
                    <div class="an-default-select-wrapper">
                        <select name="title">
                            <option value="Mr" selected>Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Dr">Dr</option>
                            <option value="Miss">Miss</option>
                            <option value="Engr">Engr</option>
                        </select>
                    </div>
                </div>
            </div>
              <div class="col-md-8">
                <div class="element-single">
                  <input type="text" class="an-form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  placeholder="Name*">
                  @error('name')
                    <p class="alert alert-danger" role="alert">
                        <small>{{ $message }}</small>
                    </p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <input type="text" class="an-form-control" name="surname" value="{{ old('surname') }}" placeholder="Surname">
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <input type="Email" class="an-form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email*">
                  @error('email')
                    <p class="alert alert-danger" role="alert">
                        <small>{{ $message }}</small>
                    </p>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
               <div class="element-single">
                  <input type="text" class="an-form-control" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Mobile Number">
                </div>
              </div>
              <div class="col-sm-6">
               <div class="element-single">
                  <input type="date" class="an-form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Date Of Birth">
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <input type="password" class="an-form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password*">
                  @error('password')
                     <p class="alert alert-danger" role="alert">
                        <small>{{ $message }}</small>
                    </p>
                  @enderror
                </div>
              </div>
             <div class="col-md-6">
                <div class="element-single">
                  <input type="password" class="an-form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" name="password_confirmation" placeholder=" Confirm Password*">
                 
                </div>
              </div>
            </div>
            <div style="display: flex;">
            <input type="checkbox" name="" id="check"> &nbsp;
            <p style="font-size: 12px;">By creating an account you have to agree the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></p>
          </div>
            <input type="hidden" name="check" value="seller">
            <button type="submit" id="submit" disabled='disabled' class="an-btn an-btn-default large-padding btn-lg">Register as Seller</button>
          </form>
        </div>
      </div>
</div>
     @include('front-end.partials.footer')
      <div class="an-loader">
        <div class="fl spinner2">
          <div class="spinner-container container1">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
          </div>
          <div class="spinner-container container2">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
          </div>
          <div class="spinner-container container3">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
          </div>
        </div>
      </div>
    </div> <!-- end main wrapper -->
    @include('front-end.partials.js-libraries')
    <script type="text/javascript">
      $(document).ready(function(){
        $('#check').click(function(){
          if($(this).prop('checked') == true){
             $('#submit').prop('disabled', false);
          }else{
               $('#submit').prop('disabled', true);
        }
     });
      });
    </script>
</body>
</html>