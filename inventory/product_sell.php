<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$product_id = $_GET["product_id"];
$ret = mysqli_query($conn, "update amount am, food_info fi set am.current = am.current - fi.product_amount where am.product_id = '$product_id'");
$check = "select * from amount where product_id = '$product_id'";
$res = mysqli_query($conn, $check);
$product = mysqli_fetch_assoc($res);
if($product['current'] < 0){
	$ret2 = mysqli_query($conn, "update amount am, food_info fi set am.current = am.current + fi.product_amount where am.product_id = '$product_id'");
	msg("재고가 없습니다. 입고를 하십시오");
}

if(!$ret)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
	msg('판매되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=product_list.php'>";
}

?>