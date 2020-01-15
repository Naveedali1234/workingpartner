<!DOCTYPE html>
<html>
@include('front-end.partials.head')
<body>
<div id="an-main-wrapper">
	@include('front-end.partials.navigation')
      <div class="an-inner-banner">

        <div class="container">
          <div class="an-advertise">
            <div class="row">
              <div class="col-sm-12">
                <div class="ad-details">
                  <h1><a href="#">{{$business->title}}</a></h1>
                  <div class="listing-meta">
                    <span class="user"><span class="meta-italic">By:</span><a href="#">{{$business->user->name}}</a></span>
                    <span>Shares Available From: R {{$business->shares_available_from}}</span>
                    <span>Shares Available To: R {{$business->shares_available_to}}</span>
                    <span>Shares Percent From: % {{$business->shares_percent_from}}</span>
                    <span>Shares Percent To: % {{$business->shares_percent_to}}</span><br><br>
                    <span>Working Salary From: R {{$business->working_salary_from}}</span>
                    <span>Working Salary To: R {{$business->working_salary_to}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end an-advertise -->

        </div> <!-- end cotnainer -->

      </div> <!-- an-header-banner -->

      <div class="an-page-content">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
              <div class="content-body">
                <div class="an-section-container pb15">
                  <div class="owl-carousel listing-slider owl-theme">
                    @foreach(explode(',',$business->pictures) as $pictures)
                    <div class="">
                      <div class="slider-item" style="background: url({{asset('public/storage/'.$pictures)}}) center center no-repeat;
                          background-size:cover;">
                      </div>
                    </div>
                    @endforeach
                  </div>

                  <div class="an-blog-post">
                    <div class="content">
                      
                      <h3 style="background-color: #99cc65; text-align: center; padding-top: 17px;">Business Description</h3>
                      @if($business->business_details!=null)
                      <p>{{$business->business_details}}</p>
                      @else
                      <p>Business Details not available</p>
                      @endif
                      <div class="an-listing-features-list" >
                        <h3 style="background-color: #99cc65; text-align: center; padding-top: 17px;">Shares Available Description</h3>
                         @if($business->shares_available_description!=null)
                        <p>{{$business->shares_available_description}}.</p>
                        @else
                      <p>Shares available description not available</p>
                        @endif
                        <h3 style="background-color: #99cc65; text-align: center; padding-top: 17px;">Working Condition Description</h3>
                        @if($business->working_condition_description!=null)
                        <p>{{$business->working_condition_description}}.</p>
                        @else
                        <p>Working Condition description not available</p>
                        @endif
                        <h3 style="background-color: #99cc65; text-align: center; padding-top: 17px;">Other Details</h3>
                        @if($business->other_details!=null)
                        <p>{{$business->other_details}}.</p>
                        @else
                        <p>Other Details not available</p>
                        @endif
                      </div>

                    </div> <!-- end content -->
                  </div>
                </div> <!-- end an-section-container -->
              </div> <!-- end content-body -->
            </div>
            <div class="col-md-3">
              <div class="an-sidebar mt60">
                <div class="widget-author">
                  <div class="an-testimonial">
                    <div class="testimonial-single">
                      <div class="image" style="background: url({{asset('assets/img/users/user1.jpg')}}) center center no-repeat; background-size: cover;"></div>
                      <p class="accents">Seller</p>
                      <a href="#" style="font-size: 12px;">{{$business->user->name}}</a>
                      <p class="position">Seller Info</p>

                      <div class="listing-meta">
                        
                        <span>{{$business->user->mobile}}</span>
                        <span>{{$business->user->email}}</span>
                      </div>

                      <button class="an-link-icon-btn" id="contact-owner"  href="{{'chats'}}"><i class="ion-ios-paperplane"></i></button>
                      @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                      @endif
                    </div> <!-- end testimonial-single -->
                  </div>

                </div> <!-- end and-widget-author -->

                
              </div> <!-- end an-sidebar -->
            </div> <!-- end col-md-3 -->
          </div>
        </div>
      </div> <!-- end an-page-content -->
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
</div>
<!-- Send Message Modal -->
  <div class="modal fade" id="send-message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Enter your message</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 clear-fix">
              <form method="post" action="{{route('message.send')}}" class="an-form">
                    @csrf
                    <input type="hidden" name="reciever_id" value="{{$business->user->id}}">
                    <input type="hidden" name="reciever_name" value="{{$business->user->name}}">
                    <input type="hidden" name="reciever_name" value="{{$business->user->name}}">
                    <textarea class="an-form-control" name="message" placeholder="Please Type Your message"></textarea>
                    <button type="submit" class="an-btn an-btn-default">Send Message</i></button>
                  </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@include('front-end.partials.js-libraries')
<script type="text/javascript">
  $(document).ready(function(){
    $('#contact-owner').click(function(){
      var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
      if(loggedIn){

        $('#send-message').modal('show');
      }
      else{
        alert('Please login or register first and then try again');
        
      }
    });
  });
</script>
</body>
</html>
