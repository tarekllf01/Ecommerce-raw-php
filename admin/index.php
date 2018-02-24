<?php
session_start();
if(!isset($_SESSION["admin_log"])){
echo "<script>window.open('log.php','_self')</script>";
die();
}

if(isset($_GET["seen"])){
$seen=mysql_real_escape_string($_GET['seen']);
$seen=htmlentities($seen);
if($seen==1)
$meta="Account Data";
else
$meta="Confirm";
}
else
$meta=" | Home|New order";
?>

<html>
<head><title> Admin panel | <?php echo $meta;?>  </title>
 </head>
<link rel="stylesheet" href="../style.css" media="all">
<body>
<div> <?php include("includes/header.php");?></div>
<div> <?php include("includes/content.php");?></div>
<?php 
if($seen > 0 ){                 //////////////////////////////////////////////////////////////////
?>
<div id="search">
<form action="index.php?seen=<?php echo $seen;?>" method="post" >
<input type="int" name="code">
<input type="submit" name="submit" value="SEARCH">
</form>
</div>
<?php
}
else
{
?>
<div id="search">
<form action="index.php" method="post" >
<input type="int" name="code">
<input type="submit" name="submit" value="SEARCH">
</form>
</div>
<?php
}   //////////////////////////////////////////////////////////
?>

















</body>

</html>