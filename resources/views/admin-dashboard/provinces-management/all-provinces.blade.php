@extends('admin-dashboard.layouts.master')
@section('content')
@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

  <button type="button" class="close" data-dismiss="alert">×</button> 

        <strong>{{ $message }}</strong>

</div>

@endif
<a href="{{ route('admin.home') }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
<div>
	<a href="{{route('provinces.create')}}" class="btn btn-primary">Add Province</a>
  <a href="{{route('cities.create')}}" class="btn btn-primary">Add Cities/Towns</a>
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
                          <th>Province Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i = 1; @endphp
                        @foreach($provinces as $province)
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{$province->name}}</td>
                          <td>
                            <a href="{{route('province.allCities',$province->id)}}" class="btn btn-default">Show Cities/Towns</a>
                            <a href="{{route('provinces.edit',$province->id)}}" class="btn btn-primary">Edit</a><a href="{{route('provinces.destroy',$province->id)}}" onclick="return confirm('are you sure to want to delete this province and their cities/Towns?')" class="btn btn-warning">Delete</a></td>
                        </tr>
                        @php $i++; @endphp
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
@endsection