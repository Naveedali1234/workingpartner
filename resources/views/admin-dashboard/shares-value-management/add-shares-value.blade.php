@extends('admin-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
    <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h4>Add Share Value Form</h4>
        </div>
        <div class="card-body">
          <p>Please Enter Following details to Add Share Value Price</p>
          <form class="form-horizontal" method="post" action="{{route('share_value.store')}}">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2">Share Value From</label>
              <div class="col-sm-3">
                <input id="inputHorizontalSuccess" type="text" placeholder="Share Value From" name="from" class="form-control form-control-success"><small class="form-text">Share Value from</small>
              </div>
              <div class="form-group row">
              <label class="col-sm-4">Share Value To</label>
              <div class="col-sm-8">
                <input id="inputHorizontalSuccess" type="text" placeholder="Share Value To" name="to" class="form-control form-control-success"><small class="form-text">Share Value To</small>
              </div>

            </div>            
            <div class="form-group row">       
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="Add Share Value" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@stop