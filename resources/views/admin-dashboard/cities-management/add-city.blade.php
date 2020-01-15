@extends('admin-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
    <a href="{{ route('provinces.index') }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
      <div class="card">
        <a href="{{route('cities.bulkupload')}}" class="btn btn-primary">Bulk Upload cities/Towns</a>
        <div class="card-header d-flex align-items-center">
          <h4>Add Single City/Town</h4>
        </div>
        <div class="card-body">
          <p>Please Enter Following details to Add City/Town</p>
          <form class="form-horizontal" method="post" action="{{route('cities.store')}}">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2">City/Town Name</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" type="text" placeholder="Title" name="name" class="form-control form-control-success"><small class="form-text">Name of the City/Town</small>
              </div>
            </div> 
            <div class="form-group row">
              <label class="col-sm-2">Select Province</label>
              <div class="col-sm-10">
                <select name="province" class="form-control">
                	@foreach($provinces as $province)
                		<option value="{{$province->id}}">{{$province->name}}</option>
                	@endforeach
                </select>
                <small class="form-text">Name of the Province</small>
              </div>
            </div>            
            <div class="form-group row">       
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="Add City" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@stop