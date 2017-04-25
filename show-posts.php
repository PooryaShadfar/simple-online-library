<?php 
$sql = "SELECT * FROM bookdetails";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result)){
echo "<div class='col-md-2 col-sm-6 col-xs-12 boxWrapper' id=". $row['bookname'] .">";
echo "<div class='thumb'>";
echo "<a href='' rel='bookmark'></a>";
echo "<li class='imgContainer img-responsive' style='background-image: url(ol-content/images/". $row['images'] .")'>";
echo "<a href='' rel='bookmark'></a></li></div><div class='contents'>";
echo "<h2><a href=''>". $row['bookname'] ."</a></h2><div class='txt'>";
echo "<hr>";
echo "<label> زبان کتاب : &nbsp;</label>";
echo $row['booklng'];
echo "<hr>";
echo "<label> نویسنده : &nbsp;</label>";
echo $row['bookauthor'];
echo "<hr>";
echo "<label> مترجم : &nbsp;</label>";
echo $row['booktrans'];
echo "<hr>";
echo "<label> ناشر : &nbsp;</label>";
echo $row['bookshop'];
echo "<hr>";
echo "<label> تاریخ انتشار : &nbsp;</label>";
echo $row['reldate'];
echo "<hr>";
echo "<label> وضعیت : &nbsp;</label>";
if ($row['reservation'] == 1){echo "<span class='mojod'>موجود</span>";}else{ echo "<span class='namojod'>ناموجود</span>"; }
echo "<hr>";
echo "</div></div></div>";
 } ?>