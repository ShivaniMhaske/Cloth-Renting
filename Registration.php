<?php

session_start();


$con = mysqli_connect('localhost','root');
if($con)
{
	echo ("Success");
}
else{
	echo("noo");
}
mysqli_select_db($con,'clothes');

$name = $_POST['users'];
$pass = $_POST['password'];
$email = $_POST['email'];
$query ="select * from login_detail where Username = '$name' && Password = '$pass'";

$result = mysqli_query($con,$query);

$num = mysqli_num_rows($result);


	if($num == 1)
		{ 

			echo("Sorry, This Username is Already Registered");
		}
else
{
	$put_detail ="insert into login_detail(Username,Email,Password) values('$name','$email','$pass')";
	mysqli_query($con,$put_detail);
	
	echo "<script> alert('User created successfully');
window.location.href='Login.php';
	</script>";
	
}




?>
