  function validateFileExtension(fld) {
                    if(!/(\.bmp|\.gif|\.jpg|\.jpeg)$/i.test(document.getElementById("photo").value)) {
                        alert("Invalid image file type.");      
                        document.getElementById("photo").value = "";
                        fld.focus();        
                        return false;   
                    }   
                    return true; 
                 } 
 

 
  function validateForm() {

              var product_name = document.getElementById("product_name").value;
              var category = document.getElementById("search-box").value;
              var product_quantity = document.getElementById("product_quantity").value;
              var product_weight = document.getElementById("product_weight").value;
              var product_price = document.getElementById("product_price").value;
              var product_short = document.getElementById("product_short").value;
              var product_long = document.getElementById("product_long").value;
              

               var iChars = /[^\w\s]/gi;

              if(iChars.test(product_name)=== true  || iChars.test(product_quantity)=== true ){

                alert("No special characters allowed.");
                  return false;

               }else{

                  return true;
              }
                                        
                                    
       }


             
                            



// AJAX call for autocomplete 
        $(document).ready(function(){
          $("#search-box").keyup(function(){
            $.ajax({
            type: "POST",
            url: "./php/categories_select.php",
            data:'keyword='+$(this).val(),
            beforeSend: function(){
              $("#search-box").css("background","#FFF url(./php/img/LoaderIcon.gif) no-repeat 98%");
            },
            success: function(data){
              $("#suggesstion-box").show();
              $("#suggesstion-box").html(data);
              $("#search-box").css("background","#FFF");
            }
            });
          });
        });
        //To select category name
        function selectCategory1(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
        }

        $(document).ready(function() {
            $('#example').DataTable();
        } );
 