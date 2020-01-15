@extends('admin-dashboard.layouts.master')
@section('content')
<div class="row">
            <div class="col-lg-12">
              <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
              <div class="card">
                <div class="card-header">
                  <h4>Unverified Businesses</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="myTable">
                      <thead>
                        <tr>
                          <th>Unique ID</th>
                          <th>Business Image</th>
                          <th>Business Title</th>
                          <th>Business Sector</th>
                          <th>Business Owner Name</th>
                          <th>Business Industry</th>
                          <th>Business Details</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($businesses as $business)
                        <tr>
                          <td>{{$business->id}}</td>
                          <td>
                            @foreach(explode(',',$business->pictures) as $pictures)
                            <img width="50px" height="50px" src="{{asset('public/storage/'.$pictures)}}" style="margin-top:2px;">
                            @endforeach
                          </td>
                          <td scope="row">{{$business->title}}</td>
                          <td>{{$business->sector}}</td>
                          <td>{{$business->user->name}}</td>
                          <td>{{$business->industry}}</td>
                          <td><button class="btn btn-info detailss" value="{{$business->id}}" title="Show Business Details">Details</button></td>
                          <td>
                            <button class="btn btn-primary btn-xs suggestChanges" style="margin-bottom: 2px;" value="{{$business->id}}">Suggest Changes</button>
                          	<a href="{{route('business.verify',$business->id)}}" class="btn btn-primary btn-xs" style="margin-bottom: 2px;">Verify Business</a>
                            <a href="{{route('business.destroyy',$business->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete the business?')">Delete Business</a>
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
                      <label class="col-sm-2 form-control-label">Share Value From</label>
                      <div class="col-sm-4 mb-3">
                        <input type="text" name="share_value_from" id="shares_percent_from" class="form-control" disabled>
                      </div>
                      <label class="col-sm-2 form-control-label">Share Value To</label>
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
                      <label class="col-sm-2 form-control-label">What if Things go Wrong?</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="what_if" id="what_if" disabled placeholder="What If Things Go Wrong"></textarea>
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
<div class="modal fade" id="suggestChangesmodal" tabindex="-1" role="dialog" aria-labelledby="businessdetails" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="exampleModalLabel" class="modal-title">Please suggest changes for the business owner</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <!-- <form> -->
          <form class="form-horizontal" method="post" action="{{route('suggestChanges')}}">
                    @csrf
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Description of Business</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="message" id="business_description" placeholder="Description of Business"></textarea>
                      </div>
                    </div>
                    <div class="line"></div>
                    <input type="hidden" name="business_id" value="" id="business_id">
                    <div class="form-group row">
                      <div class="col-sm-2">
                      </div>
                      <div class="col-sm-10">
                        <input type="submit" value="send changes" class="btn btn-primary">
                      </div>
                    </div>
                  </form>
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
                $('#what_if').val(data.what_if);
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
    $('.suggestChanges').on('click',function(){
            var business = $(this).val();
              $('#business_id').val(business);
              $('#suggestChangesmodal').modal('show');
            });
  }); 
</script>
@endsection