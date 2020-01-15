@extends('working-partner-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
      <div class="card">
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <a href="{{route('workingPartner.profile')}}" class="btn btn-primary btn-lg mb">Profile Settings</a>
              <a href="{{route('workingPartner.offersRecieved')}}" class="btn btn-primary btn-lg mb">Offers Recieved</a>
              <a href="{{route('working-partner.chats')}}" class="btn btn-primary btn-lg mb">Messages</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@stop