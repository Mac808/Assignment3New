<link rel="stylesheet" type="text/css" href="css.css">.
<?php
ini_set('error_reporting', 'E_ALL');
ini_set('display_errors', 'none');
session_start();
//if no username or session started redirect them to the login page
function quantity_count($cookie_type){
global $items_in_cart;
	if ($_SESSION[$cookie_type]){
		$items_in_cart+=1;
	}
}

if ($_SESSION['username']==NULL){
	echo '<meta HTTP-EQUIV="REFRESH" content="3; url=./Login.php">';
	echo "<p><h3>Error: You must be logged in to view products!</h3><br>
			You are now being redirect to log in.";
	}
else {
$Month = 2592000 + time();
$time = 'time';
$date = date("F jS Y - g:i a");
//this cookie will expire in 30 days
setcookie($time, $date, $Month);
?>



<html>
<head>
<title>All Pre-Workout Products</title>
</head>

<body>
<table align=center width="70%" height="226" border="1">
  <tr>
  <th height="105" valign="bottom" scope="col">
  <?php
if(isset($_COOKIE[$time]))
{
$last = $_COOKIE[$time];
echo "<table border=0 width=100%>
	<tr>
		<td align=left>";

echo'<a href="./allproducts.php"><img src="./house.gif" width=22 height=22 border=0> Home</a>';
echo "</td>
		<td>
			<h1><center><font face=arial>Pre-Workout</h1><br>
				<font face=arial size=1>Username: {$_SESSION['username']}<br>
				Last visited: ". $last .

		"</td>
		</tr>
		</table>";

$date = date("F jS Y - g:i a");
}
else
{
echo '<a href="./allproducts.php"><img src="./house.gif" width=22 height=22 border=0> Home</a> <center><h1><font face=arial>Peanutbutter Cookie Selection
				</h1><font face=arial size=1>';
}
  ?>

<br><?php echo "Page last visited: {$_SERVER['HTTP_REFERER']}";?>
<br><?php if (isset($_SESSION['username'])) {
echo "Login Status: Logged In";
}
quantity_count('choco_quantity');
quantity_count('peanut_quantity');
quantity_count('sponge_quantity');
quantity_count('sponge_box_quantity');
quantity_count('sponge_cake_quantity');
quantity_count('choco_big_quantity');
quantity_count('choco_filling_quantity');
quantity_count('peanut_cup_quantity');
quantity_count('peanut_candy_quantity');

global $items_in_cart;
echo '<br><a href="./shoppingcartfunction.php"><img src="./shoppingcart.gif" width=22 height=22 border=0> Shopping Cart </a>';
echo "Cart contetns: $items_in_cart item(s)</font>";







?>

    <div align="center">
	<p>To start shopping click on the pictures below!</p></div></th>
  </tr>
  <tr>
    <th height="113" scope="row"><table width="100%" height="100%" border="1" >
      <tr>
        <th scope="col"><font face=arial> C4 Pre-Workout - Pink Lemonade </font> <br>
            <a href="./prelemonade.php"><img src="./PL.jpg" border=0 alt="" width="150" height="150"></a></th>
        <th scope="col"><font face=arial> C4 Pre-Workout - Icy Blue Razz </font> <br>
          <a href="./prerazz.php"><img src="./IBR.jpg" border=0 alt="" width="150" height="150"></a></th>
        <th scope="col"><font face=arial> Pre-Workout - Fruit Punch </font><br>
          <a href="./prepunch.php"><img src="./FP.jpg" border=0 alt="" width="150" height="150"></a></th>
      </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<?php
}
?>