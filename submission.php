<link rel="stylesheet" href="style.css" media="all">
<?php
session_start();
?>
<div><?php include("includes/header.php");?></div>


<?php

function filter($string){
$string=str_ireplace("'"," ",$string);
$string=str_ireplace("<"," ",$string);
$string=str_ireplace(">"," ",$string);
$string=str_ireplace("<script>"," ",$string);
$string=str_ireplace("</script>"," ",$string);
return $string;
}




if(!isset($_POST["submit"])){
//die("You did not order any product");
exit();
}
if($_POST["person_phone"]=="" or $_POST["person_name"]=="" or $_POST["person_add"]=="" or $_POST["time"]=="" or $_POST["date"]=="" or (!filter_var($_POST['person_email'],FILTER_VALIDATE_EMAIL))  )
die("Please input all field correctly <br>");


$person_phone=mysql_real_escape_string($_POST["person_phone"]);
$person_phone=htmlentities($person_phone);
$person_phone=filter($person_phone);
$person_name=mysql_real_escape_string($_POST['person_name']);
$person_name=htmlentities($person_name);
$person_name=filter($person_name);
$person_add=mysql_real_escape_string($_POST["person_add"]);
$person_add=htmlentities($person_add);

$person_email=mysql_real_escape_string($_POST["person_email"]);
$person_email=htmlentities($person_email);
$person_email=filter($person_email);
$time=mysql_real_escape_string($_POST["time"]);
$time=$time."  ". mysql_real_escape_string($_POST["date"]);
$time=htmlentities($time);

$order_all="";
$order_price=0;

for($i=1;$i<=$_SESSION["count"] ;$i++){
$order_price=$order_price + ($_SESSION["prod"][$i]["prod_price"] * $_SESSION["prod"][$i]["prod_qty"]);
$order_all=$order_all." name : ".$_SESSION["prod"][$i]["prod_name"]." id : ".$_SESSION["prod"][$i]["prod_id"]." brand : ". $_SESSION["prod"][$i]["prod_brand"] ." qty : ".$_SESSION["prod"][$i]["prod_qty"] ." Price : ".$_SESSION["prod"][$i]["prod_price"] ." Total=".$_SESSION["prod"][$i]["prod_price"] * $_SESSION["prod"][$i]["prod_qty"]."<br>" ;

}
$order_all=$order_all."<br> <br> Total Price of this selected order is  ".$order_price ." TK <br> Name : ".$person_name." Email : ".$person_email."<br> Phone : ".$person_phone."<br> Address : <br>".$person_add.",br>Delivery Time : ".$time;
$order_code=(int)uniqid(rand());
date_default_timezone_set("Asia/Dhaka");  // set default time zone for Dhaka 
$ordered=date("d-m-y / h:i ");  // date function 
include("includes/connect.php");
$query=mysql_query("INSERT INTO order1(order_all,order_price,order_code,time,ordered,seen) VALUES('$order_all','$order_price','$order_code','$time','$ordered','0')");
if($query){
echo "successfully submited <br> order code : ".$order_code;
session_destroy();
}
else {
echo "error could not  submit";

}







?>