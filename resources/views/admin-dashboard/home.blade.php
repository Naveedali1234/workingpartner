@extends('admin-dashboard.layouts.master')
@section('analytics')
<!-- Counts Section -->
@include('admin-dashboard.partials.analytics')
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
      <div class="card">
        
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <a href="{{route('provinces.index')}}" class="btn btn-primary btn-lg mb">Provinces/Cities Management</a>
              <a href="{{route('industries.index')}}" class="btn btn-primary btn-lg mb">Industries Management</a>
              <a href="{{route('sectors.index')}}" class="btn btn-primary btn-lg mb">Sectors Management</a>
            </div>
            <div class="col-md-12">
              <a href="{{route('asking_price.index')}}" class="btn btn-primary btn-lg mb">Asking Price Management</a>
              <a href="{{route('shares_available.index')}}" class="btn btn-primary btn-lg mb">Shares Available Management</a>
              <a href="{{route('share_value.index')}}" class="btn btn-primary btn-lg mb">Shares Value Management</a>
              <a href="{{route('working_salary.index')}}" class="btn btn-primary btn-lg mb">Working Salary Management</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@stop