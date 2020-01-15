<!DOCTYPE html>
<html>
@include('front-end.partials.head')
<body>
<div id="an-main-wrapper">
     @include('front-end.partials.navigation')
     <div class="an-login-register-content">
        <div class="content">
          <a class="logo" href="index.html"><img src="./assets/img/logo-primary.png" alt=""></a>
          <h1>Welcome to Estate</h1>
          <p>Don't have an account? <a href="register.html">Sign Up!</a></p>
          @if($errors->any())
      @foreach($errors->all() as $error)
      <ul>
        <li class="alert alert-danger">{{$error}}</li>
      </ul>
      @endforeach
    @endif
          <form class="an-form" action="{{route('login')}}" method="post">
          	@csrf
            <div class="row">
              <div class="col-sm-12">
                <input type="email"  class="an-form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="E mail">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-sm-12">
                <input type="password" class="an-form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-sm-12">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                  </label>
              </div>
            </div>
            <button type="submit" class="an-btn an-btn-default large-padding">Login</button>
          </form>
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
</body>
</html>