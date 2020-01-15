 <script src="{{asset('admin-assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admin-assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    
    <script src="{{asset('admin-assets/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/charts-home.js')}}"></script>
    <!-- Main File-->
    <script src="{{asset('admin-assets/js/front.js')}}"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
        $('#province').change(function(){
            var province = $(this).val();
            $.ajax({
            type: 'GET',
            url:'{{url("all-cities")}}'+'/'+province ,
            dataType: 'json',
            success: function(data){
                 $('#city').find('option').remove();
                $.each(data, function(key, value) { 
                console.log(value.name);  
                $('#city')
                .append($("<option></option>")
                    .attr("value",value.name)
                    .text(value.name)); 
            });
            }
        });
        });
    </script>