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
	<a href="{{route('sectors.create')}}" class="btn btn-primary">Add Sector</a>
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
                          <th>Sector Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($sectors as $sector)
                        <tr>
                          <th scope="row">{{$sector->id}}</th>
                          <td>{{$sector->name}}</td>
                          <td><a href="{{route('sectors.edit',$sector->id)}}" class="btn btn-primary">Edit</a><a href="{{route('sectors.destroy',$sector->id)}}" onclick="return confirm('are you sure to want to delete this sector?')" class="btn btn-warning">Delete</a></td>
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