<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		header("Location: IUBookShelf.php");
	}
	
	if(isset($_POST['uploadQuote'])) {
		$title = $_POST['book_title'];
		$author = $_POST['book_author'];
		$ISBN = $_POST['book_ISBN'];
		$edition = $_POST['book_edition'];
		$publisher = $_POST['book_publisher'];
		$price = $_POST['book_price'];
		$year = $_POST['publish_year'];
		$user = $_SESSION['username'];
		
		include '../model/Book.php';
		$book = new Book();
		$book->setBookData($ISBN, $title, $edition, $author, $publisher, $price, $year, $user);
		$return = $book->insertBook();
		
		
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
				<div class="navbar navbar-inverse navbar-static-top" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>

							<a class="navbar-brand" href="IUBookShelf.php">IUBookShelf</a>
						</div>
						
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#"><?php echo $_SESSION['username'];?></a></li>
								<li><a href="#about">About</a></li>
								<li><a href="#contact">Contact</a></li>
								
							<?php
								if(!isset($_SESSION)){?>
									<li><a href="Login.php">Sign In</a></li>
							<?php
							} else {?>
								<li><a href="Logout.php">Sign Out</a></li>
							<?php
							}
						?>
							</ul>
						</div>
					</div>
				</div>

				<div class="hero-unit">
					<h1>Sell your books here!</h1>
					
					<p>If you are looking to sell your used textbooks and make a quick buck, you have come to the right place !</p>
					<p>Start by entering your books' information - things like book "title", the "price" you want to sell it at, etc.</p>
					<p>Fill out the form below:</p>
				</div>
				
				<div style="">
					<form class="form-horizontal" action="SellBooks.php" method="post" name="SellBookForm" id="SellBookForm">
							<div id="poslabel" class="control-group">
								<label class="control-label" for="inputBookTitle">Book Title</label>
								<div class="controls">
									<input name="book_title" type="text" id="book_title" required size="60">
								</div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputBookAuthor">Book Author</label>
                                 <div class="controls">
									<input name="book_author" type="text" id="book_author" required size="60">
                                 </div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputBookISBN">Book's ISBN</label>
                                 <div class="controls">
									<input name="book_ISBN" type="text" id="book_ISBN" required size="60">
                                 </div>
                            </div>

                            <div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputBookEdition">Book's Edition</label>
                                <div class="controls">
									<input name="book_edition" type="text" id="book_edition" size="60">
								</div>
                            </div>
                               
                            <div id="poslabel"  class="control-group">
                                <label class="control-label" for="inputBookPublisher">Book's Publisher</label>
                                <div class="controls">
									<input name="book_publisher" id="book_publisher" required type="text" size="60">
								</div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputBookPrice">Book's Price</label>
                                 <div class="controls">
									<input name="book_price" id="book_price" required type="text" size="60">
                                 </div>
                            </div>
							
							<div id="poslabel" class="control-group">
                                 <label class="control-label" for="inputYearPublished">Year Published</label>
                                 <div class="controls">
									<input name="publish_year" type="text" id="publish_year" size="60">
                                 </div>
                            </div>
							
							<div id="poslabel"  class="control-group">
								<div class="controls"><br>
                                <button type="submit" class="btn btn-success" name="uploadQuote" type="submit" id="uploadQuote">Submit Book Info</button>
                                &nbsp;&nbsp;<button type="reset" class="btn">Clear</button>
                                </div>
                            </div>
							</form>
		</div>
				
			</div>	
		</div>
		
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
	</body>
</html>