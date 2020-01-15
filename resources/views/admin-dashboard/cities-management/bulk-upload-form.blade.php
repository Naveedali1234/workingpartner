@extends('admin-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
    <a href="{{ redirect()->back()->getTargetUrl() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h4>Add Bulk Cities/Towns By Uploading Excel File</h4>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card-body">
          <p>Please Enter Following details to Add Cities/Towns</p>
          <form class="form-horizontal" method="post" action="{{route('bulkUploadCities.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2">Upload Excel File</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" type="file" placeholder="Title" name="file" required class="form-control form-control-success"><small class="form-text">Upload Excel File</small>
              </div>
            </div> 
            <div class="form-group row">
              <label class="col-sm-2">Select Province</label>
              <div class="col-sm-10">
                <select name="province" required class="form-control">
                  <option value="">Please select Province</option>
                	@foreach($provinces as $province)
                		<option value="{{$province->id}}">{{$province->name}}</option>
                	@endforeach
                </select>
                <small class="form-text">Name of the Province</small>
              </div>
            </div>            
            <div class="form-group row">       
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="Add Cities" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@stop