 <?php  
require_once("../../config.php");
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
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM `ol-user` WHERE username LIKE '%".$search."%' ORDER BY ".$column_name." ".$order." LIMIT $start_from, $record_per_page"; 
 $result = mysqli_query($connect, $query);  
 $output .= '
 <div class="table-responsive-users" id="users_table">  
 <table class="table table-bordered">  
      <tr>  
           <th width="2%"><a class="column_sort" id="id" data-order="'.$order.'" href="#">Row</a></th>  
           <th width="10%"><a class="column_sort" id="username" data-order="'.$order.'" href="#">username</a></th>  
           <th width="10%"><a class="column_sort" id="password" data-order="'.$order.'" href="#">password</a></th>  
           <th  width="10%"><a class="column_sort" id="role" data-order="'.$order.'" href="#">role</a></th>    
           <th width="2%">Delete</th>  		   
      </tr>';
 if(mysqli_num_rows($result) > 0)  
 {  
       $output .= '
		
           <tr class="add-data">  	   
                <td></td>  
                <td id="iusername" contenteditable ></td>  
                <td id="ipassword" contenteditable></td>  
			    <td id="irole" contenteditable></td>	
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  	
           </tr>
	
		   
      '; 
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="username" data-id1="'.$row["id"].'" contenteditable>'.$row["username"].'</td>  
                     <td class="password" data-id2="'.$row["id"].'" contenteditable>'.$row["password"].'</td>  
					 <td class="role" data-id3="'.$row["id"].'" contenteditable>'.$row["role"].'</td> 
                     <td><button type="button" name="delete_btn" data-id4="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
     }  
 }  
$output .='</tr></table><div align="center">';
 $page_query = "SELECT * FROM `ol-user` WHERE username LIKE '%".$search."%' ORDER BY ".$column_name." ".$order."";  
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