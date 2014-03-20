<?php
if(isset($_SESSION['username']))
	header("Location: IUBookShelf.php"); 
include '../model/Login.php';

	if(isset($_POST['submit'])){
	$login = new Login($_POST['username'] ,$_POST['password']);
	try{
	$var =$login->getData();
	}
	catch (Exception $e){
	$var = 0;
	$fail = 1;
	
	}
	if($var ){
		$user = $_POST['username'];
		session_start();
		$_SESSION['username'] = $user;
		echo "here in if";
		header("Location: IUBookShelf.php"); 
	}
	else
	echo "should be here";
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

  <body>

    <div class="container">

      <form class="form-signin" action = "login.php" method = "post" role="form">
        <h3 class="form-signin-heading">Sign in to IU Book Shelf</h3>
        <input type="text" class="form-control" placeholder="User name" name = "username" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name = "submit" >Sign in</button>
		<h5 class="text-muted">New to IUBookshelf ?</h5>
		<button class="btn btn-lg btn-success btn-block" data-toggle="modal" data-target="#registerModal">Create Account</button>
      </form>
	<button class="btn btn-lg btn-success btn-block" data-toggle="modal" data-target="#registerModal">Create Account</button>
	 
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
						
							<div id="poslabel" class="control-group">
								<label class="control-label" for="inputUserName">User Name</label>
								<div class="controls">
									<input name="user_name" type="text" id="user_name" class="required username" minlength="5" >
									<input name="btnAvailable" type="button" id="btnAvailable" value="Check Availability" class="btn btn-warning">
								<br>
								<span style="color:red; font: bold 10px verdana; " id="checkid"  ></span> 
								</div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputFirstName">First Name </label>
                                 <div class="controls">
									<input name="first_name" type="text" id="first_name" size="40" class="required">
                                 </div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputLastName">Last Name </label>
                                 <div class="controls">
									<input name="last_name" type="text" id="last_name" size="40" class="required">
                                 </div>
                            </div>

                            <div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
									<input name="usr_email" type="text" id="usr_email" class="required email"> 
									<span class="example">** Please enter a valid email address</span>
								</div>
                            </div>
							
                            <div  id="poslabel"  class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
									<input name="pwd" type="password" class="required password" minlength="5" id="pwd"> 
									<span class="example">** Minimum 5 characters</span>
								</div>
                            </div>
                               
                            <div id="poslabel"  class="control-group">
                                <label class="control-label" for="inputPassword">Re-enter Password</label>
                                <div class="controls">
									<input name="pwd2"  id="pwd2" class="required password" type="password" minlength="5" equalto="#pwd">
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
									<input name="phoneno" type="text" id="phoneno" size="20" class="required">
                                 </div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="dob">Date of Birth</label>
                                 <div class="controls">
									<input name="dob" type="text" id="dob" size="10" class="required">
                                 </div>
                            </div>
                               
                            <div id="poslabel"  class="control-group">
								<div class="controls"><br>
                                <button type="submit" class="btn btn-success" name="doRegister" type="submit" id="doRegister" value="Register">Register</button>
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
			$("#doRegister").click(function() {
			//alert("here button clicked");
			$.ajax({
			type : "GET",
			url: 'process.php',
			//data: 'title='+notetitle+'contents='+notecontents,
			//data:{title:"notetitle", contents:"notecontents"},
			success: function(data){
				alert("success!!!"+data);
				location.reload(true);
				// Load the content in to the page.
				},
			error: function(jqXHR, exception) {
            if (jqXHR.status === 0) {
                alert('Not connect.\n Verify Network.');
            } else if (jqXHR.status == 404) {
                alert('Requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                alert('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                alert('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                alert('Time out error.');
            } else if (exception === 'abort') {
                alert('Ajax request aborted.');
            } else {
                alert('Uncaught Error.\n' + jqXHR.responseText);
            }
        }
		});
    });
});
	</script>
  </body>
</html>