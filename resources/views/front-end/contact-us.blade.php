<!DOCTYPE html>
<html>
<head>
	@include('front-end.partials.head')
</head>
<body>
 @include('front-end.partials.navigation')
 <div id="an-main-wrapper">
 	<div class="an-inner-banner has-bg" style="background: url('./assets/img/slider2.jpg') center center no-repeat;
        background-size: cover;">
        <div class="overlay"></div>

        <div class="container">
          <div class="an-title-container">
            <h1 class="an-title">Contact</h1>
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Contact</li>
            </ol>

          </div> <!-- end title container -->

        </div> <!-- end cotnainer -->
      </div> <!-- an-header-banner -->


      <div class="an-page-content">
        <div class="an-contact-us-content">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="contact-details">
                  <div class="address-single">
                    <i class="ion-android-pin"></i>
                    <h4 class="an-small-title">Address</h4>
                    <p>115 The Vale, London, W3 7QR</p>
                  </div>

                  <div class="address-single">
                    <i class="ion-android-call"></i>
                    <h4 class="an-small-title">Telephone</h4>
                    <p>+971 1234 3456</p>
                  </div>

                  <div class="address-single">
                    <i class="ion-android-mail"></i>
                    <h4 class="an-small-title">Email</h4>
                    <p>example@example.com</p>
                  </div>

                  <!-- <div class="address-single">
                    <i class="ion-android-time"></i>
                    <h4 class="an-small-title">Opening hours</h4>
                    <p>Snd - Trd <span>08.00 - 20.00</span></p>
                    <p>Frd - Strd <span>12.00 - 20.00</span></p>
                  </div> -->
                </div>
              </div>

              <div class="col-md-6">
                <div class="contact-details">
                  <h4 class="an-small-title">Send Us Message</h4>
                  <form action="{{route('contact-us-message')}}" method="post" class="an-form">
                  	@csrf
                    <div class="row">
                      <div class="col-sm-6">
                        <input class="an-form-control" name="name" required type="text" placeholder="Your name">
                      </div>
                      <div class="col-sm-6">
                        <input class="an-form-control" name="email" required type="text" placeholder="Your email">
                      </div>
                      <div class="col-sm-12">
                        <textarea class="an-form-control" name="message" placeholder="Type your message"></textarea>
                      </div>
                      <div class="col-sm-12">
                        <button type="submit" class="an-btn an-btn-default">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- end an-contact-us-content -->
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
    </div> <!-- end main wrapper -->
   @include('front-end.partials.js-libraries')
</body>
</html>