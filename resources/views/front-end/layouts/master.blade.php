<!DOCTYPE html>
<html lang="en">
 @include('front-end.partials.head')
  <body>
    <div id="an-main-wrapper">

     @include('front-end.partials.navigation')
     @include('front-end.partials.banner-and-searchbar')
      <div class="an-page-content">
        @include('front-end.partials.how-it-works')

       @include('front-end.partials.featured-listing')

        @include('front-end.partials.testimonials')
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    
    <script type="text/javascript">
     @if(Session::has('message'))
    var type = "{{ Session::get('alert-type') }}";
    switch(type){
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
          case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
    }
  @endif
   </script>
  </body>
</html>
