

$(document).ready(function(){



                $("#newpassword").click(function(){

                    var oldpass=$("#inputPassword1").val();
                    var newpassword=$("#inputPassword2").val();
                    var againpassword = $("#inputPassword3").val();
                     var password_form = 'oldpass=' + oldpass+ '&newpassword='+newpassword; 
                    
                    

                      if($.trim(oldpass).length>0 && $.trim(newpassword).length>0 && $.trim(againpassword).length>0){

                        if (newpassword==againpassword) {

                            if ($.trim(newpassword).length>5 && $.trim(againpassword).length>5) {
                                   $.ajax ({
                                        type: 'POST',
                                        url: './php/change_password.php',
                                        data: password_form,
                                        cache: false,
                                        
                                        success: function(data){
                                              
                                              var data = data.trim();
                                              
                                              if (data == 'false') {
                                                  
                                                   alert("Error!! please try again.");
                                             
                                              }else{
                                                alert(data);
                                               clearInputs();
                                              }
                                          
                                         }



                                        
                                   });
                            }else{
                               alert("The new password must be grater than 5 letters. Please try again.");
                              clearInputs();
                            }

                     }else{

                      alert("The password does not match. Please try again.");
                      clearInputs();

                    }

                   }else{
                      alert("The password inputs are empty. Please fill them all.");
                      
                   }

                    
                    
                        
                });

function clearInputs(){
$("#inputPassword1").val('');
$("#inputPassword2").val('');
$("#inputPassword3").val('');

}

       });