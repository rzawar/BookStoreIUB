<?php
session_start();
$user = $_SESSION['username'];
?>
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
                <li class="active"><a href="#"><?php echo $user;?></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                
				<?php
				if($user == "Guest"){?>
				<!-- Login form dropdown starts -->
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle" style="min-width: 300px">Sign in<b class="caret"></b></a>
						<div class="dropdown-menu" id="signin-dropdown" style="min-width: 300px; opacity: 0.9;">
							<form class="form-signin" role="form" action = "IUBookShelf.php" method = "post">
								<input name = "username" type="text" class="form-control" placeholder="User name" required autofocus>
								<input name = "password" type="password" class="form-control" placeholder="Password" required>
								<label class="checkbox">
									<input type="checkbox" value="remember-me"> Remember me
								</label>
								<button class="btn btn-lg btn-primary btn-block" type="submit" name = "submit" value = "signin">Sign in</button>
							</form>
							<h5 class="text-muted">New to IUBookshelf ?</h5>
							<button class="btn btn-lg btn-success btn-block type="submit">Create Account</button>
						</div>
                </li>
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
	
	
	<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4 col-centered">
          <img class="img-circle" data-src="holder.js/140x140" alt="Generic placeholder image">
          <h2>Search for books</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">Search &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	
	<script type="text/javascript">
		$(document).ready(function(){
		$(".dropdown-toggle").dropdown();
		});  
		function raiseLoginError(){
			alert("Wrong username or password, Please try again!!!");
		}
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-3.1.1/docs/assets/js/docs.min.js"></script>
  </body>
</html>
