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
	<a href="{{route('working_salary.create')}}" class="btn btn-primary">Add Working Salary</a>
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
                          <th>Working Salary From</th>
                          <th>Working Salary To</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($working_salaries as $working_salary)
                        <tr>
                          <th scope="row">{{$working_salary->id}}</th>
                          <td>{{$working_salary->from}}</td>
                          <td>{{$working_salary->to}}</td>
                          <td><a href="{{route('working_salary.edit',$working_salary->id)}}" class="btn btn-primary">Edit</a><a href="{{route('working_salary.destroy',$working_salary->id)}}" onclick="return confirm('are you sure to want to delete this Working Salary?')" class="btn btn-warning">Delete</a></td>
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