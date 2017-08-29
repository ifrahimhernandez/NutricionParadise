 $(document).ready(function(){

                                    $("#login-submit").click(function(){

                                        var username=$("#username").val();
                                        var password=$("#password").val();
                                        var login_form = 'username=' + username+ '&password='+password; 

                                        if($.trim(username).length>0 && $.trim(password).length>0){

                                         $.ajax ({
                                              type: 'POST',
                                              url: './php/login_form.php',
                                              data: login_form,
                                              cache: false,
                                               
                                         }).done(function( data ) {
                                              var data = data.trim();
                                                    
                                                    if (data == 'false') {
                                                        alert("Wrong username or password. Please try again.");
                                                    }
                                                        
                                                        
                                                        if (data =='1') {

                                                            $('#login-form').attr('target','');
                                                            $('#login-form').attr('action','admin-consulting-inbox.php');
                                                            $('#login-form').submit();

                                                        }

                                                        if (data =='0') {

                                                            $('#login-form').attr('target','');
                                                            $('#login-form').attr('action','index.php');
                                                            $('#login-form').submit();

                                                        }
                                             
                                          });

                                        }
                                        
                                            
                                    });

                                });