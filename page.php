<?php
if(!isset($_GET["main"]))
die("sorry the page you requested is not found" );
else{
$main=mysql_real_escape_string($_GET["main"]);
$main=htmlentities($main);
$main=str_ireplace("'","",$main);

}
?>
<html>
<head><title>UK production in BD </title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" media="all">
</head>



<body>
<div><?php include("includes/header.php");?></div>
<div><?php include("includes/brand.php");?></div>
<div><?php include("includes/page_content.php");?></div>


<div><?php include("includes/footer.php ");?></div>
</body>

</html>

<?php



?>