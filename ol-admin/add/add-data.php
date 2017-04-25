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
    <input type="submit"  class="btn btn-success btn-lg btn-block" name="upload" onClick="setTimeout('clearform()', 1500 );" value="انتشار">
   <hr>
    <div class="form-group">
    <label for="exampleInputFile">تصویر شاخص</label></br>
	<input type="button" value="بارگزاری تصویر" class="btn btn-default pull-left" onclick="document.getElementById('file').click();" />
     <input type="file" style="display:none;" id="file" name="image" >
    <p class="help-block">تصویر کاور کتاب را اینجا آپلود کنید</p>
    </div>
   </div>
   
 <section id="insertData" class="sepratorContains" style="margin-bottom: 20px;float: right;margin-right: -40px;"><div class="container"><div class="row">  
 
  <div class="form-group form-group-sm">
     <div class="col-xs-9">
       <input class="form-control" type="text" name="bookname" id="formGroupInputSmall" placeholder="نام کتاب را وارد نمایید.">
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-book" aria-hidden="true"></i> نام کتاب : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">   
  <select class="form-control" name="booklng" id="formGroupInputSmall">
  <option>فارسی</option>
  <option>انگلیسی</option>
  <option>روسی</option>
  <option>ایتالیای</option>
  <option>فرانسوی</option>
  </select>
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-language" aria-hidden="true"></i> زبان کتاب : </label>
  </div>
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
       <input class="form-control" type="text" name="bookauthor" id="formGroupInputSmall" placeholder="نام نویسنده اصلی کتاب را وارد نمایید.">
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> نویسنده کتاب : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
       <input class="form-control" type="text" name="booktrans" id="formGroupInputSmall" placeholder="نام مترجم این کتاب را وارد نمایید.">
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-pencil-square" aria-hidden="true"></i> مترجم کتاب : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
       <input class="form-control" type="text" name="bookshop" id="formGroupInputSmall" placeholder="نام ناشر کتاب را وارد نمایید.">
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> ناشر کتاب : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
       <input class="form-control" type="text" name="reldate" id="formGroupInputSmall" placeholder="تاریخ چاپ را وارد نمایید،مثال : 1395-02-13">
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-calendar" aria-hidden="true"></i> تاریخ چاپ : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
      <input type="checkbox" name="reservation" value="0" />
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-check-square-o" aria-hidden="true"></i> وضعیت موجودی : </label>
  </div>
  
    <div class="form-group form-group-sm">
     <div class="col-xs-9">
	 <textarea class="form-control" name="extrainfo" id="formGroupInputSmall" style="max-width: 850px;" placeholder="توضیحی کوتاه در مورد این کتاب بنویسید..." rows="5"></textarea>
     </div>
	 <label class="col-sm-2 control-label" for="formGroupInputSmall"> <i class="fa fa-keyboard-o" aria-hidden="true"></i> یادداشت : </label>
  </div>
 
</div></div></section>	  
</form>
</div>