<?php 

include './Connection/connection.php'; //start connecion
require_once '../dompdf/dompdf_config.inc.php'; //dompdf to make pdf with html

// if the values are set then do funtion and display the preview of the result of the database
if (isset($_POST['from']) && isset($_POST['to']) && isset($_POST['report'])) { 

	//iniciate the variables
	$from = $_POST['from'];
	$to = $_POST['to'];
	$select = $_POST['report'];

	//change the time from 31-07-2012 to 2012-07-31 for the Orders 
	$date1 = new DateTime($from);
	$date2 = new DateTime($to);
	$from2= $date1->format('Y-m-d');  
	$to2= $date2->format('Y-m-d'); 

	//get time o the timezone 
	function get_Datetime_Now() {
    $tz_object = new DateTimeZone('America/New_York');
   

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s A');
}

	

	//the select variable is used to make a decicion on which report to make

	//Attended Clients
	if ($select == 'Appointments Attended') {
		// select the values from the database depending the range of the dates
		$sql = "SELECT appointment.appoint_id, appointment.appoint_date, appointment.apoint_time, user.first_name, user.last_name FROM `appointment` INNER JOIN `user` ON appointment.user_id=user.user_id where appointment.atended='1' AND appointment.appoint_date BETWEEN '$from2' AND '$to2'";
		
		$i=1; //counter

		//display html 

		$codigoHTML='
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<div align="center">
		<h3><b>'.$select.' Report </b></h3>
		</div>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<div align="center">';


		$now= get_Datetime_Now();
		$codigoHTML.='<b>From :  </b>'.$from.'<br><b>  To :</b>  '.$to.'<br>';
		$codigoHTML.='<b>Generated :  </b>'.$now.'<br>';


		$codigoHTML.='
		</div>
		</head>

		<body>
		<br>
		<br>
		
		<div class="table-responsive">

		<table width="95%" border="1" align="center">
		  <tr bgcolor="#A6AFB5" style="text-align: left; font-size: 14px; color: #000000;">
		    <th># </th>
			<th>Appointment Number</th>
		    <th>Client Name</th>
		    <th>Date & Time</th>
		    		    
		  </tr>';
 
		
		// select data
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		      
		      // data from the table 
		        $codigoHTML.='				
				  <tr>
				  <td>'.$i.' </td>
				  <td>'.$row['appoint_id'].'</td>
				  <td>'.$row['first_name'].' '.$row['last_name'].'</td>
				  <td>'.$row['appoint_date'].' '.$row['apoint_time'].'</td>
				  
				  </tr>';
      
		        $i++;
		    }

		    $codigoHTML.='
			</table>
			</div>

			</body>
			</html>';

			

			//if the variable exist then convert to pdf the html

			if (isset($_POST['repY'])) {

				$codigoHTML=utf8_decode($codigoHTML);
				$dompdf=new DOMPDF();
				$dompdf->load_html($codigoHTML);
				ini_set("memory_limit","128M");
				$dompdf->render();
				$dompdf->stream($select.".pdf");
				
			}else{
				echo $codigoHTML;
			}


	}else {
		    echo "<label style='display: block;text-align: center;'><h4><b>NO PREVIEW AVAILABLE</b><h4></label>";
		    echo "<input type='hidden' name='notAllow' id='notAllow' value='no'>";
		}

}

	//Orders
	if ($select == 'Orders') {
		
		$i=1; //counter
		$total=0; //total sum of orders 

		// select the values from the database depending the range of the dates
		$sql = "SELECT * FROM `orders` where order_date BETWEEN '$from2' AND '$to2'";

		//display html 

		$codigoHTML='
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<div align="center">
		<h3><b>'.$select.' Report </b></h3>
		</div>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<div align="center">';


		$now= get_Datetime_Now();
		$codigoHTML.='<b>From :  </b>'.$from.'<br><b>  To :</b>  '.$to.'<br>';
		$codigoHTML.='<b>Generated :  </b>'.$now.'<br>';


		$codigoHTML.='
		</div>
		</head>

		<body>
		<br>
		<br>
		
		<div class="table-responsive">

		<table width="95%" border="1" align="center">
		  <tr bgcolor="#A6AFB5" style="text-align: left; font-size: 14px; color: #000000;">
		    <th># </th>
			<th>Order Number</th>
		    <th>Client Name</th>
		    <th>Date</th>
		    <th>Payment</th>
		    
		  </tr>';
 
		
		// select data
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		      
		      // data from the table 
		        $codigoHTML.='				
				  <tr>
				  <td>'.$i.' </td>
				  <td>'.$row['order_id'].'</td>
				  <td>'.$row['shipping_name'].'</td>
				  <td>'.$row['order_date'].'</td>
				  <td><b>$'.$row['total_paid'].'</b></td>
				  </tr>';

				//each order sum of total payed
				$total = $total + $row['total_paid'];  
		        
		        $i++;
		    }

		    $codigoHTML.='
			</table>

			<label style="display: block;text-align: right;margin-right: 15px;"><h4>Total: <b>$'.$total.'</b></h4></label>
			</div>

			</body>
			</html>';

			//if the variable exist then convert to pdf the html

			if (isset($_POST['repY'])) {

				$codigoHTML=utf8_decode($codigoHTML);
				$dompdf=new DOMPDF();
				$dompdf->load_html($codigoHTML);
				ini_set("memory_limit","128M");
				$dompdf->render();
				$dompdf->stream($select.".pdf");
				
			}else{
				echo $codigoHTML;
			}

		} else {
		    echo "<label style='display: block;text-align: center;'><h4><b>NO PREVIEW AVAILABLE</b><h4></label>";
		    echo "<input type='hidden' name='notAllow' id='notAllow' value='no'>";
		}

	}


