<?php


if(isset($_POST['functionname']) && !empty($_POST['functionname'])) {
    $functionname = $_POST['functionname'];
    $strQuery=$_POST['strQuery'];

    switch($functionname) {
        case 'DisplayData' : DisplayData ($strQuery);break;
        case 'DisplayCart':DisplayCart ($strQuery);break;
    }
}




function DisplayData($strQuery){

		$con = mysqli_connect('localhost','root');
  	mysqli_select_db($con,'clothes');
  
    $query=$strQuery;
    $queryfire = mysqli_query($con, $query);
    $num = mysqli_num_rows($queryfire);
    
    if($num > 0)
      while($prod = mysqli_fetch_array($queryfire))
      {
        ?>
        
        <div class="col-lg-3 col-md-3 col-sm-12">

        <form>
          <div class="card">
            <h6 class="card_title">
             <?php echo $prod['Title']; ?> </h6>
            
            <div class="card-body"> 
              <img  src="<?php echo
             $prod['Image'] ?>" alt ="tops" class="img-fluid" >
            <input type="hidden" name="hdnID" value="<?php echo
             $prod['Id'] ?>">
             <h6> &#8377; <?php echo $prod['Price']; ?> 
             (Size : <?php echo $prod['Size'];  ?>)</h6>

            <?php 
          $rate= $prod['Ratings']; 

          for($x=1;$x<=$rate;$x++)
            {
               ?>
              <h6 class="fa fa-star fa-2"></h6>
            <?php
            }          
            ?>           
</div>

   <h6 class="text-right"><kbd>(Days Of Rent : <?php echo $prod['DaysOfRent']; ?>)</kbd></h6> 

            <div class="btn-grp" >
            <button class="btn btn-info" onclick="return popMsg(<?php echo $prod['Id']; ?>)" id="mybtn">ADD TO CART</button>
            </button>
            <!-- <button class="btn btn-warning">Buy Now</button> -->
             </div>


              <div class="modal fade" id="mymodal">

              
                
              </div>


              
            
            
          </div>
        </form>
        
      </div>



      
<?php
  }
}
?>

<?php

function DisplayCart($strQuery){


    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con,'clothes');
  

    $query=$strQuery;
 
$Total=0;
    $queryfire = mysqli_query($con, $query);

    $num = mysqli_num_rows($queryfire);
    
    if($num > 0)
      while($prod = mysqli_fetch_array($queryfire))
      {
        ?>
        
            <!-- START -->

              <div class="col-lg-3 col-md-3 col-sm-12" id="dvCart_<?php echo $prod['Id']; ?>" ><!-- MAINDIV -->
                  <div> <!-- header div -->
                       <h3 ><?php echo $prod['Title']; ?> </h3>
                  </div> 
                  <div> <!-- body div -->
                      <div> <!-- image div -->
                         <img style="height: 500px;" src="<?php echo
                          $prod['Image']; ?>" alt ="tops" class="img-fluid" >
                      </div>
                      <div style="padding-left: 25px;;"><!-- content div -->
                          <h2> &#8377; <?php echo $prod['Price']; ?></h2> 

                          <h2>Size : <?php echo $prod['Size'];  ?></h2>
                          <?php 

                          $rate= $prod['Ratings']; 
                          for($x=1;$x<=$rate;$x++)
                            {
                               ?>
                              <h6 class="fa fa-star fa-2"></h6>
                            <?php
                            }          
                            ?>
                            <h2>Days Of Rent : <?php echo $prod['DaysOfRent']; ?></h2> 
               
                            <button  id="btnRemove" class="btn btn-warning" onclick="RemoveItem(<?php echo $prod['Id']; ?>)" >Remove</button>    

                            <?php

$Total=$Total+ $prod['Price'];
                            ?>
                            
                      </div> 
                  </div>
              </div>

            
<div style="clear:both;"></div>



</div> 

      
      <?php 
   }
   ?>
<input type="hidden" id="hdnTotal" value="<?php echo $Total; ?>"> 
<?php 
      }
    
