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
	<a href="{{route('provinces.create')}}" class="btn btn-primary">Add Country</a>
  <a href="{{route('provinces.create')}}" class="btn btn-primary">Add Bulk Country List</a>
  <a href="{{route('cities.create')}}" class="btn btn-primary">Add Provinces</a>
</div>
<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <!-- <div class="card-header">
                  <h4>Striped table with hover effect</h4>
                </div> -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Country Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($countries as $country)
                        <tr>
                          <th scope="row">{{$country->id}}</th>
                          <td>{{$country->name}}</td>
                          <td>
                            <a href="{{route('country.allProvinces',$country->id)}}" class="btn btn-default">Show provinces</a>
                            <a href="{{route('countries.edit',$country->id)}}" class="btn btn-primary">Edit</a><a href="{{route('countries.destroy',$country->id)}}" onclick="return confirm('are you sure to want to delete this Country?')" class="btn btn-warning">Delete</a></td>
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