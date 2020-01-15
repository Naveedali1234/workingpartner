<!DOCTYPE html>
<html>
@include('working-partner-dashboard.partials.head')
<body>
<div id="app">
	@include('working-partner-dashboard.partials.sidebar-nav')
    <div  class="page" style="">
      <div >
        
	<demo :user="{{auth()->user()}}"></demo>
</div>
</div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>