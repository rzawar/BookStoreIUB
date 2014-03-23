<?php
if(isset($_SESSION['username']))
	header("Location: IUBookShelf.php"); 
include '../model/Login.php';
include '../model/User.php';
	if(isset($_POST['submit'])){
		$login = new Login($_POST['username'] ,$_POST['password']);
		try{
			$var =$login->getData();
		}
		catch (Exception $e){
			$var = 0;
			$fail = 1;
		}
		if($var){
			$user = $_POST['username'];
			session_start();
			$_SESSION['username'] = $user;
			echo "here in if";
			header("Location: IUBookShelf.php"); 
		}
		else
			$check = true;
	}
	else{
		$check = false;
	}
	
	if(isset($_POST['doRegister'])) {
 		$user = new User();
		$user->setObject($_POST['user_name'], $_POST['first_name'], $_POST['last_name'], $_POST['usr_email'], $_POST['pwd'], $_POST['address'], $_POST['phoneno'], $_POST['dob']);
		$returnVal = $user->insertUser();
		// echo $returnVal;
		
		/*
		if($returnVal != 1) {
			echo "something went wrong during insertion of user data";
		} else {
			echo "Welcome, new user!";
		}
		*/
	}
	else{
		$returnVal = 0;
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
    <link rel="shortcut icon" href="../bootstrap-3.1.1/docs/assets/ico/IU_logo.ico">

    <title>IUBookshelf LoginPage</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.1.1/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap-3.1.1/docs/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
  #img{
	margin-left:410px;
	margin-top:5px;
}
  </style>
  <body>

    <div class="container">
	<?php if($check) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Inccorect username or password!!!</strong> Please try again.
	</div>
	<?php } 
	if($returnVal == 1) { ?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>User registered successfully!!!</strong> Please Log in.
	</div>
	<?php } ?>
	<img src = "../img/iuhomelogo.png" id ="img"/>
      <form class="form-signin" action = "login.php" method = "post" role="form">
        <h3 class="form-signin-heading">Sign in to IUBookShelf</h3>
        <input type="text" class="form-control" placeholder="User name" name = "username" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name = "submit" >Sign in</button>
		<!-- <button class="btn btn-lg btn-success btn-block" data-toggle="modal" data-target="#registerModal">Create Account</button> -->
      </form>
	
	<!-- wrote div below outside the <form> to avoid 'please fill this field' message -->
	<div style="margin-left:420px;">
		<h4 class="text-muted">New to IUBookshelf ?</h4>
		<button class="btn btn-lg btn-success" data-toggle="modal" data-target="#registerModal" style="min-width:300px;">Create Account</button>
	</div>
	
    </div> <!-- /container -->
	<!-- the registration modal that pops up -->
	<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="registerModalLabel">New Registration</h4>
				</div>
					
				<div class="modal-body">
					<div class="container" style="margin: 10px;">
						
						<!-- New user to fill out basic profile information -->
						
						<form class="form-horizontal" action="login.php" method="post" name="regForm" id="regForm" >
							<div id="poslabel" class="control-group">
								<label class="control-label" for="inputUserName">User Name</label>
								<div class="controls">
									<input name="user_name" type="text" id="user_name" required minlength="5" >
									<input name="btnAvailable" type="button" id="btnAvailable" value="Check Availability" class="btn btn-warning">
								<br>
								<span style="color:red; font: bold 10px verdana; " id="checkid"  ></span> 
								</div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputFirstName">First Name </label>
                                 <div class="controls">
									<input name="first_name" type="text" id="first_name" size="40" required>
                                 </div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputLastName">Last Name </label>
                                 <div class="controls">
									<input name="last_name" type="text" id="last_name" size="40" required>
                                 </div>
                            </div>

                            <div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
									<input name="usr_email" type="text" id="usr_email" required> 
									<span class="example">** Please enter a valid email address</span>
								</div>
                            </div>
							
                            <div  id="poslabel"  class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
									<input name="pwd" type="password" required minlength="5" id="pwd"> 
									<span class="example">** Minimum 5 characters</span>
								</div>
                            </div>
                               
                            <div id="poslabel"  class="control-group">
                                <label class="control-label" for="inputPassword">Re-enter Password</label>
                                <div class="controls">
									<input name="pwd2"  id="pwd2" required type="password" minlength="5" equalto="#pwd">
								</div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputAddress">Address</label>
                                 <div class="controls">
									<!--<input name="address" type="text" id="address" size="80">-->
									<textarea class="input-xlarge" name="address" id="address" rows="2" cols="70"></textarea>
                                 </div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="phoneno">Phone no.</label>
                                 <div class="controls">
									<input name="phoneno" type="text" id="phoneno" size="20" required>
                                 </div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="dob">Date of Birth</label>
                                 <div class="controls">
									<input name="dob" type="text" id="dob" size="10" required>
                                 </div>
                            </div>
                               
                            <div id="poslabel"  class="control-group">
								<div class="controls"><br>
                                <button type="submit" class="btn btn-success" name="doRegister" type="submit" id="doRegister" value="Register">Register</button>
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
	<hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="../bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
   <script src="../bootstrap-3.1.1/docs/assets/js/docs.min.js"></script>
	<script src="../bootstrap-3.1.1/js/modal.js"></script>
	<script>
		$(document).ready(function() {
			$("#changed").click(function() {
				
				var username = $("#user_name").val();
				var fname = $("#first_name").val();
				var lname = $("#last_name").val();
				var email = $("#usr_email").val();
				var password = $("#pwd").val();
				var address = $("#address").val();
				var phoneno = $("#phoneno").val();
				var dob = $("#dob").val();
				$.ajax({
					url: 'process.php',
					data:{username:username, fname:fname, lname:lname, email:email, password:password, address:address, phoneno:phoneno, dob:dob},
				success: function(data){
					alert(data);
					location.reload(true);							// Load the content in to the page.
				},
				error: function(data) {
					alert("in error"+data);
				}
			});
		});
		});
	</script>
  </body>
</html>