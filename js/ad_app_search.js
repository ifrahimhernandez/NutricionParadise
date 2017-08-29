$(document).ready(function(){

	$("#search").click(function(){
		
		 var datepicker=$("#datepicker").val();

		 if (datepicker=="") {

		 	alert("Please select a day to search.");
		 }else{

		 	var datas="datepicker="+datepicker;
      
			  $.ajax({
			     type: "POST",
			     url: "./php/ad_app_tabledata.php",
			     data: datas
			  }).done(function( data ) {
			    $('#dataTable').html(data);
			    
			  });
		 }

	});

});