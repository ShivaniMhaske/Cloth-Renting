<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!----Bootsrap CSS----->
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">

	<!--------Customized CSS---------->
	<link rel="stylesheet" type="text/css" href="kajal_style.css">


  
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
  
</head>
<body>

<div class="navbar">
	<h3>Cloth Renting For You</h3><ul>
  <li><a class="active" href="#">Home</a></li>
  <li><a href="#category">Categories</a></li>
  <li><a href="#contact">Contact Us</a></li>
  <li><a href="#about">About Us</a></li>
</ul>
 -->    <form  action="Login.php" class="form-inline my-2 my-lg-0">
      
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" 
      >Login/Register</button>
    </form>
  </div>
</nav>
</div>

<div class="container">
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="homebg1.jpg" alt="Homebg" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Elegent Shopping</h3>
        <p>We had such a great time in!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="homebg2.jpg" alt="homebg2" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Fancy Dresses</h3>
        <p>Thank you!</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="homebg3.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Trending Designs</h3>
        <p>We love it!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>

<div id="about">
<section class="m-5">
	<div >
		<h2 class="text-center"> About Us</h2>
	</div>
	<div class="row mt-5">
		<div class="col-lg-6 col-12">
			<img src="homebg4.jpg" class="img-fluid aboutimg" >
		</div>
		<div class="col-lg-6 col-12">
			<h2 class="display-4">Renting Clothes.. </h2>
			<p class="py-4"> I wore this stunning gold mirror lehenga for my best friend's destination wedding and I absolutely loved the attention that I grabbed that day! The fittimg was perfect too Thank you Team Stylease for making me look so gorgeous in my Insta pictures! </p>
				
		</div>
	</div>
</section>
</div>


<div id="category">
<section class="m-5">
	<div class="pt-5">
		<h2 class="text-center"> Explore Here </h2>
	</div>
	<div class="mt-5 container-fluid">
		<div class="row">
			 <div class="col-lg-6 col-md-6 col-12">
			 	<div class="card" >
			 	  <a href="Shopping.php">
				  <img class="card-img-top" src="endpic2.jpg" alt="Card image">
				  </a>
				  <div class="title_centered">For Her</div>
				  
				</div>
			 </div>
			  <div class="col-lg-6 col-md-6 col-12">
			 	<div class="card" >
			 	  <a href="Shopping_M.php">
				  <img class="card-img-top" src="Groom.jpg" alt="Card image">
				  </a>
				  <div class="title_centered">For Him</div>
				  
				</div>
			 </div>
		</div>
	</div>
</section>
</div>



<div id="contact">
<section class="my-5">
	<div class="pt-5">
		<h1 class="text-center">  Contact Us </h1>
	</div>

	<div class="w-50 m-auto">
		<form action="" method="post">
		<div class="form-group">
	    <label for="pwd">Name:</label>
	    <input type="text" class="form-control" name="user" pattern="(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least 8 or more characters" >
	  </div>
	  <div class="form-group">
	    <label for="email">Email address:</label>
	    <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter Correct Email Id">
	  </div>
	  	<div class="form-group">
			<label for="comment">Your Suggestions:</label>
  <textarea class="form-control" rows="5" name="comment"></textarea>

		</div>
	

	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
		
	</div>
</section>

<footer>
	<div class=" bg-dark text-center text-capitalize">
		<h5 class="py-3 text-white">@ClothRentingProduction</h5>
	</div>
</footer>
</div>

<script src="Js/jquery.min.js"></script>
<script src="Js/popper.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
<script src="Js/all.min.js"></script>


</body>
</html>