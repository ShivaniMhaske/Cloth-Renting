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
echo($name);
$query ="select * from login_detail where Username = '$name' && Password = '$pass'";

$result = mysqli_query($con,$query);

$num = mysqli_num_rows($result);

while ($r = $result->fetch_assoc()) {
    $UserId= $r['Id']."<br>";
}

	if($num == 1)
		{ 

			$_SESSION['CustName'] = $name;
			$_SESSION['CustUserId'] = $UserId;
			


			echo "<script> alert('Logged in successfully');
window.location.href='Shopping.php';
	</script>";

		}
else
{
	echo "<script> alert('Invalid Username or Passowrd');
				</script>";
	header('location:Login.php');
}




?>