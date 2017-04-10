<?php  
require_once("db.php");
 $sql = "DELETE FROM test1 WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'This Field Deleted.';  
 }  
 ?> 