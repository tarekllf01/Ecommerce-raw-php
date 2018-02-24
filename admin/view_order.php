<?php
session_start();
if(!isset($_SESSION["admin_log"]))
echo "<script>window.open('log.php','_self')</script>";











if(isset($_GET["c"])){
$id=mysql_real_escape_string($_GET["c"]);
include("includes/connect.php");
$query=mysql_query("UPDATE order1 SET seen='1' WHERE order_id='$id'");
if($query){
echo "<script>alert('confirmed!')</script>";
echo "<script>window.open('view_order.php?id=$id','_self')</script>";
}
}


if(isset($_GET["m"])){
$id=mysql_real_escape_string($_GET["m"]);
include("includes/connect.php");
$query=mysql_query("UPDATE order1 SET seen='2' WHERE order_id='$id'");
if($query){
echo "<script>alert('moved!')</script>";
echo "<script>window.open('view_order.php?id=$id','_self')</script>";
}
}
?>



<html>
<head><title> Admin panel | View order </title>
 </head>
<link rel="stylesheet" href="../style.css" media="all">
<body>
<div> <?php include("includes/header.php");?></div>

<?php
if(!isset($_GET["id"]))
exit();
$order_id=mysql_real_escape_string($_GET["id"]);
include("includes/connect.php");
$query=mysql_query("SELECT * FROM order1 WHERE order_id='$order_id' ");
$row=mysql_fetch_array($query);
$seen=$row["seen"];
?>
<center>
<div id="cont">
<div id="v_code">
<?php echo "Order Code : ".$row["order_code"];?>
</div>
<div id="v_code">
<?php echo "Total Price : ".$row["order_price"];?>
</div>
<div id="v_code">
<?php
if($seen==0){
?>
<a href="view_order.php?m=<?php echo $order_id;?>">Move to Data</a>
<?php
}
else if($seen==2){
?>
<a href="view_order.php?c=<?php echo $order_id;?>">Confirm !!</a>
<?php
}
else
echo "Moved On Data";
?>
</div>
</div>
</center>
<div id="view_order">

<center> 
<?php echo $row["order_all"];?>


</center>

</div>


</body>

</html>