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
          <h1>Create new Working Partner account</h1>

          <p>Already member? <a href="{{route('login')}}">Login!</a></p>

          <form class="an-form" action="{{route('register')}}" method="post" enctype="multipart/form-data">
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
                  <input type="text" class="an-form-control @error('name') is-invalid @enderror" required name="name" value="{{ old('name') }}"  placeholder="Name*">
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
                  <input type="email" class="an-form-control @error('email') is-invalid @enderror" required name="email" value="{{ old('email') }}" placeholder="Email*">
                  @error('email')
                    <p class="alert alert-danger" role="alert">
                        <small>{{ $message }}</small>
                    </p>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
               <div class="element-single">
                  <input type="text" required class="an-form-control" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Mobile Number">
                </div>
              </div>
              <div class="col-sm-6">
               <div class="element-single">
                  <input type="date" class="an-form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Date Of Birth">
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <input type="password" required class="an-form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password*">
                  @error('password')
                     <p class="alert alert-danger" role="alert">
                        <small>{{ $message }}</small>
                    </p>
                  @enderror
                </div>
              </div>
             <div class="col-md-6">
                <div class="element-single">
                  <input type="password" required class="an-form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" name="password_confirmation" placeholder=" Confirm Password*">
                 
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <div class="an-default-select-wrapper">
                  <select name="nationality">
                      @foreach($nationalities as $nationality)
                        <option value="{{$nationality->nationality}}">{{$nationality->nationality}}</option>
                      @endforeach
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <div class="an-default-select-wrapper">
                  <select name="city">
                      @foreach($cities as $city)
                        <option value="{{$city->name}}">{{$city->name}}</option>
                      @endforeach
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <div class="an-default-select-wrapper">
                        <select name="language">
                          @foreach($languages as $language)
                            <option value="{{$language->name}}">{{$language->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="element-single">
                  <input type="text" required class="an-form-control" name="qualification" value="{{ old('qualification') }}" placeholder="Qualification">
                </div>
              </div>
              <div class="col-md-12">
                <div class="element-single">
                  <label class="an-form-control">Upload Documents</label>
                  <input type="file" class="an-form-control" multiple name="file[]" value="{{ old('qualification') }}" placeholder="Qualification">
                </div>
              </div>
             <div class="col-md-6">
                <div class="element-single">
                  <textarea name="previous_work" required class="an-form-control" placeholder="Previous Work">{{ old('previous_work') }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <textarea name="current_work" required class="an-form-control" placeholder="Current Work">{{ old('current_work') }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <textarea class="an-form-control" required name="business_experience" placeholder="Experience in Business">{{ old('business_experience') }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <textarea name="interest" class="an-form-control" placeholder="Interest">{{ old('interest') }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <textarea class="an-form-control" placeholder="Hobbies" name="hobbies">{{ old('hobbies') }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <textarea class="an-form-control" name="strengths" placeholder="Strengths">{{ old('strengths') }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <textarea name="weakness" class="an-form-control" placeholder="Weakness">{{ old('weakness') }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                  <input type="text" required value="{{ old('source_of_finance') }}" name="source_of_finance" class="an-form-control" placeholder="Source of Finance">
                </div>
              </div>
              <div class="col-md-6">
                <div class="element-single">
                    <div class="an-default-select-wrapper">
                        <select name="funding_available">
                            <option value="no">Funds Availble?</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="element-single">
                  <textarea name="what_if" required class="an-form-control" placeholder="What If Things Go Wrong?">{{ old('what_if') }}</textarea>
                </div>
              </div>
            </div>
            <input type="hidden" name="check" value="working_partner">
            <div style="display: flex;">
            <input type="checkbox" name="" id="check"> &nbsp;
            <p style="font-size: 12px;">By creating an account you have to agree the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></p>
          </div>

            <button type="submit" id="submit" disabled class="an-btn an-btn-default large-padding btn-lg">Register as Working Partner</button>
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
          console.log('hello');
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