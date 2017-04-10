 <?php  
require_once("db.php");
error_reporting(0);
 $output = ''; 
 $record_per_page = 10;  
 $page = '';   
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
if(isset($_POST["search"])){$search = $_POST["search"];}else{$search=NULL;}
if(isset($_POST["column_name"])){$column_name = $_POST["column_name"];}else{$column_name="id";}
if(isset($_POST["order"])){$order = $_POST["order"];}else{$order=NULL;}
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO tbl_images(name) VALUES ('$file')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM test1 WHERE bookname LIKE '%".$search."%' ORDER BY ".$column_name." ".$order." LIMIT $start_from, $record_per_page"; 
 $result = mysqli_query($connect, $query);  
 $output .= '
 <div class="table-responsive" id="users_table">  
 <table class="table table-bordered">  
      <tr>  
           <th width="10%"><a class="column_sort" id="id" data-order="'.$order.'" href="#">Row</a></th>  
           <th><a class="column_sort" id="bookname" data-order="'.$order.'" href="#">BookNames</a></th>  
           <th><a class="column_sort" id="bookdate" data-order="'.$order.'" href="#">BookDates</a></th>  
           <th  width="15%"><a class="column_sort" id="author" data-order="'.$order.'" href="#">Authors</a></th>  
		   <th  width="15%"><a class="column_sort" id="image" data-order="'.$order.'" href="#">Covers</a></th>  
           <th width="5%">Delete</th>  		   
      </tr>';   
 if(mysqli_num_rows($result) > 0)  
 {  
       $output .= '  
           <tr class="add-data">  
                <td></td>  
                <td id="ibookname" contenteditable ></td>  
                <td id="ibookdate" contenteditable></td>  
			    <td id="iauthor" contenteditable></td>  
			    <td id="iimage" contenteditable> <input type="file" name="images" id="images" /></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      '; 
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="bookname" data-id1="'.$row["id"].'" contenteditable>'.$row["bookname"].'</td>  
                     <td class="bookdate" data-id2="'.$row["id"].'" contenteditable>'.$row["bookdate"].'</td>  
					 <td class="author" data-id2="'.$row["id"].'" contenteditable>'.$row["author"].'</td>  
					 <td class="images" data-id2="'.$row["id"].'" contenteditable>'.$row["images"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
 }  
 else  
 { 
   $output .= '<tr><td colspan="4">We Dont Find Any Data in Your DB Please <a class="createlink" href="#" >Click On This Link</a></td></div>';  
 }    
$output .='</tr></table><div align="center">';
 $page_query = "SELECT * FROM test1 WHERE bookname LIKE '%".$search."%' ORDER BY ".$column_name." ".$order."";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link' id='".$i."'>".$i."</span>";  
 }  
 $output .= '</div><br/>';  
 echo $output;  
 ?>  