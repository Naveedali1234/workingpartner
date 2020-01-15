@extends('admin-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
    <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h4>Add Province Form</h4>
        </div>
        <div class="card-body">
          <p>Please Enter Following details to Add Province</p>
          <form class="form-horizontal" method="post" action="{{route('provinces.store')}}">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2">Province Name</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" type="text" placeholder="Title" name="name" class="form-control form-control-success"><small class="form-text">Name of the Province</small>
              </div>
            </div>            
            <div class="form-group row">       
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="Add Province" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@stop