<?php 
session_start();

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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
  	
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" text="text/style">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <script type="text/javascript">

<?php $amt=$_SESSION['totalAmt'];  ?>

		var amt="<?php echo $amt ?>";
  	

  </script>
  	<script>
      var showCart;
      var placeOrder;
     $(document).ready(function(){
      

      $('#lblTotalAmt').text(amt);
         showCart = function()
        {
        window.location.href = "cart2.php";
        return true;
        }

      

     });

    </script>
    

 </head>
 <body>

    <div class="navbar">
    <h3>EXPLORE HERE</h3>  
    <ul class="zindex" > 
        <li><a href="Shopping.php">Home</a></li>
        
       
       <li><a class="fa fa-shopping-cart" onclick="showCart()"> Cart</a></li>
      </ul>
  </div>
  <h1 style="text-align: center;"> Please fill below details</h1>
<div id="accordion">

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseOne">
        Payment option 
      </a>
    </div>
    <div id="collapseOne" class="collapse show" > <!-- data-parent="#accordion" -->
      <div class="card-body">
        
        <h5> Total Ammount : <label id="lblTotalAmt"  ></label></h5>
        <h5> Payment Option  : Currently Cash On Delivery option is available</h5>


      </div>
    </div>
  </div>
  <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Address
      </a>
      </div>
      <form action="address_detail.php" method="post">
      <div id="collapseTwo" class="collapse" > 
        <div class="card-body">
        <table>
        	<tr>
        		<td><label >Address Line 1</label></td>
        		<td> <input type="text" name="txtAddressLine1" style="width: 400px;" required="required" "></td>
        	</tr>
        	<tr>
        		<td><label > Address Line 2</label></td>
        		<td> <input type="text" name="txtAddressLine2" style="width: 400px;" required="required"></td>
        	</tr>
        	<tr>
        		<td><label > Country</label></td>
        		<td> <label > India</label></td>
        		<td><label > State</label></td>
        		<td> <input list="state" id="State" name="state" required="required">
                  <datalist id="state">
                    <option value="AndhraPradesh">
                    <option value="Maharashtra">
                    <option value="Goa">
                    <option value="Bihar">
                    
                  </datalist>



            </td>
        		
        	</tr>
    		<tr>
    			<td><label> City </label></td>
        		<td><input list="city" id="City" name="city" required="required">
                  <datalist id="city">
                    <option value="Mumbai">
                    <option value="Delhi">
                    <option value="Banglore">
                    <option value="Chennai">
                    
                  </datalist>




            </td>
        		<td><label> Pin Code </label></td>
        		<td><input type="text" name="txtPinCode" required="required"></td>
    		</tr>
        <tr>
          <td><label> Mobile No </label></td>
          <td>
            <input type="tel" name="txtMobile" pattern="^\d{10}$"
           required="required" title="Mobile No Should be Of 10 Digits">
          </td>
        </tr>

        <tr>
          <td></td>
          <td style="padding-top: 20px;">
            <button type="subimt" class="btn btn-warning"  >Place Order</button></td>
            <td></td>
        </tr>
        </table>
        
        </div>
      </div>
    </form>
    </div>
</div>

 </body>
 </html>
