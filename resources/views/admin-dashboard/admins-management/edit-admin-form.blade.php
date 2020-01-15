@extends('admin-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
    <a href="{{ route('admins.index') }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
      <div class="card">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card-header d-flex align-items-center">
          <h4>Update Admin Profile Settings</h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="post" action="{{route('profile.update',$user->id)}}">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2">Name</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" type="text" value="{{$user->name}}" name="name" placeholder="Name" class="form-control"><small class="form-text">Name</small>
              </div>
            </div>
              <div class="form-group row">
              <label class="col-sm-2">Surname</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" type="text" value="{{$user->surname}}" placeholder="Surname" name="surname" class="form-control"><small class="form-text">Surname</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2">Email</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" type="email" value="{{$user->email}}" name="email" placeholder="Email" class="form-control"><small class="form-text">Email</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2">Old Password</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" type="password" name="old_password" placeholder="Password" class="form-control"><small class="form-text">Password</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2">New Password</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" type="password" name="password" placeholder="Password" class="form-control"><small class="form-text">Password</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2">Confirm Password</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control"><small class="form-text">Confirm Password</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2">Mobile</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" value="{{$user->mobile}}" placeholder="Mobile Number" type="text" name="mobile" class="form-control"><small class="form-text">Mobile</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2">Date Of Birth</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" value="{{$user->date_of_birth->todateString()}}" type="text" name="date_of_birth" class="form-control"><small class="form-text">Date Of Birth</small>
              </div>
            </div>
            <div class="form-group row">       
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="Update Admin Settings" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@stop