@extends('admin-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
    <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h4>Add Shares Available Form</h4>
        </div>
        <div class="card-body">
          <p>Please Enter Following details to Add Shares Available Price</p>
          <form class="form-horizontal" method="post" action="{{route('shares_available.store')}}">
            @csrf
            <div class="form-group row">
              <label class="col-sm-2">Shares Available From</label>
              <div class="col-sm-3">
                <input id="inputHorizontalSuccess" type="text" placeholder="Shares Available From" name="from" class="form-control form-control-success"><small class="form-text">Shares Available from</small>
              </div>
              <div class="form-group row">
              <label class="col-sm-4">Shares Available To</label>
              <div class="col-sm-8">
                <input id="inputHorizontalSuccess" type="text" placeholder="Shares Available To" name="to" class="form-control form-control-success"><small class="form-text">Shares Available To</small>
              </div>

            </div>            
            <div class="form-group row">       
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="Add Shares Available" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@stop