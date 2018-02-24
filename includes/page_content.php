
<div id="main_content">
<?php

if(isset($_GET["main"])){         // using brand name showing results posts
$main=mysql_real_escape_string($_GET["main"]);
?>
<div id="branded_product">
<?php

include("includes/connect.php");
if(isset($_GET["next"])){
$next=mysql_real_escape_string($_GET["next"]);
$low=$next;
}
else{
$low=0;
}
$high=20;

$query=mysql_query("SELECT * FROM prod WHERE prod_main='$main' order by 1 DESC LIMIT $low,$high ");
$num=mysql_num_rows($query);
if($num){
?>
<div id="head_new_in">
<center> Product showing on <?php echo $main;?>  </center>
</div>

<?php

}
else
echo "No product is added for ".$main . " .Products  Will be added soon !";

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
?>




















</div>