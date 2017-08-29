                                    function updatetrack(id) {
                                      // body...
                                      var track_number=$("#track_number"+id).val();
                                      

                                       if (track_number==null || track_number=="") { 

                                          var update_form = 'orderid='+id;
                                          var responce=confirm("The tracking number is empty. Do you wish to notify the client that the order was shipped without the tracking number?");

                                          if (responce==true) {
                                            
                                              $.ajax ({
                                              type: 'POST',
                                              url: './php/tracking_number.php',
                                              data: update_form,
                                              cache: false,
                                              
                                              
                                              }).done(function( data ) {
                                            alert(data);
                                          window.location = "admin-orders.php";
                                        });
                                         
                                          };

                                       }else{

                                        var update_form = 'track_number=' + track_number+ '&orderid='+id;
                                        

                                              $.ajax ({
                                              type: 'POST',
                                              url: './php/tracking_number.php',
                                              data: update_form,
                                              cache: false,
                                            
                                              
                                         }).done(function( data ) {
                                              alert(data);
                                          window.location = "admin-orders.php";
                                        });
                                      
                                       }
                                    }




                                    function updatetracksent(id) {
                                      // body...
                                      var track_number=$("#track_number"+id).val();
                                      

                                       if (track_number==null || track_number=="") { 

                                         alert("Tracking number field cant be empty! Please try again!");

                                       }else{

                                        var update_form = 'track_number=' + track_number+ '&orderid='+id;
                                        

                                              $.ajax ({
                                              type: 'POST',
                                              url: './php/tracking_number.php',
                                              data: update_form,
                                              cache: false,
                                                                                            
                                         }).done(function( data ) {
                                              alert(data);
                                          window.location = "admin-orders.php";
                                        });
                                       }
                                    }