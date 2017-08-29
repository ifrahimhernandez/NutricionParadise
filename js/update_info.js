        function validateForm1() {

                var username = document.getElementById("username12").value;
                var phone = document.getElementById("phone12").value;
                var email = document.getElementById("email12").value;
                var city = document.getElementById("city12").value;
                var state = document.getElementById("state12").value;
                var address = document.getElementById("address12").value;
                var zip_code = document.getElementById("zip_code12").value;
                var country = document.getElementById("country12").value;
                var hasNumber = /\d/;
                var rule = /^[a-zA-Z ]*$/;
                var iChars = /[^\w\s]/gi;

                 if(iChars.test(username)=== true  || iChars.test(city)=== true  ){
                  alert("No special characters allowed.");
                  return false;

                 }if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
                    alert("Not a valid e-mail address.");
                    return false;

                }else if (!rule.test(city)) {

                    alert("Invalid city. Please check and try again.");
                    return false;

                }else if (country == "US" && state =="None") {
                    alert("Please select a state.");
                    return false;
    
                } else if (country != "US" && state !="None") {
                    alert("Please select none as a state if you are choosing a diferect country than US.");
                    return false;
    
                }else if ($.trim(username).length>0 && $.trim(phone).length>0 && $.trim(email).length>0 && $.trim(city).length>0 && $.trim(state).length>0 && $.trim(address).length>0 && $.trim(zip_code).length>0 && $.trim(country).length>0 ) {

                     return true;

                } else{
                    alert("There is empty inputs. Please check and try again.");
                    return false;
                }
    
                
            }


                     $(document).ready(function(){

                        $("#updateinfobutton").click(function(){
                            
                            if (validateForm1()===true) {

                            var username=$("#username12").val();
                            var email=$("#email12").val();
                            var phone=$("#phone12").val();
                            var address=$("#address12").val();
                            var city=$("#city12").val();
                            var zipcode=$("#zip_code12").val();
                            var state = $("#state12 :selected").val();
                            var country = $("#country12 :selected").val();
                            var update_form = 'username=' + username+ '&email='+email+ '&phone='+phone+ '&address='+address+ '&city='+city+ '&state='+state+ '&zipcode='+zipcode+ '&country='+country; 

                             $.ajax ({
                                    type: 'POST',
                                    url: './php/update_client_info.php',
                                    data: update_form,
                                    cache: false,
                                                                                  
                               }).done(function( data ) {

                                    if (data==true) {
                                        alert("Your personal information has been update it!!");
                                        window.location.href = "client-settings.php";
                                    }else{
                                        alert(data);
                                        return false;
                                    }
                               
                               });
                            
                          }else{
                            return false;
                          };  
                                
                        });

                    });
                            
