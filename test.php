<?php

echo $order_code=(uniqid(rand()));
echo "<br>".(int) $order_code."<br>";




include("includes/connect.php");
$query=mysql_query("INSERT INTO order(order_all, order_price, order_code, time, seen) VALUES('order_all', '221', '12', 'time', '0')");
if($query){
echo "successfully submited <br> order code : ".$order_code;
session_destroy();
}
else {
echo "error could not  submit";

}

$query=mysql_query("INSERT INTO admin_log (admin_username, admin_password, admin_email, admin_reset) VALUES('admin_username', 'admin_password', 'admin_email', '0')");
if($query){
echo "successfully submited <br> order code : ".$order_code;

}
else {
echo "error could not  submit";

}
?>