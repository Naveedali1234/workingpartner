 <div class="an-section-container">
          <div class="container">
            <div class="an-title-container">
              <h1 class="an-title">Featured Listing</h1>
              <p class="an-sub-title">Some of our featured listing.</p>
            </div> <!-- end title container -->

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
            <div style="text-align: center;">
            {{ $businesses->links() }}
          </div>
          </div> <!-- end /container -->
        </div> <!-- end /an-section-container -->