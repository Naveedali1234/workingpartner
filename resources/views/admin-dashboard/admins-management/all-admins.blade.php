@extends('admin-dashboard.layouts.master')
@section('content')
<a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
<div>
	<a href="{{route('admin.create')}}" class="btn btn-primary">Add New Admin</a>
</div>
<div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>All Admins</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="myTable">
                      <thead>
                        <tr>
                          <th>Admin ID</th>
                          <th>Name</th>
                          <th>Surname</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Date Of Birth</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                        @foreach($admins as $admin)
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{$admin->name}}</td>
                          <td>{{$admin->surname}}</td>
                          <td>{{$admin->email}}</td>
                          <td>{{$admin->mobile}}</td>
                          <td>{{$admin->date_of_birth->todatestring()}}</td>
                          <td>
                            <a href="{{route('admin.edit',$admin->id)}}" class="btn btn-primary">Edit Admin Account</a><br><br>
                            <a href="{{route('destroy.admin',$admin->id)}}" onclick="return confirm('Do you really want to delete this admin account?')" class="btn btn-primary">Delete Account</a></td>
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