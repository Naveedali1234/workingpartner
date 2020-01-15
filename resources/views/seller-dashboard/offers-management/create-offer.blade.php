@extends('seller-dashboard.layouts.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Create New Offer</h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="{{route('offer.store')}}" method="post">
                  	@csrf
                    <input type="hidden" name="sender_id" value="{{auth()->user()->id}}">
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Business Name</label>
                      <div class="col-sm-10 mb-3">
                        <select name="business_title" id="province" class="form-control business">
                          <option>Select Business</option>
                        	@foreach($businesses as $business)
                          <option value="{{$business->title}}">{{$business->title}}</option>
                          @endforeach
                        </select>
                      </div>
                  	</div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Reciever Email</label>
                      <div class="col-sm-10 mb-3">
                         <select name="email" required id="email" class="form-control myselect">
                          <option value="">Select Working Partner Email</option>
                          @foreach($users as $user)
                          <option value="{{$user->email}}">{{$user->email}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Description of the offer</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" required name="description" placeholder="Description of Offer"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Amount</label>
                      <div class="col-sm-10 mb-3">
                        <input type="number" required name="amount" class="form-control" placeholder="Amount which the Buyer will pay">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Percent Share %</label>
                      <div class="col-sm-10 mb-3">
                        <input type="number" required name="percent_share" class="form-control" placeholder="Percentage in the business a buyer will get">
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Send Offer</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection
@section('additional-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2.min.css">

  <script type="text/javascript">

      $(".myselect").select2({
        theme: ""
      });

</script>
@endsection