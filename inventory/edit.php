<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$food_name = $_POST["food_name"];
$price = $_POST['price'];

$ret = mysqli_query($conn, "update price_info set price = '$price' where food_name = '$food_name'");

if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    echo "<meta http-equiv='refresh' content='0;url=product_list.php'>";
}
?>