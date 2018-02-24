<?php
error_reporting(0);
session_start();
?>
<div id="nav">
<ul>
<li><a href="index.php">Home</a></li>
<li ><a href="index.php?seen=2">Confirm move</a></li>
<li ><a href="index.php?seen=1">Account Data</a></li>
<li><a href="add_product.php">ADD Product</a></li>
<li><a href="delete.php">Remove product</a></li>

</ul>

</div>
<?php
if(isset($_SESSION["admin_log"])){
?>
<div id="out">
<a href="log.php?out=<?php echo $_SESSION["admin_id"];?>">Log Out</a>
</div>
<?php
}
?>

<div id="header">
<h3>Hotline : 01684093813</h3>
<center>
<h2>
<u>U</u>K<u>B</u>D<u>C</u>OSMETICS

</h2>
</center>
</div>
<div id="logo"><img src="../image/logo1.PNG" height="170px"></div>

