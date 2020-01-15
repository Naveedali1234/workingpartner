@extends('admin-dashboard.layouts.master')
@section('content')
<div class="row">
            <div class="col-lg-12">
              <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
              <div class="card">
                <div class="card-header">
                  <h4>All Conversation List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover" id="myTable">
                      <thead>
                        <tr>
                          <th>Unique Conversation ID</th>
                          <th>First User Name</th>
                          <th>Second User Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($threads as $thread)
                        <tr>
                          <th scope="row">{{$thread->id}}</th>
                          @foreach($thread->users as $user)
                          <td>{{$user->name}}</td>
                          @endforeach
                          <td>
                            <a href="{{route('conversation.details',$thread->id)}}" class="btn btn-primary" title="View Conversation Details">Conversation Details</a>
                            </td>
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