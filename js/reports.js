$(function() {
      $( "#from" ).datepicker({
        
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
          $( "#to" ).datepicker( "option", "minDate", selectedDate );
        }
      });
      $( "#to" ).datepicker({
        
        changeMonth: true,
        numberOfMonths: 1,
        onClose: function( selectedDate ) {
          $( "#from" ).datepicker( "option", "maxDate", selectedDate );
        }
      });
    });


 //if the input change do this check

             $(document).ready(function(){

                 $("#from").change(function(){
                      if ($("#from").val() != "" && $("#to").val() != "") {

                           var report = 'from=' + $("#from").val()+ '&to='+$("#to").val()+ '&report='+$("#report").val(); 

                          $.ajax ({
                                    type: 'POST',
                                    url: './php/report_preview.php',
                                    data: report,
                                    cache: false,
                                    
                                    
                                    }).done(function( data ) {
                                  $("#preview").html(data);
                              });


                      };
                 });

                 $("#to").change(function(){
                      if ($("#from").val() != "" && $("#to").val() != "") {

                          var report = 'from=' + $("#from").val()+ '&to='+$("#to").val()+ '&report='+$("#report").val(); 

                          $.ajax ({
                                    type: 'POST',
                                    url: './php/report_preview.php',
                                    data: report,
                                    cache: false,
                                    
                                    
                                    }).done(function( data ) {
                                  $("#preview").html(data);
                              });


                      };
                 });

                 $("#report").change(function(){
                      if ($("#from").val() != "" && $("#to").val() != "") {

                          var report = 'from=' + $("#from").val()+ '&to='+$("#to").val()+ '&report='+$("#report").val(); 

                          $.ajax ({
                                    type: 'POST',
                                    url: './php/report_preview.php',
                                    data: report,
                                    cache: false,
                                    
                                    
                                    }).done(function( data ) {
                                  $("#preview").html(data);
                              });

                          

                      };
                 });



                 $('form').submit(function () {

                    // Get the Login Name value and trim it
                    var from = $.trim($('#from').val());
                    var to = $.trim($('#to').val());
                    var option = $("#notAllow").val();
                    
                    // Check if empty of not
                    if (from  === '' || to === '') {
                        alert('Text-field is empty.');
                        return false;
                    }

                    if (option == 'no') {
                        alert('The preview is not available.Please try diferent dates.');
                        return false;
                    };
                });


              

              

              });
