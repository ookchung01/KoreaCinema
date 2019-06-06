<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$product_id = $_POST["product_id"];
$actual = $_POST['actual'];

$ret = mysqli_query($conn, "update amount set actual = '$actual' where product_id = '$product_id'");

if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    echo "<meta http-equiv='refresh' content='0;url=stock_info.php'>";
}
?>