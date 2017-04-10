<?php 
require_once("db.php");
// Check connection
if (!$connect) {
    die("Error: " . mysqli_connect_error());
}
// sql to create table
$sql = "CREATE TABLE test1 (
id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
bookname VARCHAR(30) NOT NULL,
bookdate VARCHAR(30) NOT NULL,
author VARCHAR(30) NOT NULL,
images blob,
reg_date TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_persian_ci";

if (mysqli_query($connect, $sql)) {
    echo "Your DB Was Created.";
} else {
    echo "We Cant Make Your DB Because Of : " . mysqli_error($connect);
}

mysqli_close($connect);
?>