@extends('admin-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
    <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h4>Add Sector Form</h4>
        </div>
        <div class="card-body">
          <p>Please Enter Following details to Add Sector</p>
          <form class="form-horizontal" method="post" action="{{route('sectors.update',$sector->id)}}">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group row">
              <label class="col-sm-2">Sector Name</label>
              <div class="col-sm-10">
                <input id="inputHorizontalSuccess" type="text" placeholder="Sector Name" name="name" value="{{$sector->name}}" class="form-control form-control-success"><small class="form-text">Name of the Sector</small>
              </div>
            </div>            
            <div class="form-group row">       
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="Update Sector" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@stop