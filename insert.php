 <?php  
require_once("db.php");
$file = addslashes(file_get_contents($_FILES["images"]["tmp_name"]));
var_dump($file);
 $sql = "INSERT INTO test1(bookname, bookdate, author , images) VALUES('".$_POST["bookname"]."', '".$_POST["bookdate"]."', '".$_POST["author"]."', '".$file."')";  
 if(mysqli_query($connect, $sql))  
 {   
      echo 'datas inputs';  
 }  
 ?> 