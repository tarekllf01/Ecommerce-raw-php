<?php
session_start();
if(!isset($_SESSION["admin_log"]))
echo "<script>window.open('log.php','_self')</script>";






if(isset($_POST["submit"]))
include("includes/check.php");
?>
<html>
<head>
<title>ADD PRODUCT</title>
<link rel="stylesheet" href="../style.css" media="all">
</head>
<body>
<div><?php include("includes/header.php") ?></div>
<center>
<div id="cont">
ADD PRODUCTS TO SITE AND DATABASE !!

</div>
</center>
<div id="add_form">
<center>
<h2>Product Adding Form !! </h2>
<center>
<form action="add_product.php" method="post" enctype="multipart/form-data" ><br><br>
Product Name: <input type="text" name="prod_name"><br><br>
Product Brand : <select name="prod_brand" style="width:120px;">
<option value="the body shop" >The Body Shop</option>
<option value="tea tree" >Tea tree</option> 
<option value="sample1" >sample 1</option>
<option value="sample 2" >sample 2</option>
<option value="sample 3" >sample 3</option>

</select><br><br>
Main Category: <select name="prod_main" style="width:120px;">
<option value="skin" >skin</option>
<option value="here" > Here</option> 
<option value="men" >Men </option>
<option value="women" >Women</option>
<option value="perfume" >Perfume</option>
</select><br><br>

Sub Category:<select name="prod_cat" style="width:120px;">
<option value="face" > Face </option>
<option value="Leaps" > Leaps</option> 
<option value="Protection" > Protection </option>
<option value="eye" > Eye </option>
<option value="shaving">Shaving</option>
<option value="others" > Perfume </option>
</select><br><br>
Details: <input type="text" name="prod_details" > <br><br>
Price: <input name="prod_price" type="text" > <br><br>
Select A Product Image:<br>
<input name="image" type="file"> <br><br><br>
<input type="submit" name="submit" value="SUBMIT PRODUCT" >

</form>
</center>
</div>




</body>

</html>