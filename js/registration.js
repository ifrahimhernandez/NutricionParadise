function validateForm() {

  var firstname = document.getElementById("firstname100").value;
  var lastname = document.getElementById("lastname100").value;
  var email = document.getElementById("email100").value;
  var city = document.getElementById("city100").value;
  var state = document.getElementById("state100").value;
  var username = document.getElementById("username100").value;
  var phone = document.getElementById("phone100").value;
  var address = document.getElementById("address100").value;
  var zip_code = document.getElementById("zipcode100").value;
  var country = document.getElementById("country100").value;
  var password1 = document.getElementById("password100").value;
  var password2 = document.getElementById("password200").value;
  
   var n = password1.length;
   var n2 = password2.length;
   var rule = /^[a-zA-Z ]*$/;
   var iChars = /[^\w\s]/gi;
   var re = /\S+@\S+\.\S+/;  

    if(iChars.test(username)=== true  || iChars.test(city)=== true || iChars.test(firstname)=== true || iChars.test(lastname)=== true){
      alert("No special characters allowed.");
      return false;

     }else if(lastname.length <=0 || firstname.length <=0 || email.length <=0 || city.length <=0 || username.length <=0 || phone.length <=0 || address.length <=0 || zip_code.length <=0 ){
      alert("Empty inputs");
      return false;

     }else if (!/^[a-zA-Z]*$/g.test(firstname)) {
        alert("Invalid First Name");
        return false;
    
    } else if (n<5 || n2<5) {
        alert("Your password should be longer than 5 caracters");
        return false;
    
    }else if (!/^[a-zA-Z]*$/g.test(lastname)) {
      alert("Invalid Last Name");
      return false;

    }else if (!re.test(email)) {
      alert("Invalid Email. Please check and try again.");
       return false;

    }else if (!rule.test(city)) {
      alert("Invalid city. Please check and try again.");
      return false;

    } else if (country == "US" && state =="None") {
      alert("Please select a state.");
      return false;

    } else if (country != "US" && state !="None") {
      alert("Please select none as a state if you are choosing a diferect country than US.");
      return false;

    }else if (password1 != password2) {
      alert("The passwords must match. Please check again.");
      return false;

    }else{

        
        
        return true;
    }
      
  
}


    $(document).ready(function(){


        $("#register-submit").click(function(){

          if (validateForm()==true) {

            var username=$("#username100").val();
            var password=$("#password100").val();
            var email=$("#email100").val();
            var firstname=$("#firstname100").val();
            
            var lastname=$("#lastname100").val();
            var phone=$("#phone100").val();
            
            var address=$("#address100").val();
            var city=$("#city100").val();
           
            var zipcode=$("#zipcode100").val();
            
            var state = $("#state100 :selected").val();
            var country = $("#country100 :selected").val();
            var pass1 = $("#password100").val();
            var pass2 = $("#password200").val();

            
         if (!$.trim(username) || !$.trim(phone) || !$.trim(email) || !$.trim(city) || !$.trim(state) || !$.trim(address) || !$.trim(zipcode) || !$.trim(country)|| !$.trim(pass1)|| !$.trim(pass2) ) {
            alert("There is empty inputs. Please check and try again.");
            return false;

        } else{

            
            var registration_form = 'username=' + username+ '&password='+password+ '&email='+email+ '&firstname='+firstname+ '&lastname='+lastname+ '&phone='+phone+ '&address='+address+ '&city='+city+ '&state='+state+ '&zipcode='+zipcode+ '&country='+country; 
            var d;
           

             $.ajax ({
                  type: 'POST',
                  url: 'php/registration_form.php',
                  data: registration_form,
                  cache: false,
                                                                
             }).done(function( data ) {
                
                  if (data==true) {
                    alert("Your account has been created!!");
                    window.location.href = "index.php";
                  }else{
                    alert(data);
                    return false;
                  }

                                                                
              });


        }

      }else{
        return false;
      }
 });

});
                
