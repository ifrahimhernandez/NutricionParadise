<?php
/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
/* You must fill in the "Service Logins
/* values below for the example to work	
/*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/

/*********** Shipping Services ************/
/* Here's an array of all the standard
/* shipping rates. You'll probably want to
/* comment out the ones you don't want 
/******************************************/
// UPS
// $services['ups']['14'] = 'Ups-Next Day Air Early AM';
// $services['ups']['01'] = 'UPS-Next Day Air';
// $services['ups']['65'] = 'UPS-Worldwide Saver';
// $services['ups']['59'] = 'UPS-2nd Day Air Early AM';
// $services['ups']['02'] = 'UPS-2nd Day Air';
// $services['ups']['12'] = 'UPS-3 Day Select';
// $services['ups']['03'] = 'UPS-Ground';
// $services['ups']['11'] = 'UPS-Standard';
// $services['ups']['07'] = 'UPS-Worldwide Express';
// $services['ups']['54'] = 'UPS-Worldwide Express Plus';
// $services['ups']['08'] = 'UPS-Worldwide Expedited';
// USPS
$services['usps']['PARCEL'] = 'Standard Post 5-6 Days';
$services['usps']['PRIORITY'] = 'Priority 2 Days';
$services['usps']['EXPRESS'] = 'Express 1 Day';


// $services['usps']['FIRST CLASS'] = 'USPS-First Class';
// $services['usps']['EXPRESS SH'] = 'USPS-Express SH';
// $services['usps']['BPM'] = 'USPS-BPM';
// $services['usps']['MEDIA '] = 'USPS-Media';
// $services['usps']['LIBRARY'] = 'USPS-Library';
// FedEx
// $services['fedex']['PRIORITYOVERNIGHT'] = 'FEDEX-Priority Overnight';
// $services['fedex']['STANDARDOVERNIGHT'] = 'FEDEX-Standard Overnight';
// $services['fedex']['FIRSTOVERNIGHT'] = 'FEDEX-First Overnight';
// $services['fedex']['FEDEX2DAY'] = 'FEDEX-2 Day';
// $services['fedex']['FEDEXEXPRESSSAVER'] = 'FEDEX-Express Saver';
// $services['fedex']['FEDEXGROUND'] = 'FEDEX-Ground';
// $services['fedex']['FEDEX1DAYFREIGHT'] = 'FEDEX-Overnight Day Freight';
// $services['fedex']['FEDEX2DAYFREIGHT'] = 'FEDEX-2 Day Freight';
// $services['fedex']['FEDEX3DAYFREIGHT'] = 'FEDEX-3 Day Freight';
// $services['fedex']['GROUNDHOMEDELIVERY'] = 'FEDEX-Home Delivery';
// $services['fedex']['INTERNATIONALECONOMY'] = 'FEDEX-International Economy';
// $services['fedex']['INTERNATIONALFIRST'] = 'FEDEX-International First';
// $services['fedex']['INTERNATIONALPRIORITY'] = 'FEDEX-International Priority';

// Config
$config = array(
	// Services
	'services' => $services,
	// Weight
	'weight' => @$cartweighttotal, // Default = 1
	'weight_units' => 'lb', // lb (default), oz, gram, kg
	// Size
	'size_length' => 8, // Default = 8
	'size_width' => 4, // Default = 4
	'size_height' => 2, // Default = 2
	'size_units' => 'in', // in (default), feet, cm
	// From
	'from_zip' => '01840', 
	// 'from_state' => "FL", // Only Required for FedEx
	'from_country' => "US",
	// To
	'to_zip' => @$_SESSION['zip_code'],
	// 'to_state' => "", // Only Required for FedEx
	'to_country' => @$_SESSION['country'],
	
	// Service Logins
	// 'ups_access' => '0C2D05F55AF310D0', // UPS Access License Key
	// 'ups_user' => 'dwstudios', // UPS Username  
	// 'ups_pass' => 'dwstudios', // UPS Password  
	// 'ups_account' => '81476R', // UPS Account Number
	'usps_user' => '864NUTRI2694', // USPS User Name
	// 'fedex_account' => '510087020', // FedEX Account Number
	// 'fedex_meter' => '100005263' // FedEx Meter Number 
);

// Shipping Calculator Class
require_once "ShippingCalculator.php";
// Create Class (with config array)
$ship = new ShippingCalculator($config);
// Get Rates
$rates = $ship->calculate();

// Print Array of Rates
// print "
// UPS Ground shipping rate for a ".$config["weight"]." ".$config["weight_units"].", ".$config["size_length"]." x ".$config["size_width"]." x ".$config["size_height"]." ".$config["size_units"]." package from ".$config["from_zip"]." to ".$config["to_zip"].":
// <xmp>";
// print_r($rates);
// print "</xmp>";
		$i=0; 

		foreach($rates as $company => $codes) {
			    foreach($codes as $code => $rate){ 
			    	$i++;
			    	

				if (!isset($cost)  && $i==1 ) {
						   	
						   		$cost=$rate;
						   }
			}
		}

		if(  empty($rate) || $config["to_country"]!='US'){

				   $cost=0.00;
		}


//grand total for the cart prices 
   	$superTotal=$cartTotal+$tax+$cost;
   	$superTotal= number_format($superTotal, 2);


   	//$superTotal1=floatval($superTotal);

/******* Setting Options After Class Creation ********
If you would rather not set all the config options 
when you first create an instance of the class you can
set them like this:

$ship = new ShippingCalculator ();
$ship->set_value('from_zip','12345');

..where the first variable is the name of the value 
and the second variable is the value
/*****************************************************/


/***************** Single Rate ***********************
If you only want to get one rate you can pass the 
company and service code via the 'calculate' method

$ship = new ShippingCalculator ($config);
$rates = $ship->calculate('usps','FIRST CLASS')

..this would return a rates array like 
$rates =>
	'usps' =>
		'FIRST CLASS' = rate;
/*****************************************************/



/***************** Printing Rates *********************
.. and finally, if you wanted to loop through the 
returned rates and print radio buttons so your user 
could select a shipping method you can do something 
like this:

foreach($rates as $company => $codes) {
	foreach($codes as $code => $rate) print "
<input type='checkbox' name='shipping' value='".$rate."' /> ".$services[$company][$code]."<br />";
}

which will print the radio buttons, each having the 
value of the respective shipping code which displaying
the more user friendly name of the shipping method.
/*****************************************************/

?>
<script type="text/javascript">

function selected(data) {
	
	document.getElementById("A2").value = data; 
}

</script>