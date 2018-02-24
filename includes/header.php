<?php
session_start();
?>
<div id="nav">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="page.php?main=skin">Skin</a></li>
<li><a href="page.php?main=hair">Hair</a></li>
<li><a href="page.php?main=women">Women</a></li>
<li><a href="page.php?main=men">Men</a></li>
<li><a href="page.php?main=perfume">Perfume</a></li>
<li><a href="page.php?main=makeup">Make up</a></li>

</ul>
<a href="order.php"><div id="total">
Check List
<?php
if(isset($_SESSION["total"])){
echo $_SESSION["total"]."  TK ";
}
else
echo " 0 TK ";
?>
</div>

</a>

</div>

<div id="header">
<h3>Hotline : 01684093813</h3>
<center>
<h2>
<u>U</u>K<u>B</u>D<u>C</u>OSMETICS

</h2>
</center>
</div>
<div id="logo"><img src="image/logo1.PNG" height="170px"></div>

