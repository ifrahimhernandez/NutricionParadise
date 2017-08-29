


///Select date and then ajax to get the nonselected appointments                                
jQuery(function($) {

  $('#datepicker').change(function() { 
      var date=this.value;
     

      var date = 'date=' + date; 
      
       $.ajax ({
            type: 'POST',
            url: 'php/appointment_time.php',
            data: date,
            cache: false,
            
            
       }).done(function( data ) {
            document.getElementById("apTime").innerHTML=data;
        });


  });



    
});

 

function validateForm() {
    var x = document.getElementById("reason").value;
    var y = document.getElementById("apTime").value;
    var w = document.getElementById("datepicker").value;
    if (x == null || x == "") {
        alert("The reason input is required.");
        return false;
    }else if (y == null || y == "") {
        alert("Please select an appointment.");
        return false; 
    }else if (w == null || w == "") {
       alert("Please select date.");
        return false;
    }else{
      return true;
    }
}

$(document).ready(function(){


$("#singlebutton").click(function(){

if (validateForm()===true) {
      var datepicker=$("#datepicker").val();
      var apTime=$("#apTime").val();
      var reason = $("#reason").val();
      var appointment = 'datepicker=' + datepicker+ '&apTime='+apTime+ '&reason='+reason; 
      

       $.ajax ({
            type: 'POST',
            url: 'php/get_appointment.php',
            data: appointment,
            cache: false,
            
            
       }).done(function( data ) {
            
            if (data==true) {
              //there is an error
            alert("Appointment has been booked for "+datepicker +" at "+apTime);
            window.location = "client-appointment.php";

            }else{
              
              alert(data);
              return false;
                   
            }
            
        });


}
     
          
  });




       });