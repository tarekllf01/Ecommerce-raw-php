<?php
if(isset($_GET["seen"])){
$seen=mysql_real_escape_string($_GET["seen"]);
$seen=(int)($seen);
}
else
$seen=0;
include("../includes/connect.php");
if(isset($_POST["submit"])){                       // IF SEARCH BUTTON IS CLICKED !! SET THE QUERY ///////////////////////////

$code=mysql_real_escape_string($_POST["code"]);
$code=(int)$code;
$query=mysql_query("SELECT order_id,order_price,order_code,time,ordered FROM order1  WHERE seen='$seen' AND order_code='$code' ");


} ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else 
$query=mysql_query("SELECT order_id,order_price,order_code,time,ordered FROM order1  WHERE seen='$seen' ");


if(!mysql_num_rows($query)){
echo "NO RESULT FOUND";

}
while($row=mysql_fetch_array($query)){
?>
<a href="view_order.php?id=<?php echo $row["order_id"];?>">
<div id="ad_order">
<?php
echo  " Order_code : ".$row["order_code"]." <br> Total : ".$row["order_price"]." TK <br> Order Date : ".$row["ordered"]." <br> Delivery : " .$row["time"] ;


?>
</div>
</a>
<?php


}





?>