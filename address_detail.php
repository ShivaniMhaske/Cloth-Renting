<?php
	
session_start();


	$con=mysqli_connect('localhost','root');
	if($con)
	{
		echo('sucees address');
	}
	else
	{
		echo('Failed address');
	}
	mysqli_select_db($con,'clothes');

	$add_1=$_POST['txtAddressLine1'];
	$add_2=$_POST['txtAddressLine2'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$pincode=$_POST['txtPinCode'];
	$mobileNo=$_POST['txtMobile'];
	$UserId=$_SESSION['CustUserId'] ;
	


	$query="SELECT Order_num FROM cust_order ORDER BY Order_id DESC LIMIT 0, 1";

	$result=mysqli_query($con,$query);



while ($r = $result->fetch_assoc()) {
    $no= $r['Order_num']."<br>";
}

	
	if($no=='')
	{
		$OrderNo='CR1';
	}
	else{
		$no=substr($no, 2,2);
		$no=$no+1;
		$OrderNo='CR'.$no;	
	}	

		
		$put_add="INSERT INTO cust_order(Order_num,Add_1,Add_2,State,City,Pincode,MobileNo,UserId) 
		VALUES('$OrderNo','$add_1','$add_2','$state','$city','$pincode','$mobileNo',
		'$UserId')";


		mysqli_query($con,$put_add);


$orderId = mysqli_insert_id($con);



if ($con->query($put_add) === TRUE) {

foreach ($_SESSION['cart'] as $cart) {

$get_id="INSERT INTO order_detail(Order_id,Product_id) VALUES('$orderId','$cart')";
   mysqli_query($con,$get_id);

}


  
  echo "<script> alert('Order Placed');
window.location.href='ThankYou.php';
	</script>";
} 

else {
	echo('OOPS! Some Issue With System Please Try Again Later. ');
  echo "Error: " . $put_add . "<br>" . $con->error;
}



		





?>