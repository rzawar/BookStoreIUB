<?php

session_start();
include '../model/User.php';
if(isset($_SESSION['username']))
	$username =  $_SESSION['username'];
else 
$username = "Guest";

$user = new User();
$result = $user->getUserDetails($username);
$details = mysql_fetch_assoc($result);

$userBooks = $user->getBooksUser($username);
		
		if(isset($_POST['doModify'])) {
		$resultModify = $user->modifyUser( $username,$_POST['first_name'], $_POST['last_name'], $_POST['usr_email'], $_POST['address'], $_POST['phoneno'], $_POST['dob']);
		header("Location: User.php"); 
		/*
		if($returnVal != 1) {
			echo "something went wrong during insertion of user data";
		} else {
			echo "Welcome, new user!";
		}
		*/
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../bootstrap-3.1.1/docs/assets/ico/IU_Logo.ico">

    <title>IU Book Shelf</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom styles for this template -->
    <link href="../bootstrap-3.1.1/docs/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../bootstrap-3.1.1/docs/examples/carousel/carousel.css" rel="stylesheet">
	<style>
	.navbar-nav > li{
	margin-left:30px;
	margin-right:30px;
	}
	</style>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand" href="IUBookShelf.php">IU Book Shelf</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
               <li class="active"><a href="User.php"><span class="glyphicon glyphicon-user"></span>    <?php echo $username;?></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                
				<?php
				if($user == "Guest"){?>
				<li><a href="Login.php">Sign In</a></li>
				<?php
				}else {?>
				<li><a href="Logout.php">Sign Out</a></li>
				<?php
				}
				?>
				<li>
				</li>

				<!-- Login form dropdown ends -->
				
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Carousel
    ================================================== -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
		<div class="modal fade" id="modify" tabindex="-1" role="dialog" aria-labelledby="modify" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="registerModalLabel"><strong> <?php echo $details['username']; ?></strong></h4>
				</div>
					
				<div class="modal-body">
					<div class="container" style="margin: 10px;">
						
						<!-- New user to fill out basic profile information -->
						
						<form class="form-horizontal" action="User.php" method="post" name="regForm" id="regForm" >
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputFirstName">First Name </label>
                                 <div class="controls">
									<input name="first_name" type="text" id="first_name" size="40" required value ="<?php echo $details['fname']; ?>">
                                 </div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputLastName">Last Name </label>
                                 <div class="controls">
									<input name="last_name" type="text" id="last_name" size="40" required value ="<?php echo $details['lname']; ?>">
                                 </div>
                            </div>

                            <div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
									<input name="usr_email" type="text" id="usr_email" required value ="<?php echo $details['email']; ?>"> 
								</div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputAddress">Address</label>
                                 <div class="controls">
									<!--<input name="address" type="text" id="address" size="80">-->
									<textarea class="input-xlarge" name="address" id="address" rows="2" cols="70"><?php echo $details['address']; ?></textarea>
                                 </div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="phoneno">Phone no.</label>
                                 <div class="controls">
									<input name="phoneno" type="text" id="phoneno" size="20" required value ="<?php echo $details['phoneno']; ?>">
                                 </div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="dob">Date of Birth</label>
                                 <div class="controls">
									<input name="dob" type="text" id="dob" size="10" required value ="<?php echo $details['dob']; ?>">
                                 </div>
                            </div>
                               
                            <div id="poslabel"  class="control-group">
								<div class="controls"><br>
                                <button type="submit" class="btn btn-success" name="doModify" type="submit" id="doModify" value="Modify">Save</button>
                                <button type="reset" class="btn">Clear</button>
                                </div>
                            </div>
						</form>	
					</div>
				</div>
				
				<!-- footer with 'Close' and 'Save Changes' tags
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
				-->
			</div>
		</div>
	</div>
	<div class="modal fade" id="modifyQuote" tabindex="-1" role="dialog" aria-labelledby="modify" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="registerModalLabel"><strong> <?php echo $details['username']; ?></strong></h4>
				</div>
					
				<div class="modal-body">
					<div class="container" style="margin: 10px;">
						
						<!-- New user to fill out basic profile information -->
						
						
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="newPrice">New Price</label>
                                 <div class="controls">
									<input name="newPrice" type="text" id="newPrice" size="20">
                                 </div>
                            </div>   
                            <div id="poslabel"  class="control-group">
								<div class="controls"><br>
                                <button type="submit" class="btn btn-success" name="doModify" type="submit" id="doModify" value="Modify">Save</button>
                                <button type="reset" class="btn">Clear</button>
                                </div>
                            </div>
					</div>
				</div>
				
				<!-- footer with 'Close' and 'Save Changes' tags
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
				-->
			</div>
		</div>
	</div>
    <div class="container marketing">
	<hr>
      <!-- Three columns of text below the carousel -->
      <!-- START THE FEATURETTES -->
	  <div class ="row">
	  <div class="col-md-4">
	  <h3>User details</h3>
	  <div class="panel panel-default">
  		<div class="panel-heading">Username : <?php echo $details['username']; ?> </div>
			<ul class="list-group">
				<li class="list-group-item">First name : <?php echo $details['fname']; ?></li>
				<li class="list-group-item">Last name  : <?php echo $details['lname']; ?></li>
				<li class="list-group-item">Email 	   : <?php echo $details['email']; ?></li>
				<li class="list-group-item">addresss   : <?php echo $details['address']; ?></li>
				<li class="list-group-item">phone no   : <?php echo $details['phoneno']; ?></li>
				<li class="list-group-item">Birth Day  : <?php echo $details['dob']; ?></li>
				<li class="list-group-item"><button class="btn btn-lg btn-success" data-toggle="modal" data-target="#modify">Edit Details</button></li>

			</ul>
		</div>
		</div>
		<div class = "col-md-2">
		</div>
		<div class = "col-md-5">
		<?php if(mysql_num_rows($userBooks) != 0) {?>
		<h3>User transaction details</h3>
			<table class="table">
					<tr>
						<th>Book</th>
						<th>Price</th>
						<th>Modify quote</th>
					</tr>
					<?php
						while($row = mysql_fetch_assoc($userBooks)) { ?>
					<tr>
						<td><?php echo $row['title']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td><a class="request" data-target= "#modifyQuote" role="button" data-toggle = "modal" data-id = "<?php echo $row['bookid'] ?>">Edit quote</a></td>
					</tr><?php } ?>
			</table>	
			<?php }
			else { ?>
			<h3>User has no transaction history yet</h3>
			<?php } ?>
		</div>
		</div>
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src= "../bootstrap-3.1.1/dist/"></script>
    <script src="../bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-3.1.1/docs/assets/js/docs.min.js"></script>
	<script src="../bootstrap-3.1.1/js/modal.js"></script>
	
	
	<!-- script below submits Registration form contents to process.php and shows the processed results in the 'registerModal' div -->
  </body>
</html>
