<!DOCTYPE html>
<html>
@include('seller-dashboard.partials.head')

<body>
<div id="app">
	@include('seller-dashboard.partials.sidebar-nav')
    <div  class="page">
      <!-- navbar-->
      

  <demo home-route="{{ url('/') }}" :user="{{auth()->user()}}"></demo>

</div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>