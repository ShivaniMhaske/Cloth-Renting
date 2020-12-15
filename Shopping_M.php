<?php
session_start();
include("function.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Shopping Window</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style1.css"/>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" text="text/style">
  
  <script>
  
var searchData;
var addToCart;
$(document).ready(function(){
  


searchData=function(filterCriteria)
{
filterQuery='';
	switch(filterCriteria)
	{
		case 'HtoL':
		
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product`    WHERE Gender = 'M' ORDER BY Price  DESC ";
		break;
		
		case 'LtoH':
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Gender = 'M' ORDER BY Price ASC ";
		break;

		case 'XL':
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Size = 'XL' and Gender = 'M' ORDER by Id";
		break;

		case 'L':
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `Days Of  Rent` FROM `product` WHERE Size = 'L' and Gender = 'M' ORDER by Id";
		break;

		case 'M':
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Size = 'M' and Gender = 'M'ORDER by Id";
		break;

		case 'S':
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Size = 'S' and Gender = 'M' ORDER by Id";
		break;

		case '3Star':
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Ratings = 3 and Gender = 'M' ORDER by Id";
		break;

		case '4Star':
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Ratings>=4 and Gender = 'M'ORDER by Id";
		break;

		case 'Days7':
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE DaysOfRent = 7 and Gender = 'M' ORDER by Id";
		break;

		case 'Days10':
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE DaysOfRent = 10 and Gender = 'M' ORDER by Id";
		break;
		
		default:
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product`  WHERE Gender = 'M' ORDER by Id";
		break;

		case 'Men':
		filterQuery="SELECT   `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Gender = 'M' ORDER by Id";
		break;
		


	}




  var request=$.ajax({
  	url:'function.php',
  	data:{'functionname' : 'DisplayData', 'strQuery':filterQuery},
  	type:'post',
  	success: function(response)
    { 
    	$('.row').empty();
      $('.row').append(response);


    }
  });


  request.done(function(data){

    
  });


  request.fail( function ( jqXHR, textStatus) { 
    console.log( 'Sorry: ' + textStatus ); 
  });
}




});

</script>

</head>
<body onload="searchData('');">
	
  
    <div class="navbar">
    <h3>EXPLORE HERE</h3>  <ul class="zindex" > 
        <li><a href="#">Category</a>
          <ul >
            <li><a href="Shopping.php">For Her</a></li>
            <li><a onclick="searchData('Men');">For Him</a></li>
          </ul>
        </li>
        <li><a href="#">Price</a>
          <ul>
            <li><a onclick="searchData('HtoL');">High to Low</a></li>
            <li><a onclick="searchData('LtoH');">Low to High</a></li>
          </ul>
        </li>
        <li><a href="#">Size</a>
          <ul>
            <li><a onclick="searchData('XL');">Extra Large</a></li>
            <li><a onclick="searchData('L');">Large</a></li>
            <li><a onclick="searchData('M');">Medium</a></li>
            <li><a onclick="searchData('S');">Small</a></li>
          </ul>
         </li>
        <li><a href="#">Ratings</a>
          <ul>
            <li><a onclick="searchData('3Star');">3 stars</a></li>
            <li><a onclick="searchData('4Star');">4 stars & above</a></li>
          </ul>
        </li>
        <li><a href="#">DaysOfRent</a>
          <ul>
            <li><a onclick="searchData('Days7');">For 7 days</a></li>
            <li><a onclick="searchData('Days10');">For 10 days</a></li>
          </ul>
        </li>
        <li><a class="fa fa-shopping-cart" onclick="showCart()"> Cart</a></li>
      </ul>
      <input type="hidden" id="hdnid">
    </div>

  <div id="dvMain" class="row" style="background-image: url("homebg4.jpg")>
    
?>
    
  </div>
  <div id="dvTEST" class="rr"></div>   
  </body>


</html>