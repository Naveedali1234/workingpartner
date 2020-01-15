 <div class="an-header-banner has-bg" style="background: url('{{asset('assets/img/home.jpg')}}') center center no-repeat;
        background-size: cover;">
        <div class="home-banner-content">
          <div class="overlay"></div>
          <div class="container">
            <div class="details">
              
              <h1 class=""><span>Business Shares</span> for Sale</h1>
              <p class="">Your desire business is just one click away.</p>
            </div>


            <div class="an-search-container">
              <div class="an-tab-container">
                <div class="tab-nav">
                  <ul class="nav nav-tabs" role="tablist">
                    <li style="width: 100%;"><a href="#buy" aria-controls="buy" role="tab">Looking for <span>Business Shares ?</span></a></li>
                   <!--  <li role="presentation"><a href="#rent" aria-controls="rent" role="tab" data-toggle="tab">Rent</a></li> -->
                  </ul>
                </div>

                <!-- Tab panes -->
                <div class="tab-">
                  <div role="tabpanel" class="tab-pane fade in active" id="buy">
                    <form action="{{route('business.search')}}" method="get">
                      <div class="search-fields">
                        <div class="row">
                         <!--  <div class="col-md-4">
                            <input class='an-form-control' type="text" placeholder="Enter location">
                          </div>
                          <div class="col-md-4">
                            <input class='an-form-control' name="datestart" type="text" placeholder="Date">
                          </div> -->
                          <div class="col-md-3">
                            <div class="an-default-select-wrapper">
                              <select id="province" name="province">
                                <option value="">Select Province</option>
                                @foreach($provinces as $province)
                                <option value="{{$province->name}}">{{$province->name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div id="divContent" class="an-default-select-wrapper">
                              <select name="city" id="city1">
                                <option value="">Select Province First</option>
                              </select>
                            </div>
                        
                          </div>
                          <div class="col-md-3">
                            <div class="an-default-select-wrapper">
                              <select name="asking_price_from" id="price_from">
                                <option value="">Asking Price From</option>
                                @foreach($asking_prices as $asking_price)
                                <option value="{{$asking_price->from}}">{{$asking_price->from}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="col-sm-3">
                            <div class="an-default-select-wrapper">
                              <select name="asking_price_to" id="price_to">
                                <option value="">Asking Price To</option>
                                @foreach($asking_prices as $asking_price)
                                <option value="{{$asking_price->to}}">{{$asking_price->to}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="an-default-select-wrapper">
                              <select name="shares_available_from" id="shares_available_from">
                                <option value="">Shares Available From</option>
                                @foreach($shares_available as $share_available)
                                <option value="{{$share_available->from}}">{{$share_available->from}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="an-default-select-wrapper">
                              <select name="shares_available_to" id="shares_available_to">
                                <option value="">Shares Available To</option>
                                @foreach($shares_available as $share_available)
                                <option value="{{$share_available->to}}">{{$share_available->to}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="an-default-select-wrapper">
                              <select name="shares_percent_from" id="share_value_from">
                                <option value="">Share Percent From</option>
                                @foreach($share_values as $share_value)
                                <option value="{{$share_value->from}}">{{$share_value->from}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="an-default-select-wrapper">
                              <select name="shares_percent_to" id="share_value_to">
                                <option value="">Share Percent To</option>
                                @foreach($share_values as $share_value)
                                <option value="{{$share_value->to}}">{{$share_value->to}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="an-default-select-wrapper">
                              <select name="working_salary_from" id="working_salary_from">
                                <option value="">Working Salary From</option>
                                @foreach($working_salaries as $working_salary)
                                <option value="{{$working_salary->from}}">{{$working_salary->from}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="an-default-select-wrapper">
                              <select name="working_salary_to" id="working_salary_to">
                                <option value="">Working Salary To</option>
                                @foreach($working_salaries as $working_salary)
                                <option value="{{$working_salary->to}}">{{$working_salary->to}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="an-default-select-wrapper">
                              <select name="sector">
                                <option value="">Sector</option>
                               @foreach($sectors as $sector)
                                <option value="{{$sector->name}}">{{$sector->name}}</option>
                              @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="an-default-select-wrapper">
                              <select name="franchise" id="franchise">
                                <option value="">Franchise</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="an-default-select-wrapper">
                              <select name="industry">
                                <option value="">Select Industry</option>
                                @foreach($industries as $industry)
                                  <option value="{{$industry->name}}">{{$industry->name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <!-- <div class="col-sm-4">
                            <div class="an-range-slider alter">
                              <div id="slider"></div>
                            </div>
                          </div> -->
                          <div class="col-sm-12">
                            <button id="search_button" class="an-btn an-btn-default icon-left fluid"><i class="fa fa-search"></i>Search</button>
                          </div>
                          <!-- end nested row -->
                        </div>
                      </div>
                    </form>
                  </div> <!-- end tab pane -->
                  
                </div> <!-- end tab-content -->
              </div> <!-- an-tab-container -->

            </div> <!-- end an-search-container -->
          </div>
        </div>
      </div> <!-- end an-header-banner -->
