<?php
session_start();	

if( !isset($_SESSION['cart'])){
   	$_SESSION['cart']= array();
   }
if(isset($_POST['functionname']) && !empty($_POST['functionname'])) {
    $functionname = $_POST['functionname'];
    $str=$_POST['dt'];

 switch($functionname) {
        case 'Add' : 
array_push($_SESSION['cart'], $str);

       /* DT ($str);*/
        break;
       case 'Remove':
       /*echo('Removed');*/


if(!empty($_SESSION['cart'])){
	foreach ($_SESSION['cart'] as $cart => $val) {
		if(	$val==$str)
		{
			unset($_SESSION['cart'][$cart]);
		}
	}
}



       break;
       case 'setTotalAmount':
        $_SESSION['totalAmt']=$str;
        echo($_SESSION['totalAmt']);
        break;

        case 'signOut':
        unset($_SESSION['CustName']);
    }

    }
/*   This Function is used only for tessting session variable  */
    function DT($str)
    {

    	
    	?>


    	<form>
<?php $List = implode(', ', $_SESSION['cart']); ?>
<h1><?php echo $List ?><h1>
<?php

foreach ($_SESSION['cart'] as $cart) {
	?>
    			<h1><?php echo($cart); ?><h1>;

    				<?php
    	}
    	?>
    	</form>
    <?php
    }
?>

