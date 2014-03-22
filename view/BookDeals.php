<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("Location: login.php"); 
	else
		$user = $_SESSION['username'];
		
	$bookid = $_GET['data1'];
	$isbn = $_GET['data2'];
	
	include '../model/Book.php';
	
	$bookObj = new Book();
	$result = $bookObj->getBookDetails($bookid);
	//echo $result;
	$row = mysql_fetch_assoc($result);
	
	/*
	echo $row['title']." ";
	echo $row['author']." ";
	*/
	
	$sellerRows = $bookObj->getSellers($isbn);
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
	#search{
	margin-left:460px;
	margin-top:50px;
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
				<li><a href="Logout.php">Sign Out</a></li>
				<li>
				</li>
              </ul>
            </div>
          </div>
        </div>
		
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group">
					<li class="list-group-item list-group-item-info">Book Title</li>
					<li class="list-group-item" style="font-weight: bold"><?php echo $row['title'];?></li>
					<li class="list-group-item list-group-item-info">Author</li>
					<li class="list-group-item" style="font-weight: bold"><?php echo $row['author'];?></li>
					<li class="list-group-item list-group-item-info">ISBN</li>
					<li class="list-group-item" style="font-weight: bold"><?php echo $row['isbn'];?></li>
					<li class="list-group-item list-group-item-info">Edition</li>
					<li class="list-group-item" style="font-weight: bold"><?php echo $row['edition'];?></li>
					<!-- <li class="list-group-item list-group-item-info">Copies available</li>
					<li class="list-group-item" style="font-weight: bold"><?php //echo $row['copies'];?></li> -->
					<li class="list-group-item list-group-item-info">Publisher</li>
					<li class="list-group-item" style="font-weight: bold"><?php echo $row['publisher'];?></li>
					<li class="list-group-item list-group-item-info">Price</li>
					<li class="list-group-item" style="font-weight: bold"><?php echo $row['price'];?></li>
					<li class="list-group-item list-group-item-info">Year published</li>
					<li class="list-group-item" style="font-weight: bold"><?php echo $row['year'];?></li>
					<li class="list-group-item list-group-item-info">Book's Seller</li>
					<li class="list-group-item" style="font-weight: bold"><?php echo $row['username'];?></li>
				</ul>
			</div>
			<div class="col-md-7">
				<table class="table table-hover">
					<tr>
						<th>Seller</th>
						<th>Price</th>
					</tr>
					<?php
						while($row = mysql_fetch_assoc($sellerRows)) { ?>
					<tr>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['price']; ?></td>
					</tr><?php } ?>
				</table>	
			</div>
		</div>
		
      </div>
	  
    </div>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="../bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
		<script src="../bootstrap-3.1.1/docs/dist/css/bootstrap.min.css"></script>
		<script src="../bootstrap-3.1.1/dist/css/bootstrap.min.css"></script>
		<script src="../bootstrap-3.1.1/docs/assets/js/docs.min.js"></script>
	
	</body>
</html>