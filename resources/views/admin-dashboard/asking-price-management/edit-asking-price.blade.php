@extends('admin-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
    <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h4>Update Asking Price Form</h4>
        </div>
        <div class="card-body">
          <p>Please Enter Following details to Update Asking Price</p>
          <form class="form-horizontal" method="post" action="{{route('asking_price.update',$askingPrice->id)}}">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group row">
              <label class="col-sm-2">Asking Price From</label>
              <div class="col-sm-3">
                <input id="inputHorizontalSuccess" type="text" placeholder="Asking Price From" value="{{$askingPrice->from}}" name="from" class="form-control form-control-success"><small class="form-text">Asking Price from</small>
              </div>
              <div class="form-group row">
              <label class="col-sm-4">Asking Price To</label>
              <div class="col-sm-8">
                <input id="inputHorizontalSuccess" type="text" placeholder="Asking Price To" value="{{$askingPrice->to}}" name="to" class="form-control form-control-success"><small class="form-text">Asking Price To</small>
              </div>

            </div>            
            <div class="form-group row">       
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="Update Asking Price" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@stop