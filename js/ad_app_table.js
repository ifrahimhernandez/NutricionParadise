		
		function attend_delete (value,name,y) {
			var x=value;
			var name=name;
			var y=y;

			var datas="attendNumber="+x + '&name='+name + '&y='+y;
      
			  $.ajax({
			     type: "POST",
			     url: "./php/attended_deleted.php",
			     data: datas
			  }).done(function( data ) {
			    
			    if (data== false){
			    	alert("There is an error in the system please contact the owner.");
                                             
			    }else{
			    	alert(data);
			    	window.location = "admin-appointment.php";
			    }
			    
			  });
		}


		