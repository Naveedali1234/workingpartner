@extends('working-partner-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
      <div class="card">
        @if($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif
    @if($message = Session::get('danger'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif
        <div class="card-header d-flex align-items-center">
          <h4>Profile Settings</h4>
        </div>
        <div class="card-body">
          <!-- <p>Do you want to update the profile?</p>
          <button id="update" class="btn btn-primary">Click Here</button> -->
          <form class="form-horizontal" method="post" action="{{route('workingPartner.profileUpdate')}}">
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
            <div class="form-group row">
              <label class="col-sm-3">Nationality</label>
              <div class="col-sm-6">
                <input id="nationality" type="text" value="{{auth()->user()->working_partner_detail->nationality}}" name="nationality" class="form-control form-control-success"><small class="form-text">Nationality</small>
              </div>
            </div> 
            <div class="form-group row">
              <label class="col-sm-3">Language</label>
              <div class="col-sm-6">
                <input id="language" type="text" value="{{auth()->user()->working_partner_detail->language}}" name="language" class="form-control form-control-success"><small class="form-text">Language</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">City</label>
              <div class="col-sm-6">
                <input id="city" type="text" value="{{auth()->user()->working_partner_detail->city}}" name="city" class="form-control form-control-success"><small class="form-text">City</small>
              </div>
            </div> 
            <div class="form-group row">
              <label class="col-sm-3">Previous Work</label>
              <div class="col-sm-6">
                <textarea id="previous_work" name="previous_work" class="form-control form-control-success">{{auth()->user()->working_partner_detail->previous_work}}</textarea><small class="form-text">Previous Work</small>
              </div>
            </div> 
            <div class="form-group row">
              <label class="col-sm-3">Current Work</label>
              <div class="col-sm-6">
                <textarea id="current_work" name="current_work" class="form-control form-control-success">{{auth()->user()->working_partner_detail->current_work}}</textarea>
                <small class="form-text">Current Work</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Business Experience</label>
              <div class="col-sm-6">
                <textarea id="business_experience" name="business_experience" class="form-control form-control-success">{{auth()->user()->working_partner_detail->business_experience}}</textarea>
                  <small class="form-text">Business Experience</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Qualification</label>
              <div class="col-sm-6">
                <input id="qualification" type="text" value="{{auth()->user()->working_partner_detail->qualifications}}" name="qualifications" class="form-control form-control-success"><small class="form-text">Qualification</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Interest</label>
              <div class="col-sm-6">
                <textarea id="interest" name="interest" class="form-control form-control-success">{{auth()->user()->working_partner_detail->interest}}</textarea>
                <small class="form-text">Interest</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Hobbies</label>
              <div class="col-sm-6">
                <textarea id="hobbies" name="hobbies" class="form-control form-control-success">{{auth()->user()->working_partner_detail->hobbies}}</textarea>
                  <small class="form-text">Hobbies</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Strengths</label>
              <div class="col-sm-6">
                <textarea id="strengths" name="strengths" class="form-control form-control-success">{{auth()->user()->working_partner_detail->strengths}}</textarea>
                <small class="form-text">Strengths</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Weakness</label>
              <div class="col-sm-6">
                <textarea id="weakness" name="weakness" class="form-control form-control-success">{{auth()->user()->working_partner_detail->weakness}}</textarea>
                <small class="form-text">Weakness</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Source of Finance</label>
              <div class="col-sm-6">
                <input id="source_of_finance" type="text" value="{{auth()->user()->working_partner_detail->source_of_finance}}" name="source_of_finance" class="form-control form-control-success"><small class="form-text">Source of Finance</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Funding Available</label>
              <div class="col-sm-6">
                <select name="funding_available" id="funding_available" class="form-control form-control-success">
                  <option value="yes" {{ auth()->user()->funds_available === "yes" ? "selected" : "" }}>Yes</option>
                  <option value="no" {{ auth()->user()->funds_available === "no" ? "selected" : "" }}>No</option>
                </select>
                <small class="form-text">Funding Available</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">What If Things Go Wrong?</label>
              <div class="col-sm-6">
                <textarea id="what_if" name="what_if" class="form-control form-control-success">{{auth()->user()->working_partner_detail->what_if}}</textarea>
                <small class="form-text">What If Things Go Wrong?</small>
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