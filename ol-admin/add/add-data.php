<?php 
require_once("./../config.php");
$msg = "";
if (isset($_POST['upload'])) {
$target = "../ol-content/images/".basename($_FILES['image']['name']);
$image = $_FILES['image']['name'];
$bookname = $_POST['bookname'];
$booklng = $_POST['booklng'];
$bookauthor = $_POST['bookauthor'];
$booktrans = $_POST['booktrans'];
$bookshop = $_POST['bookshop'];
$reldate = $_POST['reldate'];
$extrainfo = $_POST['extrainfo'];
$reservation = $_POST['reservation'];
$sql = "INSERT INTO bookdetails (images, bookname, booklng, bookauthor, booktrans, bookshop, reldate, extrainfo, reservation) VALUES ('$image', '$bookname', '$booklng', '$bookauthor', '$booktrans', '$bookshop', '$reldate', '$extrainfo', '$reservation')";
mysqli_query($connect, $sql);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
$msg = "image uploaded successed";
}else{
$msg = "image uploaded failed";
}
}
?>
<div id="contet" >

<form method="post" action="admin.php" enctype="multipart/form-data">
   <input type="hidden" name="size" value="1000000">
   <div class="pull-left send-stuff">
    <input type="submit"  class="btn btn-success btn-lg btn-block" name="upload" onClick="setTimeout('clearform()', 1500 );" value="Publish">
   <hr>
    <div class="form-group">
    <label for="exampleInputFile">Image</label></br>
	<input type="button" value="Choose Image" class="btn btn-default pull-left" onclick="document.getElementById('file').click();" />
     <input type="file" style="display:none;" id="file" name="image" >
    <p class="help-block">Pick Book Cover Image!</p>
    </div>
   </div>
   
 <section id="insertData" class="sepratorContains" style="margin-bottom: 20px;float: right;margin-right: -40px;"><div class="container"><div class="row">  
 
  <div class="form-group form-group-sm">
     <div class="col-xs-9">
       <input class="form-control" type="text" name="bookname" id="formGroupInputSmall" placeholder="Write Book Name">
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-book" aria-hidden="true"></i> Book Name : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">   
  <select class="form-control" name="booklng" id="formGroupInputSmall">
  <option>English</option>
  <option>Persian</option>
  <option>Russian</option>
  <option>Italian</option>
  <option>Frace</option>
  </select>
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-language" aria-hidden="true"></i> Book Language : </label>
  </div>
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
       <input class="form-control" type="text" name="bookauthor" id="formGroupInputSmall" placeholder="Write Book Author Name">
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Book Author : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
       <input class="form-control" type="text" name="booktrans" id="formGroupInputSmall" placeholder="Write Book Translator Name">
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-pencil-square" aria-hidden="true"></i> Book Tanslator : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
       <input class="form-control" type="text" name="bookshop" id="formGroupInputSmall" placeholder="Write Book Publisher Company">
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Book Publisher : </label>
  </div>
  
    <div class="form-group form-group-sm"> 1395-02-13
     <div class="col-xs-9">
       <input class="form-control" type="text" name="reldate" id="formGroupInputSmall" placeholder=" Write Book Relase Date Example (2000-02-03) :">
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-calendar" aria-hidden="true"></i> Book Relase Date : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
      <input type="checkbox" name="reservation" value="0" />
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-check-square-o" aria-hidden="true"></i> Status : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
	 <textarea class="form-control" name="extrainfo" id="formGroupInputSmall" style="max-width: 850px;" placeholder="Write Any Thing You Like About This Book" rows="5"></textarea>
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-keyboard-o" aria-hidden="true"></i> Extra Information : </label>
  </div>
 
</div></div></section>	  
</form>
</div>
