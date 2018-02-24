<?php 
session_start();
error_reporting(0);
if(!isset($_SESSION["admin_log"])){
echo "<script>window.open('log.php','_self')</script>";
exit();
}
                     /////making a product popular  /////////////
if(isset($_GET["pop"])){
include("includes/connect.php");
$prod_id=(int)mysql_real_escape_string($_GET["pop"]);
$query=mysql_query("UPDATE prod SET popular='1' WHERE prod_id='$prod_id' ");
//if($query)
//echo "<script>alert('SET AS POPULAR')</script>";

}
/////////////////////////making a product unpopular //////////////////////

if(isset($_GET["unpop"])){
include("includes/connect.php");
$prod_id=(int)mysql_real_escape_string($_GET["unpop"]);
$query=mysql_query("UPDATE prod SET popular='0' WHERE prod_id='$prod_id' ");
//if($query)
//echo "<script>alert('SET AS UNPOPULAR')</script>";

}

//////////////         finished popular procedure             //////////////////















if(isset($_GET["del"])){           // checking to start deleting 
$prod_id=(int)mysql_real_escape_string($_GET["del"]);
$next=(int)mysql_real_escape_string($_GET["next"]);
include("includes/connect.php");
$query1=mysql_query("SELECT prod_image FROM prod WHERE prod_id='$prod_id' ");
$row=mysql_fetch_array($query1);
$prod_image=$row["prod_image"];


$query=mysql_query("DELETE FROM prod WHERE prod_id='$prod_id' ");
if($query){

if(unlink("../image/$prod_image"))
echo "<script> alert('deleted') </script>";
}








}
/// finishing deleting procedure  


if(isset($_GET["next"]))         // getting page number for selecting product
$next=(int)$_GET["next"];
else                                // setting initially page = 1
$next=1;
$start=($next-1)*40;               // make a staring from variable for selecting dynamically
include("includes/connect.php");
$query=mysql_query("SELECT * FROM prod order by prod_id DESC LIMIT $start,40 ");
while($row=mysql_fetch_array($query)){
$prod_id=$row["prod_id"];
$prod_name=$row["prod_name"];
$prod_image=$row["prod_image"];
$prod_price=$row["prod_price"];
$prod_details=$row["prod_details"];
$prod_brand=$row["prod_brand"];
$prod_main=$row["prod_main"];
$prod_cat=$row["prod_cat"];
$popular=$row["popular"];
?>

<div id="product_container">                                        
<img src="../image/<?php echo $prod_image;?>" height="160px" width="150px"><br> 
<?php echo $prod_name;?>
<h4 color="red">  Price : <?php echo $prod_price." TK "; ?></h4>
<a href="delete.php?del=<?php echo $prod_id;?> && next=<?php echo $next;?> "> <img src="delete.png" width="30px" height="30px"> </a> 
<div id="fav">
<?php
if($popular==0){            //////////////SETING POPULAR BUTTON ///////////////////
?>
<a href="delete.php?pop=<?php echo $prod_id;?> && next=<?php echo $next;?> "> <img src="unpopular.jpg" width="40px" height="40px"> </a> 
<?php
}
else
{
?>

<a href="delete.php?unpop=<?php echo $prod_id;?> && next=<?php echo $next;?> "> <img src="popular.jpg" width="40px" height="40px"> </a> 
<?php
}
?>
</div>
</div>
<?php
}
?>