<?php 
session_start();
include './Connection/connection.php';

	if(isset($_POST['date']) ){

		$tz_object = new DateTimeZone('America/New_York');
	    $datetime = new DateTime();//time
	    $datetime->setTimezone($tz_object);
	    $current = $datetime->format('g:i A');

	    $date1 = new DateTime();//date today
		$date1->setTimezone($tz_object);
		$today = $date1->format('Y-m-d');
					
		
		$aptime=array();
		
		$time=array("10:00 AM","11:00 AM","12:00 PM","1:00 PM","2:00 PM","3:00 PM","4:00 PM","5:00 PM");
		$q=0;
		

	

		$date = $_POST['date'];// date chosen
		$date = new DateTime($date);
		$date= $date->format('Y-m-d');    
		
        $sql = "SELECT * FROM appointment where  appoint_date='".$date."' ";

        $result = mysqli_query($conn, $sql);
        //////if finds all taken apointments in the system on that date
        if (mysqli_num_rows($result) > 0 ) {
		    while($row = mysqli_fetch_assoc($result)) {
		         $apoint_time=$row["apoint_time"];
		         $aptime[$q]=$apoint_time;
		         $q++;
		    }

//echo "<script>alert('".print_r($aptime)."');</script>";

		    $i=0;
		    $y=0;
		    
			print_r($aptime);
			while ( $y< count($aptime)) {
				echo $aptime[$y];
				echo $y;

				while ( $i<= count($time)) {
					
						if ( @$aptime[$y]==@$time[$i]) { //check if the date is the same else dont show
						// delete time from defult time if there is an appointment
						unset($time[$i]);
						$time=array_values($time);
						//var_dump($time);

					
						}
						$i++;
					}
					$i=0;// set the value to 0
					$y++;
				}

			 $r=0;
			  $i=0;
				    while($i< count($time)){

				    
					    if (strtotime($today) == strtotime($date)) {
					    
					      	if ( strtotime($current) < strtotime($time[$i]) ) {

					    		
							}else{
								unset($time[$i]);
							}
						
						}

					    $i++;
					}
					$time = array_values($time);

					while($r< count($time)){

						echo "<option value='".@$time[$r]."'>".@$time[$r]."</option>";
					    $r++;
					
					}

			
		    
		} else {  //if there are no appointments in the system then display all avaliable appointment time

				$w=0;
					
				    $i=0;
				    while($i< count($time)){

				    
					    if (strtotime($today) == strtotime($date)) {
					    
					      	if ( strtotime($current) < strtotime($time[$i]) ) {

					    		echo "<option value='".@$time[$i]."'>".@$time[$i]."</option>";
					    		//unset($time[$i]);
							}else{
								unset($time[$i]);
							}
						
						}else{
							// if not today then display all options
							echo "<option value='".@$time[$i]."'>".@$time[$i]."</option>";

						}

					    $i++;
					}
					$time = array_values($time);


					// while ( $w< count($time)) {
					// 	//print the array out
					// 	echo "<option value='".@$time[$w]."'>".@$time[$w]."</option>";
					// 	$w++;
					// }
		}
		
        
		
		mysqli_close($conn);

	}else{
		echo "Problem with ajax.";
	}
?>