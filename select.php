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
 
 //$msg = "";
 //if(isset($_POST['btn_add'])) {
 //$target = "upload/".basename($_FILES['image']['name']);
 //$image = $FILES['image']['name'];
 //$sql = "INSERT INTO test1 (images) VALUES ('$image')";
 //mysqli_query($connect, $sql); 
 //if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
 //$msg = "1";
 //}else{
 //$msg = "2";
 //}
 //}
 //echo $msg;
 
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
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM test1 WHERE bookname LIKE '%".$search."%' ORDER BY ".$column_name." ".$order." LIMIT $start_from, $record_per_page"; 
 $result = mysqli_query($connect, $query);  
 $output .= '<form id="upload_form" enctype="multipart/form-data" method="post">
 <div class="table-responsive" id="users_table">  
 <table class="table table-bordered">  
      <tr>  
           <th width="2%"><a class="column_sort" id="id" data-order="'.$order.'" href="#">Row</a></th>  
           <th width="15%"><a class="column_sort" id="bookname" data-order="'.$order.'" href="#">bookname</a></th>  
           <th width="15%"><a class="column_sort" id="bookauthor" data-order="'.$order.'" href="#">bookauthor</a></th>  
           <th  width="2%"><a class="column_sort" id="bookpages" data-order="'.$order.'" href="#">bookpages</a></th>  
		   <th  width="15%"><a class="column_sort" id="images" href="#">bookimage</a></th>  
           <th width="2%">Delete</th>  		   
      </tr>';   
 if(mysqli_num_rows($result) > 0)  
 {  
       $output .= '
           <tr class="add-data">  
                <td></td>  
                <td id="ibookname" contenteditable ></td>  
                <td id="ibookauthor" contenteditable></td>  
			    <td id="ibookpages" contenteditable></td>  
			    <td id="iimage">   
                <input type="file" name="image" id="file" />  
                </td>
                <td><button onclick="uploadFile();" type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>
		   
      '; 
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="bookname" data-id1="'.$row["id"].'" contenteditable>'.$row["bookname"].'</td>  
                     <td class="bookauthor" data-id2="'.$row["id"].'" contenteditable>'.$row["bookauthor"].'</td>  
					 <td class="bookpages" data-id2="'.$row["id"].'" contenteditable>'.$row["bookpages"].'</td>  
					 <td class="images" data-id2="'.$row["id"].'" contenteditable>'.$row["images"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
 }  
 else  
 { 
   $output .= '<tr><td colspan="4">if no datas show up click <a class="createlink" href="ol-admin/create.php" >Here .</a>To create Your data base</td> </div>';  
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
 $output .= '</div><br/></form>';  
 echo $output;  
 ?>  
