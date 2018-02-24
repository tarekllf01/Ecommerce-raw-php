<?php
$sql=mysql_connect("localhost","root","");
if(!$sql){
	die("could not connected");

	}
$db=mysql_select_db("esite",$sql);
if(!$db){
		die("could not select ");
	}
?>

<?php
$var="*#%12345";
echo md5($var);




?>