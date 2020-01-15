@extends('working-partner-dashboard.layouts.master')
@section('content')
<div class="row">
            <div class="col-lg-12">
              
              <div class="card">
                @if($message = Session::get('success'))
          <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('danger'))

<div class="alert alert-danger alert-block">

  <button type="button" class="close" data-dismiss="alert">×</button> 

        <strong>{{ $message }}</strong>

</div>

@endif
              </div>
            </div>
          </div>
@endsection