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
	<a href="{{route('asking_price.create')}}" class="btn btn-primary">Add Asking Price</a>
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
                          <th>Asking Price From</th>
                          <th>Asking Price To</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($asking_prices as $asking_price)
                        <tr>
                          <th scope="row">{{$asking_price->id}}</th>
                          <td>{{$asking_price->from}}</td>
                          <td>{{$asking_price->to}}</td>
                          <td><a href="{{route('asking_price.edit',$asking_price->id)}}" class="btn btn-primary">Edit</a><a href="{{route('asking_price.destroy',$asking_price->id)}}" onclick="return confirm('are you sure to want to delete this asking price?')" class="btn btn-warning">Delete</a></td>
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