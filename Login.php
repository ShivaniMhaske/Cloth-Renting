
<!DOCTYPE html>
<html>
<head>
	<title>Login And Register</title>
	<!----Bootsrap CSS----->
  <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">

  <!--------Customized CSS---------->
  <link rel="stylesheet" type="text/css" href="loginStyle.css">

  <!---------Font-Awesome CSS------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" text="text/style">

</head>
<body>

	<div class="hero">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Login
				</button>
				<button type="button" class="toggle-btn" onclick="register()">Register</button>
			</div>
			
			<form id="login" class="input-group" action="Validation.php" method="post">

				<input id="id_user" type="text" class="input-field" placeholder="User ID" name="users">
				

				<input  id="id_pass" type="password" class="input-field" placeholder="Your Password" name="password" autocomplete="on">
				<span id="error" class="msg-box" style="color: rgb(255,0,0);"></span>

				<button type="submit"  onclick="return ValidateLogin();" class="submit-btn">Login</button>
				
			</form>
<!--   -->
			<form  id="register"class="input-group" action="Registration.php" method="post">

				<input id="id_userReg" type="text" class="input-field" placeholder="User ID" name="users"><span id="error" class="msg-box"></span> 

				<input id="id_emailReg" type="email" class="input-field" placeholder="Email ID" name="email"><span id="error" class="msg-box"></span>

				<input id="id_passReg" type="password" class="input-field" placeholder="Your Password" name="password" autocomplete="on">

				<span id="errorReg" class="msg-box" style="color: rgb(255,0,0);"></span>

				<button type="submit" onclick="return validateRegistration();"  class="submit-btn" >Register</button>
			
			</form>
		</div>
	</div>


<script>
	var x = document.getElementById("login");
	var y = document.getElementById("register");
	var z = document.getElementById("btn");  

	function register(){
		x.style.left = "-400px";
		y.style.left = "50px";
		z.style.left = "110px";
	}

	function login(){
		x.style.left = "50px";
		y.style.left = "450px";
		z.style.left = "0px";
	}

function validateRegistration()
{
	var user_value = document.getElementById('id_userReg').value;
	var pass_value = document.getElementById('id_passReg').value;
	var email_value = document.getElementById('id_emailReg').value;



	if(validate(user_value,pass_value,email_value,'Registration'))
	{
		
		return true;
	}
	else
	{
		return false;
	}

}

function ValidateLogin(){

	var user_value = document.getElementById('id_user').value;
	var pass_value = document.getElementById('id_pass').value;
	
	if(validate(user_value,pass_value,'','Login'))
	{
		return true;
	}
	else
	{
		return false;
	}

}


	function validate(user_value,pass_value,email_value,validateFor){
		

	var user_chk = /^[A-Za-z. ]{3,20}$/ ;
	var pass_chk = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
	var email_chk = /^[A-Za-z]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/ ;
	var errCtrl=(validateFor=='Registration'? 'errorReg' :'error');
 
if(user_value=="")
{		
		document.getElementById(""+errCtrl+"").innerHTML = "Please enter Username";
		return false;
}

if(validateFor=='Registration'){
	if(email_value==""  )
	{
	document.getElementById(""+errCtrl+"").innerHTML = "Please enter Email address";
	return false; 
	}
	else
	{
		if (!email_chk.test(email_value))
		{
			document.getElementById(""+errCtrl+"").innerHTML = "Email is invalid";
			return false;
		}		
	}
}
if(pass_value=="")
{			
		document.getElementById(""+errCtrl+"").innerHTML = "Please enter Password";
		return false;
}
else
{
	if (!pass_chk.test(pass_value))
	{
		document.getElementById(""+errCtrl+"").innerHTML = "Password is invalid";
		return false;
	}
	
}
	return true;
	
	}
    	

</script>

<script src="Js/jquery.min.js"></script>
<script src="Js/popper.min.js"></script>
<script src="Js/bootstrap.min.js"></script>
<script src="Js/all.min.js"></script>


</body>
</html>