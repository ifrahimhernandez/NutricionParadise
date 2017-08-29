// AJAX call for autocomplete 
        function category(str) {

          $("#search-box"+str).keyup(function(){
            $.ajax({
            type: "POST",
            url: "./php/category_select_edit.php",
            data:'keyword='+$(this).val()+'&str='+str,
            beforeSend: function(){
              $("#search-box"+str).css("background","#FFF url(./php/img/LoaderIcon.gif) no-repeat 98%");
            },
            success: function(data){
              $("#suggesstion-box"+str).show();
              $("#suggesstion-box"+str).html(data);
              $("#search-box"+str).css("background","#FFF");
            }
            });
          });
        
      };

        //To select category name
        function selectCategory(val,str) {
        $("#search-box"+str).val(val);
        $("#suggesstion-box"+str).hide();
        }


  function validateFileExtension(fld) {
                    if(!/(\.bmp|\.gif|\.jpg|\.jpeg)$/i.test($(fld).val())) {
                        alert("Invalid image file type.");      
                        $(fld).val("");
                        //fld.focus();        
                        return false;   
                    }   
                    return true; 
                 } 


    function disable(id) {

        var product = 'disable_id=' + id; 
        
        $.ajax ({
              type: 'POST',
              url: './php/enable_disable.php',
              data: product,
              cache: false,
                            
         }).done(function( data ) {
            alert(data);
            window.location = "admin-inventory.php";
        });

    };      


    function enable(id) {

        var product = 'enable_id=' + id; 
        
        $.ajax ({
              type: 'POST',
              url: './php/enable_disable.php',
              data: product,
              cache: false,
                            
         }).done(function( data ) {
            alert(data);
            window.location = "admin-inventory.php";
        });

    };   


            
       

