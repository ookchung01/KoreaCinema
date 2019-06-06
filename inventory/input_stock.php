<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$product_id = $_POST["product_id"];
$in_stock = $_POST['in_stock'];

$ret = mysqli_query($conn, "update amount set in_stock = '$in_stock' where product_id = '$product_id'");
$query = mysqli_query($conn, "update amount set current = current + in_stock where product_id = '$product_id'");

if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	msg('입고되었습니다.');
	echo "<meta http-equiv='refresh' content='0;url=in_stock.php'>";
}
?>