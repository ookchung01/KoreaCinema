<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$food_name = $_POST['food_name'];
$product_id = $_POST['product_id'];
$product_amount = $_POST['product_amount'];
$price = $_POST['price'];
$product_name = $_POST['product_name'];

$ret = mysqli_query($conn, "insert into food_info (food_name, product_id, product_amount) values('$food_name','$product_id', '$product_amount')");
$ret2 = mysqli_query($conn, "insert into price_info (food_name, price) values('$food_name','$price')");
$ret3 = mysqli_query($conn, "insert into info (product_id, product_name) values('$product_id','$product_name')");
$ret4 = mysqli_query($conn, "insert into amount (product_id, in_stock, current, actual, difference) values('$product_id', 0, 0, 0, 0)");
$ret5 = mysqli_query($conn, "insert into prod_info (product_name) values ('$product_name')");

if(!$ret || !$ret2 || !$ret3 ||!$ret4 || !$ret5)
{
	echo mysqli_error($conn);
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 입력 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=product_list.php'>";
}

?>