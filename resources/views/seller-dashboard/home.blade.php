@extends('seller-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
      <div class="card">
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <a href="{{route('seller.profile')}}" class="btn btn-primary btn-lg mb">Profile Settings</a>
              <a href="{{route('business.create')}}" class="btn btn-primary btn-lg mb">Register New Business</a>
              <a href="{{route('business.index')}}" class="btn btn-primary btn-lg mb">Businesses Registered</a>
            </div>
            <div class="col-md-12">
              <a href="{{route('offers.recieved')}}" class="btn btn-primary btn-lg mb">Offers Recieved</a>
              <a href="{{route('offer.index')}}" class="btn btn-primary btn-lg mb">Sent Offers</a>
              <a href="{{route('seller.chats')}}" class="btn btn-primary btn-lg mb">Messages</a>
              
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@stop