<?php
// include('Userc.php');

// $object=new Userc;

if (isset($_SESSION['user'])) {
	

?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/all.min.css">
<style type="text/css">
	.color{
	background-color: rgb(0,0,0);

}
nav li a, a.dropdown-item{
	color:rgb(230,230,0);
}
a.dropdown-item:active{
	background-color:rgb(230,230,0);
}
nav li a:hover {
	background-color:white;
	color: black!important;
}
</style>


				<nav class="navbar navbar-expand-lg py-4 color">
		  		<button class="navbar-toggler bg-light text-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  		</button>
		  		<span style="color:red; font-style:italic; font-size:30px; font-weight:bolder" class="mr-2">ALASO</span>
			  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			      <li class="nav-item active">
			        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="logbook.php">Style book</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="view_work.php">All Styles</a>
	      </li>
	      
        <li class="nav-item">
	        <a class="nav-link" href="cdashboard.php">Dashboard</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
	    </form>
	    <button class="btn btn-warning mx-1"><a href="logout.php" style="text-decoration:none; color:white">Log out</a></button>
	  </div>
	  <a href="cart.php"><i class="fa fa-shopping-cart text-success fa-2x" id="cart"></i><span class="badge badge-light"><?php


// if (isset($_SESSION['user'])) {
	$object->getCartNo($_SESSION['user']);
// }
	  ?></span></a>
	</nav>
			</div>
		</div>
	

<?php
}
?>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<?php
if(!isset($_SESSION['user'])){
?>
<style type="text/css">
	.color{
	background-color: rgb(0,0,0);

}
nav li a, a.dropdown-item{
	color:rgb(230,230,0);
}
a.dropdown-item:active{
	background-color:rgb(230,230,0);
}
nav li a:hover {
	background-color:white;
	color: black!important;
}
</style>
<nav class="navbar navbar-expand-lg py-4 color">
		  		<button class="navbar-toggler bg-light text-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  		</button>
		  		<span style="color:red; font-style:italic; font-size:30px; font-weight:bolder" class="mr-2">ALASO</span>
			  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			      <li class="nav-item active">
			        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="tail_view.php">All Styles</a>
	      </li>
	      
	      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sign up
        </a>
        <div class="dropdown-menu color" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="tailor.php">Tailor</a>
          <a class="dropdown-item" href="customer.php">Customer</a>
          
        </div>
	    </ul>
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
	    </form>
	    <button class="btn btn-warning mx-1"><a href="login.php" style="text-decoration:none; color:white">Login</a></button>
	  </div>
	  <a href="cart.php"><i class="fa fa-shopping-cart text-success fa-2x"></i></a>
	</nav>
			</div>
		</div>

<?php
}
?>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
