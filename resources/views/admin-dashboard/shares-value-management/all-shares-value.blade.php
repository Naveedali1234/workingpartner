@extends('admin-dashboard.layouts.master')
@section('content')
@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

  <button type="button" class="close" data-dismiss="alert">×</button> 

        <strong>{{ $message }}</strong>

</div>

@endif
<a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
<div>
	<a href="{{route('share_value.create')}}" class="btn btn-primary">Add Shares Value</a>
</div>
<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <!-- <div class="card-header">
                  <h4>Striped table with hover effect</h4>
                </div> -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="myTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Share Value From</th>
                          <th>Share Value To</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($share_values as $share_value)
                        <tr>
                          <th scope="row">{{$share_value->id}}</th>
                          <td>{{$share_value->from}}</td>
                          <td>{{$share_value->to}}</td>
                          <td><a href="{{route('share_value.edit',$share_value->id)}}" class="btn btn-primary">Edit</a><a href="{{route('share_value.destroy',$share_value->id)}}" onclick="return confirm('are you sure to want to delete this Share Value?')" class="btn btn-warning">Delete</a></td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
@endsection