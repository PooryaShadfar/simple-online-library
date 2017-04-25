<?php 
session_start();
if($_SESSION['logged_in'] == 1) {
?>
<html>  
      <head>  
           <title>Admin Area</title>  
           <link rel="stylesheet" href="../ol-apperance/css/bootstrap.min.css" />  
		   <link rel="stylesheet" type="text/css" href="../ol-apperance/css/admin-style.css" />
		   <link rel="stylesheet" href="../ol-apperance/css/font-awesome.css" />  
		   <link rel="stylesheet" href="../ol-apperance/css/style.css" /> 	
           <script src="../ol-apperance/js/bootstrap.min.js"></script>  
           <script src="../ol-apperance/js/jquery.min.js"></script>  
		   <script src="../ol-apperance/js/admin.js"></script>  
		   <script src="../ol-apperance/js/edit.js"></script>  
		   <link rel="shortcut icon" href="ol-apperance/image/fov.ico" />
      </head>  
<body>  
<a href="logout.php">
<input type="submit" name="submit" value="خروج" class="pull-left btn btn-danger btn-sm logout">
</a>
<div class="admin-panel">

    <div class="slidebar">
        <ul>
            <li><a href="" name="tab1"><i class="fa fa-tachometer"></i>Geeral</a></li>
            <li><a href="" name="tab2"><i class="fa fa-pencil"></i>New Book</a></li>
			<li><a href="" name="tab3"><i class="fa fa-align-justify"></i>Edit</a></li>
            <li><a href="" name="tab4"><i class="fa fa-picture-o"></i>Gallery</a></li>
			<li><a href="" name="tab5"><i class="fa fa-user-o"></i>Users</a></li>
           
        </ul>
    </div>
  
    <div class="main">
         <div class="tabs" id="tab1"><h2 class="header">Geeral</h2>  </div>
         <div class="tabs" id="tab2"><h2 class="header">Add New Book</h2><?php include('add/add-data.php'); ?></div>
		 <div class="tabs" id="tab3"><h2 class="header">Edit</h2><?php include('edit/index.php'); ?></div> 
         <div class="tabs" id="tab4"><h2 class="header">Gallery</h2><?php include('gallery/gallery.php'); ?></div>
		 <div class="tabs" id="tab5"><h2 class="header">Users</h2><?php include('users/index.php'); ?></div>
      
    </div>
  
 
</div>
</body> 
</html>

<?php 
} else {
header("Location: ../404.php");
exit();
}
?>
