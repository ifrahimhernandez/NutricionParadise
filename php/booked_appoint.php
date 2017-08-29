<?php 

@$today=date("m/d/Y");


$sql = "SELECT * FROM appointment where  user_id = '".$_SESSION['user_id']."' and atended='0'";

        $result = mysqli_query($conn, $sql);
        //////if finds the user then the sql will execute
        if (mysqli_num_rows($result) > 0 ) {
		    while($row = mysqli_fetch_assoc($result)) {
		         $apoint_time=$row["apoint_time"];
		         $apoint_date=$row["appoint_date"];
		     }


	   echo " <div class='col-md-8 well' style=' margin-top: 15px;'>
	           <div class='row'>
  					<div class='col-md-4 col-xs-4' style='  margin-top: 20px;  '>   
  						<i class ='fa fa-book fa-5x' style='padding-left: 10px;'></i> 
  					</div>    

  					<div class='col-md-8 col-xs-8'> 
				        <h4><strong>Upcoming Appointment</strong></h4> 
				        <i> ".$apoint_date." at ".$apoint_time."</i><br><br>
				        <button  id='delap' class='btn btn-danger btn-sm'> Cancel Appointment</button>
				    </div>
	        		
	        	</div>	
	     </div> 
	     <script>

	     jQuery(function($) {

			$('#delap').click(function(){

			      
			      var date = '". $apoint_date."';
			      var time = '". $apoint_time."';
			     
			      var inprogress = 'date=' + date+ '&time='+time; 

			       $.ajax ({
			            type: 'POST',
			            url: 'php/delete_appointment.php',
			            data: inprogress,
			            cache: false,
			            
			            
			       }).done(function( data ) {
			       	if (data==true) {
			       		alert('Appointment has been canceled.');   
                        window.location.href = 'client-appointment.php';
                          
                      }else{
                      	alert(data)                           
                      }
					
					});
			          
			  });

			       });


	     </script>

	     ";

		}

 


 ?>