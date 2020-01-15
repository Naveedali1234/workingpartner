@extends('seller-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h4>Profile Settings</h4>
        </div>
        <div class="card-body">
          <!-- <p>Do you want to update the profile?</p>
          <button id="update" class="btn btn-primary">Click Here</button> -->
          <form class="form-horizontal" method="post" action="{{route('seller.profileUpdate')}}">
            @csrf
            <div class="form-group row">
              <label class="col-sm-3">Title</label>
              <div class="col-sm-6">
                <select name="title" id="title" class="form-control">
                  <option value="Mr" {{ auth()->user()->title === "Mr" ? "selected" : "" }}>Mr</option>
                  <option value="Mrs" {{ auth()->user()->title === "Mrs" ? "selected" : "" }}>Mrs</option>
                </select>
              </div>
            </div>
              <div class="form-group row">
              <label class="col-sm-3">Name</label>
              <div class="col-sm-6">
                <input id="name" type="text" value="{{auth()->user()->name}}" name="name" class="form-control form-control-success"><small class="form-text">Name</small>
              </div>
            </div> 
            <div class="form-group row">
              <label class="col-sm-3">Surname</label>
              <div class="col-sm-6">
                <input id="surname" type="text" value="{{auth()->user()->surname}}" name="surname" class="form-control form-control-success"><small class="form-text">Surame</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Email</label>
              <div class="col-sm-6">
                <input id="email" type="text" title="You would have to verify your email after changing the email address" value="{{auth()->user()->email}}" name="email" class="form-control form-control-success"><small class="form-text">Email</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Mobile</label>
              <div class="col-sm-6">
                <input id="mobile" type="text" value="{{auth()->user()->mobile}}" name="mobile" class="form-control form-control-success"><small class="form-text">Mobile</small>
              </div>
            </div>   
            <div class="form-group row">
              <label class="col-sm-3">Date Of Birth</label>
              <div class="col-sm-6">
                <input id="date_of_birth" type="text" value="{{auth()->user()->date_of_birth}}" name="date_of_birth" class="form-control form-control-success"><small class="form-text">Date of Birth</small>
              </div>
            </div>            
            <div class="form-group">       
              <div class="">
                <input type="submit" value="Update Profile" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@stop