        function validateForm() {

                var shipping_name = document.getElementById("shipping_name").value;
                var shipping_mail = document.getElementById("shipping_mail").value;
                var shipping_phone = document.getElementById("shipping_phone").value;
                var shipping_address = document.getElementById("shipping_address").value;
                var shipping_city = document.getElementById("shipping_city").value;
                var shipping_zip_code = document.getElementById("shipping_zip_code").value;
                var shipping_country = document.getElementById("shipping_country").value;
                var shipping_state = document.getElementById("shipping_state").value;
                var hasNumber = /\d/;
                var rule = /^[a-zA-Z ]*$/;
                var iChars = /[^\w\s]/gi;

                 if(iChars.test(shipping_name)=== true  || iChars.test(shipping_city)=== true  ){
                  alert("No special characters allowed.");
                  return false;

                 }if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(shipping_mail)){
                    alert("Not a valid e-mail address.");
                    return false;

                }else if (!rule.test(shipping_city) ) {
                    alert("Invalid city. Please check and try again.");
                    return false;

                }else if (!rule.test(shipping_name) ) {
                    alert( "Invalid Name. Please check and try again.");
                    return false;

                }else if (shipping_country == "US" && shipping_state =="None") {
                    alert("Please select a state.");
                    return false;
    
                } else if (shipping_country != "US" && shipping_state !="None") {
                    alert( "Please select none as a state if you are choosing a diferect country than US.");
                    return false;
    
                }else if ($.trim(shipping_name).length>0 && $.trim(shipping_phone).length>0 && $.trim(shipping_mail).length>0 && $.trim(shipping_city).length>0 && $.trim(shipping_state).length>0 && $.trim(shipping_address).length>0 && $.trim(shipping_zip_code).length>0 && $.trim(shipping_country).length>0 ) {

                    return true;

                } else{
                    alert("There is empty inputs. Please check and try again.");
                    return false;
                }
    
                
            }


              $(document).ready(function(){

                  $("#updateshipbutton").click(function(){
                      
                      if (validateForm()===true) {

                          var shipping_name=$("#shipping_name").val();
                          var shipping_mail=$("#shipping_mail").val();
                          var shipping_phone=$("#shipping_phone").val();
                          var shipping_address=$("#shipping_address").val();
                          var shipping_city=$("#shipping_city").val();
                          var shipping_zip_code=$("#shipping_zip_code").val();
                          var shipping_country = $("#shipping_country :selected").val();
                          var shipping_state = $("#shipping_state :selected").val();
                          var update_form = 'shipping_name=' + shipping_name+ '&shipping_mail='+shipping_mail+ '&shipping_phone='+shipping_phone+ '&shipping_address='+shipping_address+ '&shipping_city='+shipping_city+ '&shipping_zip_code='+shipping_zip_code+ '&shipping_country='+shipping_country+ '&shipping_state='+shipping_state; 

                     

                       $.ajax ({
                            type: 'POST',
                            url: './php/update_shipping_info.php',
                            data: update_form,
                            cache: false,
                           
                       }).done(function( data ) {
                           
                            if (data==true) {
                                alert("Your shipping information has been update it!!");
                                window.location.href = "client-settings.php";

                            }else{
                                alert(data);
                                return false;
                            }
                        
                      });

                      
                    }else{
                      return false;
                    }  
                          
                  });

              });
          
