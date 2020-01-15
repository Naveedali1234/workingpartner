@extends('admin-dashboard.layouts.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
    <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h4>Update Working Salary Form</h4>
        </div>
        <div class="card-body">
          <p>Please Enter Following details to Update Working Salary</p>
          <form class="form-horizontal" method="post" action="{{route('working_salary.update',$workingSalary->id)}}">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group row">
              <label class="col-sm-2">Working Salary From</label>
              <div class="col-sm-3">
                <input id="inputHorizontalSuccess" type="text" placeholder="Working Salary From" value="{{$workingSalary->from}}" name="from" class="form-control form-control-success"><small class="form-text">Working Salary from</small>
              </div>
              <div class="form-group row">
              <label class="col-sm-4">Working Salary To</label>
              <div class="col-sm-8">
                <input id="inputHorizontalSuccess" type="text" placeholder="Working Salary To" value="{{$workingSalary->to}}" name="to" class="form-control form-control-success"><small class="form-text">Working Salary To</small>
              </div>

            </div>            
            <div class="form-group row">       
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="Update Working Salary" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@stop