//Online Consulting
	if ($select == 'Online Consulting') {
		
		$i=1; //counter
		$total=0; //total sum of orders 

		// select the values from the database depending the range of the dates
		$sql = "SELECT consulting_log.payment,consulting_log.consulting_log_id, consulting_log.date, user.first_name, user.last_name FROM `consulting_log` INNER JOIN `user` ON consulting_log.user_id=user.user_id where consulting_log.active='0' AND consulting_log.date BETWEEN '$from2' AND '$to2'";

		//display html 

		$codigoHTML='
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<div align="center">
		<h3><b>'.$select.' Report </b></h3>
		</div>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<div align="center">';


		$now= get_Datetime_Now();
		$codigoHTML.='<b>From :  </b>'.$from.'<br><b>  To :</b>  '.$to.'<br>';
		$codigoHTML.='<b>Generated :  </b>'.$now.'<br>';


		$codigoHTML.='
		</div>
		</head>

		<body>
		<br>
		<br>
		
		<div class="table-responsive">

		<table width="95%" border="1" align="center">
		  <tr bgcolor="#A6AFB5" style="text-align: left; font-size: 14px; color: #000000;">
		    <th># </th>
			<th>Consulting #</th>
		    <th>Client Name</th>
		    <th>Date</th>
		    <th>Payment</th>
		    
		  </tr>';
 
		
		// select data
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($row = mysqli_fetch_assoc($result)) {
		      
		      // data from the table 
		        $codigoHTML.='				
				  <tr>
				  <td> '.$i.' </td>
				  <td> '.$row['consulting_log_id'].'</td>
				  <td> '.$row['first_name'].' '.$row['last_name'].'</td>
				  <td> '.$row['date'].'</td>
				  <td><b> $'.$row['payment'].'</b></td>
				  </tr>';

				//each order sum of total payed
				$total = $total + $row['payment'];  
		        
		        $i++;
		    }

		    $codigoHTML.='
			</table>

			<label style="display: block;text-align: right;margin-right: 15px;"><h4>Total: <b>$'.$total.'</b></h4></label>
			</div>

			</body>
			</html>';

			//if the variable exist then convert to pdf the html

			if (isset($_POST['repY'])) {

				$codigoHTML=utf8_decode($codigoHTML);
				$dompdf=new DOMPDF();
				$dompdf->load_html($codigoHTML);
				ini_set("memory_limit","128M");
				$dompdf->render();
				$dompdf->stream($select.".pdf");
				
			}else{
				echo $codigoHTML;
			}

		} else {
		    echo "<label style='display: block;text-align: center;'><h4><b>NO PREVIEW AVAILABLE</b><h4></label>";
		    echo "<input type='hidden' name='notAllow' id='notAllow' value='no'>";
		}

	}
	

}




 ?>