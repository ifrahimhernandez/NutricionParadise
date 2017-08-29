 <?php
	if(@$_GET["var"]==3) {
	   
	//@$_SESSION["role"]=="";
	session_unset(@$_SESSION["role"]);
	session_unset(@$_SESSION['zip_code']);
	session_unset(@$_SESSION["country"]);
	session_unset(@$_SESSION['username']);
	session_unset(@$_SESSION["password"]);

	}
 
	if (@$_SESSION["role"]=="0") {

	?>  
	<div class="row">
	<div class=" col-xs-12  col-md-4 col-sm-4">
			<form action="search.php" method="get" class="navbar-form navbar-left" role="search" style="margin-top: 0px; ">
			    <div class="input-group">
			      <input type="text" class="form-control" name="search" placeholder="Search for...">
			      <span class="input-group-btn">
			        <button class="btn btn-default btn-md" type="submit">Search</button>
			      </span>
			    </div><!-- /input-group -->
			</form>
		</div>


  <div class=" pull-right" style="margin-right: 50px;margin-bottom: 10px;">

  <label>Hi, <?php echo $_SESSION['first_name']; ?></label> &nbsp; &nbsp;
  <a class="btn btn-danger square-btn-adjust  btn-md"  href="index.php?var=3"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;&nbsp;Logout</a>
   &nbsp;<a href="Cart.php" class="btn btn-danger square-btn-adjust  btn-md"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;Cart</a>
	</div>
</div>
	<?php     
	    } 

     if(@$_SESSION["role"]=="1") {
    	?>  
	<label>Hi, <?php echo $_SESSION['first_name']; ?></label>&nbsp; &nbsp;<a class="btn btn-danger square-btn-adjust"  href="index.php?var=3"><span class="glyphicon glyphicon-off" aria-hidden="true"></span>&nbsp;&nbsp;Logout</a> &nbsp;</a> &nbsp;
	<?php
        
    }

    if (@$_SESSION["role"]=="" || !isset($_SESSION["role"])) {

    	
        ?>
        
        <div class=" col-xs-12  col-md-4 col-sm-4">
			<form action="search.php" method="get" class="navbar-form navbar-left" role="search" style="margin-top: 0px; ">
			    <div class="input-group">
			      <input type="text" class="form-control" name="search" placeholder="Search for...">
			      <span class="input-group-btn">
			        <button class="btn btn-default btn-md" type="submit">Search</button>
			      </span>
			    </div><!-- /input-group -->
			</form>
		</div>

		
		 &nbsp; &nbsp;

		 <div class="pull-right" style="margin-right: 50px;margin-bottom: 10px;">
        <a class="btn btn-danger square-btn-adjust  btn-md" data-toggle="modal" data-target="#myModal" >Login / Register</a> &nbsp;<a href="Cart.php" class="btn btn-danger square-btn-adjust  btn-md"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;Cart</a>

		 </div>
  		
      
  		
        <?php
    
    }

 ?>