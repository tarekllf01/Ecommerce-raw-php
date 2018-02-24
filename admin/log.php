<?php
error_reporting(0);
session_start();

// log out system 


if(isset($_GET["out"])){

$_SESSION["username"]=NULL;
$_SESSION["password"]=NULL;
$_SESSION["admin_log"]=NULL;
$_SESSION["admin_id"]=NULL;
session_destroy();



}

// log in system 



if(isset($_POST["submit"])){
$name=mysql_real_escape_string($_POST["name"]);

///// skips 
$skips=array();
$skips[0]="/'/";
$skips[1]='/>/';
$skips[2]='/</';
$skips[3]='/or/';
$skips[4]='/@/';
$skips[5]='/&/';
$skips[6]='/!/';
$skips[7]='/query/';
$skips[8]='/mysql/';
$skips[9]='/UNION/';
$name=preg_replace($skips,"",$name);
/// ends of skipping






//$name=check($name);
$password=mysql_real_escape_string($_POST["password"]);
//$password=check($password);

///// skips 
$skips=array();
$skips[0]="/'/";
$skips[1]='/>/';
$skips[2]='/</';
$skips[3]='/or/';
$skips[4]='/@/';
$skips[5]='/&/';
$skips[6]='/!/';
$skips[7]='/query/';
$skips[8]='/mysql/';
$skips[9]='/UNION/';
$password=preg_replace($skips,"",$password);
/// ends of skipping



$warn=0;
if((int)$_POST["sum"]!=$_SESSION["sum"]){
echo "<script> alert('submit sum correctly ') </script>";
$warn=1;
}
include("includes/connect.php");
$query=mysql_query("SELECT * FROM admin WHERE name='$name' AND  password='$password' ");
if($row=mysql_num_rows($query) && $warn==0){
$row=mysql_fetch_array($query);
$_SESSION["username"]=$name;
$_SESSION["password"]=$password;
$_SESSION["admin_log"]=1;
$_SESSION["admin_id"]=$row["admin_id"];

echo "<script> window.open('index.php','_self')</script>";


}
else
{
echo "<script> alert('wrong username or  password ') </script>";
while(1==1){
echo "WARNING!";
echo "<script> window.open('index.php')</script>";

}
}

}
else{



if(isset($_SESSION["admin_log"]))
echo "<script> window.open('index.php','_self')</script>";
?>


<link rel="stylesheet" href="../style.css" media="all">


<div id="admin_log">
<h3> Admin log in form !! </h3>
<form action="log.php" method="post" >
User name: <br><input name="name" type="text" size="30px"><br><br>
Password: <br> <input name="password" type="password" size="30px"><br><br>
Enter the sum <br><br>
<?php 
$var1=(int) uniqid(rand());
$var1=(int) ($var1/(1000000*date("sa")));
$var2=(int) uniqid(rand());
$var2=(int) ($var2/(100000*date("i")));
echo $var1 ." + ".$var2." = ";
$_SESSION["sum"]=$var1 + $var2;

?>
<input type="int" name="sum" size="10px"><br><br>
<input type="submit" name="submit" value="Log in">
</form>
</div>
<?php
}
?>
