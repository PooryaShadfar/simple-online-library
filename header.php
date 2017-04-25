<html>  
      <head>  
           <title>Simple Online Library</title>  
           <link rel="stylesheet" href="ol-apperance/css/bootstrap.min.css" />  
		   <link rel="stylesheet" href="ol-apperance/css/font-awesome.css" />  
		   <link rel="stylesheet" href="ol-apperance/css/style.css" /> 	
		   <script src="ol-apperance/js/jquery.min.js"></script>  
           <script src="ol-apperance/js/bootstrap.min.js"></script>  
	       <meta name="viewport" content="width=device-width, initial-scale=1">
	       <meta http-equiv="Content-Type" content="" charset="" />
	       <meta name="description" content="its simple online library..." />
	       <meta property="og:image" content="ol-apperance/image/logo.png" />
	       <link rel="shortcut icon" href="ol-apperance/image/fov.ico" />
     </head>  
<body>
<div id="header-wrapper">
	<div id="header">
		<div id="head-stuff">
			 <div id="logo">
			    <a href="index.php"><img src="ol-apperance/image/logo.png" alt="" /></a>
			 </div>
        </div> 
	</div>
<div class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">=</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php"><i class="fa fa-home"></i> Home Page</a></li>
      <li><a href="#"  data-toggle="modal" data-target="#loglabel"> <i class="fa fa-sign-in"></i>Login/Register</a></li>
      <li><a href=""> <i class="fa fa-phone"></i> Call Us </a></li>
    </ul>
    </div>
  </div>
</nav>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="loglabel" tabindex="-1" role="dialog" aria-labelledby="loglabel">
<div class="modal-dialog" role="log/reg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="loglabel"> Login And Register </h4></div>
<div class="modal-body">
<?php include_once('ol-admin/logform.php'); ?>
</div>
<div class="modal-footer"></div>
</div></div></div>	

