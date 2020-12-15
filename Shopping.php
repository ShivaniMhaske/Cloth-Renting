<?php


include("test3.php");


if (empty($_SESSION['test'])) 
    $test='';
else
  $test=json_encode($_SESSION['test']);



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


 
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script type="text/javascript">

    <?php 

    $CustName=$_SESSION['CustName'];  ?>
    

    var custName="<?php echo $CustName ?>";</script>
  <script> 

var searchData;
var popMsg;
var showCart;
var signOut;


$(document).ready(function(){

if(custName !=""){
$("#liCustomer").css("display","block");
$("#lblCustName").text("Hello "+ custName);
}
else{
 $("#liCustomer").css("display","none"); 
}


searchData=function(filterCriteria)
{
filterQuery='';
	switch(filterCriteria)
	{
		case 'HtoL':
		
		filterQuery="SELECT `Id`,  `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Gender = 'F' ORDER BY Price  DESC ";
		break;
		
		case 'LtoH':
		filterQuery="SELECT `Id` , `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Gender = 'F' ORDER BY Price ASC ";
		break;

		case 'XL':
		filterQuery="SELECT `Id`,  `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Size = 'XL' AND Gender='F' ORDER by Id";
		break;

		case 'L':
		filterQuery="SELECT `Id` , `Image`, `Title`, `Price`, `Size`, `Ratings`, `Days Of  Rent` FROM `product` WHERE Size = 'L' AND Gender='F' ORDER by Id";
		break;

		case 'M':
		filterQuery="SELECT `Id`,  `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Size = 'M' AND Gender='F'  ORDER by Id";
		break;

		case 'S':
		filterQuery="SELECT `Id` , `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Size = 'S' AND Gender='F'  ORDER by Id";
		break;

		case '3Star':
		filterQuery="SELECT `Id` , `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Ratings = 3 AND Gender='F' ORDER by Id";
		break;

		case '4Star':
		filterQuery="SELECT `Id` , `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Ratings>=4 AND Gender='F' ORDER by Id";
		break;

		case 'Days7':
		filterQuery="SELECT `Id` , `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE DaysOfRent = 7 AND Gender='F' ORDER by Id";
		break;

		case 'Days10':
		filterQuery="SELECT  `Id`, `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE DaysOfRent = 10 and Gender = 'F' ORDER by Id";
		break;
		
		default:
		filterQuery="SELECT  `Id`, `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product`   ORDER by Id";
		break;

		case 'Women':
		filterQuery="SELECT `Id` ,  `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Gender = 'F' ORDER by Id";
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

popMsg = function(cart){

 
  $.post("test3.php", {"functionname": "Add","dt": cart},function(data){



  
  });

   

  
}

signOut=function(){
 
 $.post("test3.php", {"functionname": "signOut","dt": ""},function(data){
  window.location.href="signOut.php";

  
  });

}
 
   



  showCart = function()
{
  
window.location.href = "cart2.php";
return true;
}

	

	
});

</script>

</head>
<body onload="searchData('');">
	
  
    <div class="navbar">
    <h3>EXPLORE HERE</h3>  
    <ul class="zindex" > 
      <li id="liCustomer" style="display: none;">

        <a><img src="userIcon.jpg" style="width: 35px;height:35px;float: left;" /> <span id="lblCustName">
         
       </span> </a> 
       <ul> <li><a onclick="signOut();"> Sign Out</a></li></ul>
     </li>
        <li><a href="#">Category</a>
          <ul >
            <li><a onclick="searchData('Women');">For Her</a></li>
            <li><a href="Shopping_M.php">For Him</a></li>
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
       <!-- <li><a class="fa fa-shopping-cart" onclick="showCart()"> Cart</a></li> -->
       <li><a class="fa fa-shopping-cart" onclick="showCart()"> Cart</a></li>
       
      </ul>
     <input type="hidden" id="hdnid">
    </div>

  <div id="dvMain" class="row" style="background-image: url("homebg4.jpg")>
    
    
?>
    
  </div>
  <div id="dvTEST" class="rr"></div> 

  <!-- <script src="Js/jquery.min.js"></script>
<script src="Js/popper.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
<script src="Js/all.min.js"></script>
  -->
  </body>


</html>