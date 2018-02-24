<?php 
class clean{
function clean_string($value){
 ///// skips 
$skips;
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
$value=preg_replace($skips,"",$value);
/// ends of skipping
return $value;
}
}
$value=">< mysql UNION  vksv ksk kjcvs&& ' ";
$new=new clean;
$last_name=$_GET["test"];
echo $value=$new->clean_string($value);
echo $last_name=$new->clean_string($last_name);


exit();










session_start();
echo session_id();
echo $_SESSION["pass"];
echo $_SESSION["password"];
echo $_SESSION["id"];
echo $_SESSION["user_name"];
echo $_SESSION["user"];
echo $_SESSION["pass"];
echo $_SESSION["password"];
echo $_SESSION["id"];
echo $_SESSION["user_name"];
echo $_SESSION["user"];
$var="df a52&*!!*@%&%^!'<? &&UNION mysql_query '?>'or*<><script>alert('hello') </script> ";
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
echo $var=preg_replace($skips,"",$var);
/// ends of skipping 
?>