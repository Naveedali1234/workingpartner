@extends('admin-dashboard.layouts.master')
@section('content')
<div class='row'>
    <div class="col-8">
        <a href="{{ url()->previous() }}"><span class="fa fa-arrow-left"></span> Back</a>
<br><br>
        <div class="card card-default">
            <div class="card-header">Messages</div>
            <div class="card-body p-0">
                <ul class="list-unstyled" id="privateMessageBox" style="height:300px; overflow-y: scroll;">
                    @foreach($thread->messages as $message)
                    <li class="p-2">
                           <strong>{{ $message->user->name }}</strong>
                           {{ $message->message }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-default">
            <div class="card-header">Chat Between Users</div>
            <div class="card-body p-0">
                <ul>
                    @foreach($thread->users as $user)
                    <li class="py-2">
                    <label>
                        <span>{{$user->name}}</span>
                    </label>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
   </div>
   @endsection