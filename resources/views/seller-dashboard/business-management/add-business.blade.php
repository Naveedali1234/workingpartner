@extends('seller-dashboard.layouts.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Register Business</h4>
                </div>
                <div class="card-body">
                  @if($errors->any())
@foreach($errors->all() as $error)
<ul>
  <li class="alert alert-danger">{{$error}}</li>
</ul>
@endforeach
@endif
                  <form onsubmit="return check()" id="registerbusiness" class="form-horizontal" action="https://sandbox.payfast.co.za/eng/process" method="post" enctype="multipart/form-data">
                  	@csrf
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="merchant_id" value="10015150">
                    <input type="hidden" name="merchant_key" value="aaid6ctdo8lxz">
                    
                    <input type="hidden" name="amount" value="100">
                    
                    <!-- <input type="hidden" name="name_last" value=""> -->
                    <input type="hidden" name="email_address" value="naveed@gmail.com">
                    <input type="hidden" name="item_name" value="Register a Business Payment">
                    <input type="hidden" name="return_url" value=" http://1a812099.ngrok.io/business/return">
                    <input type="hidden" name="cancel_url" value=" http://1a812099.ngrok.io/business/cancel">
                    <input type="hidden" name="notify_url" value=" http://1a812099.ngrok.io/business/notify">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Business Title</label>
                      <div class="col-sm-10 mb-3">
                        <input type="text" required name="title" class="form-control" placeholder="Business Title">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Select Province</label>
                      <div class="col-sm-10 mb-3">
                        <select name="province" id="province" class="form-control">
                          <option>Select Province</option>
                        	@foreach($provinces as $province)
                          <option value="{{$province->name}}">{{$province->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  	</div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Select City</label>
                      <div class="col-sm-10 mb-3">
                        <select name="city" id="city" class="form-control">
                          <option>Please Select Province First</option>
                        </select>
                      </div>
                  	</div>
                  	<div class="form-group row">
                      <label class="col-sm-2 form-control-label">Select Sector</label>
                      <div class="col-sm-10 mb-3">
                        <select name="sector" id="sector" class="form-control">
                          @foreach($sectors as $sector)
                          <option value="{{$sector->name}}">{{$sector->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  	</div>
                  	<div class="form-group row">
                      <label class="col-sm-2 form-control-label">Select Industry</label>
                      <div class="col-sm-10 mb-3">
                        <select name="industry" id="industry" class="form-control">
                          @foreach($industries as $industry)
                          <option value="{{$industry->name}}">{{$industry->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  	</div>
                  	<div class="form-group row">
                      <label class="col-sm-2 form-control-label">Select Franchise</label>
                      <div class="col-sm-10 mb-3">
                        <select name="franchise" id="franchise" class="form-control">
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                        </select>
                      </div>
                  	</div>
                  	<div class="form-group row">
                      <label class="col-sm-2 form-control-label">Asking Price</label>
                      <div class="col-sm-4 mb-3">
                        <select name="asking_price" id="price_from" class="myselect form-control">
                          @foreach($asking_prices as $asking_price)
                          <option value='{{$asking_price->from}},{{$asking_price->to}}'>R{{$asking_price->from}} to R{{$asking_price->to}}</option>
                          @endforeach
                        </select>
                      </div>
                      <label class="col-sm-2 form-control-label">Shares Available</label>
                      <div class="col-sm-4 mb-3">
                        <select name="shares_available" id="shares_available_from" class="form-control myselect">
                          @foreach($shares_available as $share_available)
                          <option value="{{$share_available->from}},{{$share_available->to}}">{{$share_available->from}}% to {{$share_available->to}}%</option>
                          @endforeach
                        </select>
                      </div>
                  	</div>
                  	<!-- <div class="form-group row">
                      
                      
                  	</div> -->
                  	<div class="form-group row">
                      <label class="col-sm-2 form-control-label">Share Value</label>
                      <div class="col-sm-4 mb-3">
                        <select name="shares_percent" id="share_value_from" class="form-control myselect">
                          @foreach($share_values as $share_value)
                          <option value="{{$share_value->from}},{{$share_value->to}}">R{{$share_value->from}} to R{{$share_value->to}} </option>
                          @endforeach
                        </select>
                      </div>
                      <label class="col-sm-2 form-control-label">Working Salary from</label>
                      <div class="col-sm-4 mb-3">
                        <select name="working_salary_from" id="working_salary_from" class="form-control myselect">
                          @foreach($working_salaries as $working_salary)
                          <option value="{{$working_salary->from}}">R{{$working_salary->from}}</option>
                          @endforeach
                        </select>
                         <label class="form-control-label">To</label>
                        <select name="working_salary_to" id="working_salary_from" class="form-control myselect">
                          @foreach($working_salaries as $working_salary)
                          <option value="{{$working_salary->to}}">R{{$working_salary->to}}</option>
                          @endforeach
                        </select>
                      </div>
                  	</div>
                  	<div class="form-group row">
                      
                      
                  	</div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Description of Business</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="business_description" id="business_description" placeholder="Description of Business"></textarea>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Description of Shares Available</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="shares_available_description" placeholder="Description of Shares Available"></textarea>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Description of Working Condition</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="working_condition_description" placeholder="Description of Working Condition"></textarea>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">What if Things Go Wrong?</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="what_if" placeholder="What if Things Go Wrong?"></textarea>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Description of other important details</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="other_details" placeholder="Description of other important details"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Business Image 1</label>
                      <div class="col-sm-10">
                        <input type="file" name="pictures[]">
                        <small>This image is required</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Business Image 2</label>
                      <div class="col-sm-10">
                        <input type="file" name="pictures[]">
                        <small>Want to add more business images?</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Business Image 3</label>
                      <div class="col-sm-10">
                        <input type="file" name="pictures[]">
                        <small>Want to add more business images?</small>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <button type="submit" id="submit" onclick="" class="btn btn-primary">Register Business</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
</div>

@endsection
@section('additional-js')
<script type="text/javascript">
  function check(){
     var checking = false;
    var form = $('#registerbusiness')[0];
    var formData = new FormData(form);
   $.ajax({
              type: 'POST',
              async: false,
              url:'{{url("seller/business_register")}}',
              data: formData,
              processData: false,
              contentType: false,
              success: function(data){
                if(data==1){
                  checking = true;
                }
                
              }  
            });
   return checking;
  }
  // $(document).ready(function(){
  //   $('#submit').on('click',function(event){
  //           $('#registerbusiness').submit();
            
  //           console.log('submit');
  //           });
  // }); 
</script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2.min.css">

  <script type="text/javascript">

      $(".myselect").select2({
        theme: ""
      });

</script>
@endsection