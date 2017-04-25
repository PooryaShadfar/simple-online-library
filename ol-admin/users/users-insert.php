<?php  
require_once("../../config.php");
$sql = "INSERT INTO `ol-user` (`id`, `username`, `password`, `role`) VALUES('','".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["role"]."')";  
if(mysqli_query($connect, $sql))  
{   
   echo 'The data arrived successfully';  
}  
?> 
