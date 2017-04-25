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
 $query = "SELECT * FROM bookdetails WHERE bookname LIKE '%".$search."%' ORDER BY ".$column_name." ".$order." LIMIT $start_from, $record_per_page"; 
 $result = mysqli_query($connect, $query);  
 $output .= '
 <div class="table-responsive" id="book_table">  
 <table class="table table-bordered">  
      <tr>  
           <th width="2%"><a class="column_sort" id="id" data-order="'.$order.'" href="#">Row</a></th>  
           <th width="10%"><a class="column_sort" id="bookname" data-order="'.$order.'" href="#">bookname</a></th>  
           <th width="5%"><a class="column_sort" id="booklng" data-order="'.$order.'" href="#">booklng</a></th>  
           <th  width="8%"><a class="column_sort" id="bookauthor" data-order="'.$order.'" href="#">bookauthor</a></th>  
		   <th  width="8%"><a class="column_sort" id="booktrans" data-order="'.$order.'" href="#">booktrans</a></th>  
		   <th  width="8%"><a class="column_sort" id="bookshop" data-order="'.$order.'" href="#">bookshop</a></th>  
   	       <th  width="8%"><a class="column_sort" id="reldate" data-order="'.$order.'" href="#">reldate</a></th> 
           <th  width="8%"><a class="column_sort" id="reservation" data-order="'.$order.'" href="#">reservation</a></th>  		   
		   <th  width="15%"><a class="column_sort" id="extrainfo" data-order="'.$order.'" href="#">extrainfo</a></th>  
		   <th  width="10%"><a class="column_sort" id="images" href="#">bookimage</a></th>  
           <th width="2%">Delete</th>  		   
      </tr>';

      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="bookname" data-id1="'.$row["id"].'" contenteditable>'.$row["bookname"].'</td>  
                     <td class="booklng" data-id2="'.$row["id"].'" contenteditable>'.$row["booklng"].'</td>  
					 <td class="bookauthor" data-id3="'.$row["id"].'" contenteditable>'.$row["bookauthor"].'</td> 
					 <td class="booktrans" data-id4="'.$row["id"].'" contenteditable>'.$row["booktrans"].'</td> 
					 <td class="bookshop" data-id5="'.$row["id"].'" contenteditable>'.$row["bookshop"].'</td> 
					 <td class="reldate" data-id6="'.$row["id"].'" contenteditable>'.$row["reldate"].'</td> 
					 <td class="reservation" data-id7="'.$row["id"].'" contenteditable>'.$row["reservation"].'</td> 
					 <td class="extrainfo" data-id8="'.$row["id"].'" contenteditable>'.$row["extrainfo"].'</td> 
					 <td class="images" data-id9="'.$row["id"].'" contenteditable><img src="../ol-content/images/'.$row["images"].'"></td>  
                     <td><button type="button" name="delete_btn" data-id10="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
  
$output .='</tr></table><div align="center">';
 $page_query = "SELECT * FROM bookdetails WHERE bookname LIKE '%".$search."%' ORDER BY ".$column_name." ".$order."";  
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