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
  <a href="{{route('cities.create')}}" class="btn btn-primary">Add Cities/Towns</a>
</div>
<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Cities/Towns of {{$province->name}}</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="myTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>City/Town Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i = 1; @endphp
                        @foreach($province->cities as $city)
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{$city->name}}</td>
                          <td>
                            <a href="{{route('cities.edit',$city->id)}}" class="btn btn-primary">Edit</a><a href="{{route('cities.destroy',$city->id)}}" onclick="return confirm('are you sure to want to delete this city/Town?')" class="btn btn-warning">Delete</a></td>
                        </tr>
                        @php $i++ ; @endphp
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
@endsection