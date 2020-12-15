<?php
session_start();
include("function.php");


?>

<!DOCTYPE html>
<html>
<head>
	
	 <link rel="stylesheet" type="text/css" href="style1.css"/>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" text="text/style">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
	<script>
    
    <?php $List = implode(', ', $_SESSION['cart']);  ?>

var sessionItem=<?php echo json_encode ($List); ?>;
		var displayCart;
		var selectedId;
    var displayCartItem;
    var RemoveItem;
    var proceedToCheckout;
		$(document).ready(function () {

displayCartItem=function(){

if(sessionItem !=''){


var filterQuery="SELECT `Id` ,  `Image`, `Title`, `Price`, `Size`, `Ratings`, `DaysOfRent` FROM `product` WHERE Id IN ("+sessionItem +") ORDER by Id";


var request=$.ajax({
    url:'function.php',
    data:{'functionname' : 'DisplayCart', 'strQuery':filterQuery},
    type:'post',
    success: function(response)
    { 
      $('.row').empty();
      $('.row').append(response);
      $('#lblTotalAmt').text($('#hdnTotal').val());
    }
  });
    request.done(function(data){    
  });
  request.fail( function ( jqXHR, textStatus) { 
    console.log( 'error: ' + textStatus ); 
  });

 }
 else
 {
    $("#spnNoItem").css("display","block");
 }

}

RemoveItem=function(cart){
$.post("test3.php", {"functionname": "Remove","dt": cart},function(data){
location.reload();

});

}

proceedToCheckout =function(){
  var amt=$("#lblTotalAmt").text();
  

  $.post("test3.php", {"functionname": "setTotalAmount","dt": amt},function(data){
    alert(data);

$('#dvTEST').append(data);

  
  });

window.location.href="PlaceOrder.php";
  

}


});
</script>
</head>
<body onload="displayCartItem();">
<div class="navbar">
    <h3>EXPLORE HERE</h3>  
    <ul class="zindex" > 
        <li><a href="Shopping.php">Home</a></li>
      
      </ul>
     <input type="hidden" id="hdnid">
    </div>
	<div id="dvMain" class="row" style="margin :10px !important;background-image: url("homebg4.jpg")>
	 <span id="spnNoItem" style="display: none;"><h1>Cart is empty.</h1></span>
  </div>  
  <div style="clear: both;"></div>

<div id="dvPlaceOrder">
<h3> Total Amount : <label id=lblTotalAmt></label></h3>
<div style="text-align: center;"><button class="btn btn-warning" onclick="proceedToCheckout();"
  >Proceed For Checkout</button></div>
</div>
  </body>


</html>