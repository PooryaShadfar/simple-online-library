 <?php  
 //$file = addslashes($_POST["image_name"]);  
 $file = $_POST["image"];
 $file = str_replace( "\\", '/', $file );
 $files =  basename( $file );
 $sql = "INSERT INTO test1(bookname, bookauthor, bookpages , images) VALUES('".$_POST["bookname"]."', '".$_POST["bookauthor"]."', '".$_POST["bookpages"]."', '".$files."')";  
 if(mysqli_query($connect, $sql))  
 {   
      echo 'datas created!';  
 }  
 ?> 
