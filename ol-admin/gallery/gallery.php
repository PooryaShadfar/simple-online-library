<?php
require_once("./../config.php");
$sql = "SELECT * FROM bookdetails";
$result = mysqli_query($connect, $sql);
echo "<section id='galleryCase' class='sepratorContains' style='margin-bottom: 20px;'><div class='container'><div class='row'>";
while ($row = mysqli_fetch_array($result)){
echo "<div class='col-md-2 col-sm-3 col-xs-6 gallery' id='gallery'>";
echo"<img src='./../ol-content/images/".$row['images']."' >";								
echo "</div>";
}
echo "</div></div></section>";
?>