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
	<a href="{{route('shares_available.create')}}" class="btn btn-primary">Add Shares Available</a>
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
                          <th>Shares Availble From</th>
                          <th>Shares Availble To</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($shares_availables as $shares_available)
                        <tr>
                          <th scope="row">{{$shares_available->id}}</th>
                          <td>{{$shares_available->from}}</td>
                          <td>{{$shares_available->to}}</td>
                          <td><a href="{{route('shares_available.edit',$shares_available->id)}}" class="btn btn-primary">Edit</a><a href="{{route('shares_available.destroy',$shares_available->id)}}" onclick="return confirm('are you sure to want to delete this Shares Availble?')" class="btn btn-warning">Delete</a></td>
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