 <script src="{{asset('assets/js-plugins/jquery-3.1.1.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/js-plugins/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js-plugins/selectize.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js-plugins/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js-plugins/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js-plugins/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js-plugins/daterangepicker.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/js/scripts.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready( function () {
          $('#search_button').click(function(event){
            var check = $('#province').val();
            if(check==''){
              event.preventDefault();
              alert('please select atleast province and city');
            }
          });
        $('#province').change(function(){
            var data1 = '';
            var province = $(this).val();
            $.ajax({
            type: 'GET',
            url:'{{url("all-cities")}}'+'/'+province ,
            dataType: 'json',
            success: function(jsondata){
                var htmldata = '<option value="">Select City</option>';
                    var new_value_options   = '[ {text: "Select City", value:""},';

                    for (var key in jsondata) {
                        htmldata += '<option value="'+jsondata[key].name+'">'+jsondata[key].name+'</option>';
 
                        var keyPlus = parseInt(key) + 1;
                        if (keyPlus == jsondata.length) {
                            new_value_options += '{text: "'+jsondata[key].name+'", value: "'+jsondata[key].name+'"}';
                            
                        } else {
                            new_value_options += '{text: "'+jsondata[key].name+'", value: "'+jsondata[key].name+'"},';
                        }
                    }
                    new_value_options   += ']';
                    
                    //convert to json object
                    new_value_options = eval('(' + new_value_options + ')');
                    if (new_value_options[0] != undefined) {
                        // re-fill html select option field 
                        $("#city1").html(htmldata);
                        // re-fill/set the selectize values
                        var selectize = $("#city1")[0].selectize;
 
                        selectize.clear();
                        selectize.clearOptions();
                        selectize.renderCache['option'] = {};
                        selectize.renderCache['item'] = {};
 
                        selectize.addOption(new_value_options);
 
                        selectize.setValue(new_value_options[0].value);
                    }
            }
        });
        });
      });
    </script>