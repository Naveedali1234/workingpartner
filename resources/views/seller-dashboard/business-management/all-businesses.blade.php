@extends('seller-dashboard.layouts.master')
@section('content')

<div>
	<a href="{{route('business.create')}}" class="btn btn-primary">Register New Business</a>
</div>
<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <!-- <div class="card-header">
                  <h4>Striped table with hover effect</h4>
                </div> -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          
                          <th>Business Title</th>
                          <th>Business Sector</th>
                          <th>Business Industry</th>
                          <th>Status</th>
                          <th>Details</th>
                          <th>Premium Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($businesses as $business)
                        <tr>
                          <td scope="row">{{$business->title}}</td>
                          <td>{{$business->sector}}</td>
                          <td>{{$business->industry}}</td>
                          <td>{{$business->status==1?'Approved':'Not Approved yet'}}</td>
                          <td><button class="btn btn-info detailss" value="{{$business->id}}" title="Show Business Details">Details</button></td>
                          <td>@if($business->featured_business==1)
                          	<p>your business is featured</p>
                          	@else
                          	<form target="_blank" action="https://sandbox.payfast.co.za/eng/process" method="POST">

							<input type="hidden" name="merchant_id" value="10015150">
							<input type="hidden" name="merchant_key" value="aaid6ctdo8lxz">
							<input type="hidden" name="custom_str1" value="{{$business->id}}">

							<input type="hidden" name="amount" value="200.00">
							<input type="hidden" name="name_first" value="">
							<input type="hidden" name="name_last" value="">
							<input type="hidden" name="email_address" value="">
							<input type="hidden" name="cell_number" value="0823456789">

							<input type="hidden" name="item_name" value="Making your business Featured on our Website">
							<input type="hidden" name="return_url" value=" http://localhost:8000/seller/return">
							<input type="hidden" name="cancel_url" value=" http://09c04684.ngrok.io/cancel">
							<input type="hidden" name="notify_url" value=" http://localhost:8000/seller/notify">
                          	<button type="submit" title="You will have to pay to make your business featured" class="btn btn-primary">Make Business Featured</button>
                          	</form>
                          	@endif
                          	@if($business->social_media_boosting==1)
                          	<p>You activated the social media Boosting Feature</p>
                          	@else
                          	<form target="_blank" action="https://sandbox.payfast.co.za/eng/process" method="POST">
							<input type="hidden" name="merchant_id" value="10015150">
							<input type="hidden" name="merchant_key" value="aaid6ctdo8lxz">
							<input type="hidden" name="amount" value="50.00">
							<input type="hidden" name="custom_str1" value="{{$business->id}}">
							<input type="hidden" name="name_first" value="{{$business->user->name}}">
							<input type="hidden" name="name_last" value="{{$business->user->surname}}">
							<input type="hidden" name="email_address" value="{{$business->user->email}}">
							
							<input type="hidden" name="item_name" value="Making your business Boosted on Social Media">
							<input type="hidden" name="return_url" value="http://acf91fee.ngrok.io/social-media/return">
							<input type="hidden" name="cancel_url" value="http://acf91fee.ngrok.io/social-media/cancel">
							<input type="hidden" name="notify_url" value="http://acf91fee.ngrok.io/social-media/notify">
                          	<button style="margin-top: 3px;" type="submit" target="_blank" title="You will have to pay to make your business featured" class="btn btn-info">Social Media Boost</button>
                          </form>
                          @endif
                          </td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
@if($errors->any())
@foreach($errors->all() as $error)
<ul>
  <li class="alert alert-danger">{{$error}}</li>
