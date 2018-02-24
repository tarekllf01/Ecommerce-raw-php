<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["admin_log"]))
echo "<script>window.open('log.php','_self')</script>";






if(isset($_POST["submit"])){
if($_POST["prod_name"]=="" or $_POST["prod_brand"]=="" or $_POST["prod_main"]=="" or $_POST["prod_details"]=="" or $_POST["prod_cat"]=="" or $_POST["prod_price"]==""){
$price=(int)$_POST["prod_price"];
if($price<=0){
echo "<script>alert('ENTER price in integer!!!!!') </script>";
echo "<script>window.open('add_product.php','_self')</script>";
}
echo "<script>alert('Fill all field correctly!!!!!') </script>";
echo "<script>window.open('add_product.php','_self')</script>";

}
}
$prod_image=$_FILES["image"]["name"];
$size=$_FILES["image"]["size"];
$temp=$_FILES["image"]["tmp_name"];
$formate=explode(".",$prod_image);
$formate=$formate[1];
$formate=strtolower($formate);
if(($formate=="jpg" or $formate=="png" or $formate=="gif") && $size< 2000000 ){
$prod_name=mysql_real_escape_string($_POST["prod_name"]);
$prod_price=mysql_real_escape_string($_POST["prod_price"]);
$prod_main=mysql_real_escape_string($_POST["prod_main"]);
$prod_cat=mysql_real_escape_string($_POST["prod_cat"]);
$prod_brand=mysql_real_escape_string($_POST["prod_brand"]);
$prod_details=mysql_real_escape_string($_POST["prod_details"]);
$prod_image=$prod_name .".".$formate;
include("includes/connect.php"); 
                ////////////// checking allready exist or not ///////////////////////

$c=mysql_query("SELECT * FROM prod WHERE prod_name='$prod_name'");
$c=mysql_num_rows($c);
if($c){
echo "<script>alert('Already exist !!!!!') </script>";
echo "<script>window.open('add_product.php','_self')</script>";


}




$query=mysql_query("INSERT INTO prod(prod_name,prod_image,prod_price,prod_details,prod_brand,prod_main,prod_cat) VALUES('$prod_name','$prod_image','$prod_price','$prod_details','$prod_brand','$prod_main','$prod_cat') ");
if($query){
if(move_uploaded_file($temp,"../image/$prod_image")){
echo "<script>alert('SUCCESSFULLY ADDED PRODUCT ')</script>";
echo "<script>window.open('add_product.php','_self')</script>";

}

}









}
else 
echo "formate error";
?>