<?php
error_reporting(0);
session_start();
if(isset($_GET["re"])){
$_SESSION["count"]=NULL;
session_destroy();
}



?>
<html>

<head> <title> Order Product for home delivery </title>

<link rel="stylesheet" href="style.css" media="all">

</head>
<body>
<div> <?php include("includes/header.php");?></div>
<h3 class="hot"> YOU CAN SELECT ONLY 10 AT A TIME  </h3>

<?php


if(isset($_GET["p"]) && isset($_POST["s"]) ){

$prod_id=(int)mysql_real_escape_string($_GET["p"]);
$prod_id=htmlentities($prod_id);
$prod_qty=(int)$_POST["qty"];
if($prod_qty <0 or $prod_id <0 ){

mysql_close("localhost","root","");
echo "<script>window.open('index.php','_self')</script>";
exit();
}

include("includes/connect.php");

if(isset($_SESSION["count"])){
if($_SESSION["count"] > 9 ){
echo "<script>alert('you already selected 10 \n clear first then try again')</script>";
echo "<script>window.open('order.php','_self')</script>";
exit();

}
else{
$_SESSION["count"]++;


}



}
else{
$_SESSION["prod"]=array(1=>array('prod_id','prod_name','prod_price','prod_brand','prod_qty'),
	2=>array('prod_id','prod_name','prod_price','prod_brand','prod_qty'),
	3=>array('prod_id','prod_name','prod_price','prod_brand','prod_qty'),
	4=>array('prod_id','prod_name','prod_price','prod_brand','prod_qty'),
	5=>array('prod_id','prod_name','prod_price','prod_brand','prod_qty'),
	6=>array('prod_id','prod_name','prod_price','prod_brand','prod_qty'),
	7=>array('prod_id','prod_name','prod_price','prod_brand','prod_qty'),
	8=>array('prod_id','prod_name','prod_price','prod_brand','prod_qty'),
	9=>array('prod_id','prod_name','prod_price','prod_brand','prod_qty'),
	10=>array('prod_id','prod_name','prod_price','prod_brand','prod_qty'),);



$_SESSION["count"]=1;

}
$_SESSION["total"]=0;
$count=$_SESSION["count"];
$query=mysql_query(" SELECT * FROM prod WHERE prod_id='$prod_id' ");
$row=mysql_fetch_array($query) ;
$_SESSION["prod"][$count]["prod_price"]=$row["prod_price"];
$_SESSION["prod"][$count]["prod_image"]=$row["prod_image"];
$_SESSION["prod"][$count]["prod_name"]=$row["prod_name"];
$_SESSION["prod"][$count]["prod_brand"]=$row["prod_brand"];
$_SESSION["prod"][$count]["prod_id"]=$prod_id ;

$prod_qty=mysql_real_escape_string($prod_qty);
$prod_qty=htmlentities($prod_qty);
$_SESSION["prod"][$count]["prod_qty"]=$prod_qty;
echo "<script>window.open('order.php','_self')</script>";
}
if(!isset($_SESSION["count"])){
?><center>
<h3 class="hot">
<?php
echo "YOU DIDN'T ADDED ANY PRODUCT TO LIST ";
?>
</h3></center>
<?php
exit();
}
?>
<h4 class="hot">
<?php
echo "You added : ". $_SESSION["count"] ."   Remaining : ". (10 - $_SESSION["count"])."  more  <br>";
?></h4>
<?php
echo "YOUR SHOPPING CHART HAS BEEN UPDATED CONTINUE  SHOPPING AND FINALLY FILL THE ORDER FORM <br><br><br>";
?>
<div>
<?php
$_SESSION["total"]=0;
for($i=1;$i<=$_SESSION["count"] ;$i++){
$_SESSION["total"]=$_SESSION["total"]+($_SESSION["prod"][$i]["prod_price"] * $_SESSION["prod"][$i]["prod_qty"]);
?>
<div class="chart">

<img src="image/<?php echo $_SESSION["prod"][$i]["prod_image"];?>" height="200px" ><br>
 Name : <?php echo $_SESSION["prod"][$i]["prod_name"];?> <br>
Brand : <?php echo $_SESSION["prod"][$i]["prod_brand"]; ?> <br>
Price : <?php echo $_SESSION["prod"][$i]["prod_price"]." * ".$_SESSION["prod"][$i]["prod_qty"]." = ".$_SESSION["prod"][$i]["prod_price"] * $_SESSION["prod"][$i]["prod_qty"];?> 
</div>
<?php
}
?>
</div>
<br><br>
<center><h3 class="hot">  Total Price : <?php echo $_SESSION["total"];?> </h3></center>
<br><br><br>  
<a href="order.php?re=1">CLEAR</a>
<center>     
<div id="form">
<form method="post" action="submission.php">
Your Name : <br><input type="text" name="person_name" size="40px"> <br>
Email : <br><input type="text" name="person_email" size="40px"><br>
Phone : <br><input type="text" name="person_phone" size="40px"><br>
Address : <br><input type="text" name="person_add" size="40px"><br>
Your Preferable time<br>
 Time :<input type="time" name="time" >
Date :<input type="date" name="date" size="40px" > 

<br><br><br>
<input type="submit" name="submit" value="Submit Order">
</form>
</div>
</center>

<br>
<br>
</body>

</html>