</ul>
@endforeach
@endif
<div id="businessdetails" tabindex="-1" role="dialog" aria-labelledby="businessdetails" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Business Details</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <!-- <form> -->
          <form class="form-horizontal">
                    @csrf
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Business Title</label>
                      <div class="col-sm-10 mb-3">
                        <input type="text" disabled name="title" id="business_title" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Province</label>
                      <div class="col-sm-10 mb-3">
                        <input type="text" name="province" id="province" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">City</label>
                      <div class="col-sm-10 mb-3">
                        <input type="text" name="city" id="city" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Sector</label>
                      <div class="col-sm-10 mb-3">
                        <input type="text" name="sector" id="sector" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Industry</label>
                      <div class="col-sm-10 mb-3">
                        <input type="text" name="industry" id="industry" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Franchise</label>
                      <div class="col-sm-10 mb-3">
                        <input type="text" name="franchise" id="franchise" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Price From</label>
                      <div class="col-sm-4 mb-3">
                        <input type="text" name="price_from" id="price_from" class="form-control" disabled>
                      </div>
                      <label class="col-sm-2 form-control-label">Price To</label>
                      <div class="col-sm-4 mb-3">
                        <input type="text" name="price_to" id="price_to" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Shares Available From</label>
                      <div class="col-sm-4 mb-3">
                        <input type="text" name="shares_available_from" id="shares_available_from" class="form-control" disabled>
                      </div>
                      <label class="col-sm-2 form-control-label">Shares Available To</label>
                      <div class="col-sm-4 mb-3">
                        <input type="text" name="shares_available_to" id="shares_available_to" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Shares Percent From</label>
                      <div class="col-sm-4 mb-3">
                        <input type="text" name="share_value_from" id="shares_percent_from" class="form-control" disabled>
                      </div>
                      <label class="col-sm-2 form-control-label">Shares percent To</label>
                      <div class="col-sm-4 mb-3">
                        <input type="text" name="share_value_to" id="shares_percent_to" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Working Salary From</label>
                      <div class="col-sm-4 mb-3">
                        <input type="text" name="working_salary_from" id="working_salary_from" class="form-control" disabled>
                      </div>
                      <label class="col-sm-2 form-control-label">Working Salary To</label>
                      <div class="col-sm-4 mb-3">
                        <input type="text" name="working_salary_to" id="working_salary_to" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Description of Business</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="business_description" disabled id="business_description" placeholder="Description of Business"></textarea>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Description of Shares Available</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="shares_available_description" disabled id="shares_available_description"></textarea>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Description of Working Condition</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="working_condition_description" id="working_condition_description" disabled placeholder="Description of Working Condition"></textarea>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Description of other important details</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="other_details" id="other_details" disabled></textarea>
                      </div>
                    </div>
                  </form>
        <!-- </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('additional-js')
<script type="text/javascript">
  $(document).ready(function(){
    $('.detailss').on('click',function(){
            var business = $(this).val();
            $.ajax({
              type: 'GET',
              url:'{{url("business-details")}}'+'/'+business ,
              dataType: 'json',
              success: function(data){
                console.log(data);
                $('#business_title').val(data.title);
                $('#province').val(data.province);
                $('#city').val(data.city);
                $('#sector').val(data.sector);
                $('#industry').val(data.industry);
                $('#franchise').val(data.franchise);
                $('#price_from').val(data.asking_price_from);
                $('#price_to').val(data.asking_price_to);
                $('#shares_percent_from').val(data.shares_percent_from);
                $('#shares_percent_to').val(data.shares_percent_to);
                $('#shares_available_from').val(data.shares_available_from);
                $('#shares_available_to').val(data.shares_available_to);
                $('#working_salary_from').val(data.working_salary_from);
                $('#working_salary_to').val(data.working_salary_to);
                $('#business_description').val(data.business_description);
                $('#shares_available_description').val(data.shares_available_description);
                $('#working_condition_description').val(data.working_condition_description);
                $('#other_details').val(data.other_details);
                if(data.status==1){
                  $('#status').val('Offer Accepted');
                }
                else{
                  $('#status').val('Not Accpeted yet');
                }
                $('#businessdetails').modal('show');
              }  
            });
            });
  }); 
</script>
@endsection