@extends('admin-dashboard.layouts.master')
@section('content')

<div class="row">
            <div class="col-lg-12">
              <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
              <div class="card">
                <div class="card-header">
                  <h4>All Working Partner Accounts</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="myTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i = 1; @endphp
                        @foreach($working_partners as $user)
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->mobile}}</td>
                          <td>{{$user->status==1? 'Active': 'Deactivated'}}</td>
                          <td>
                            @if($user->status==1)
                            <a href="{{route('account.deactivate',$user->id)}}" class="btn btn-primary" title="Deactivate User Account">Deactivate Account</a>
                            @else
                            <a href="{{route('account.activate',$user->id)}}" class="btn btn-primary" title="Activate User Account">Activate Account</a>
                            @endif
                            </td>
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