<?php  
require_once("../../config.php");
 $sql = "DELETE FROM bookdetails WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'اين فيلد با موفقيت حذف شد';  
 }  
 ?> 