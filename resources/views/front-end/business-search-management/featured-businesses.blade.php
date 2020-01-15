<!DOCTYPE html>
<html>
@include('front-end.partials.head')
<body>
<div id="an-main-wrapper">
	@include('front-end.partials.navigation')
     @include('front-end.partials.banner-and-searchbar')
     <div class="an-header-banner">
     	<div class="an-listing-search-content">
     		<div class="an-listing-result-content">
     			<div class="an-tab-container">
              <div class="tab-nav">
                <h3 class="results">{{$businesses->count()}} Featured businesses found</h3>
              </div>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="all">
                  <div class="row">
                  	@foreach($businesses as $business)
                    <div class="col-md-4">
                      <div class="an-listing-single">
                        @php $pictures = explode(',',$business->pictures); @endphp
                        <div class="listing-img-container"
                          style="background: url({{asset('public/storage/'.$pictures[0])}}) center center no-repeat;
                          background-size: cover;">

                          @if($business->featured_business==1)
                          <span class="an-badge bg-primary">Featured</span>
                          @endif
                          <div class="listing-hover-content">
                            <a class="link-single" title="Visit Business Profile" href="{{route('business.details',$business->title)}}"><i class="ion-forward"></i></a>
                          </div>
                        </div>
                        <div class="listing-content">
                          <div class="listing-name">
                            <h3><a href="listing-single.html">{{$business->title}}</a></h3>
                            <div class="price">
                              <p class="color-primary">R {{$business->asking_price_from}} - R {{$business->asking_price_to}}</p>
                            </div>

                          </div>
                        </div>
                      </div> <!-- end listing-single -->
                    </div>
                    @endforeach
                  </div>

                </div> <!-- end tab pane -->
              </div> <!-- end tab-content -->
            </div> <!-- an-tab-container -->
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
</div>
@include('front-end.partials.js-libraries')
</body>
</html>
