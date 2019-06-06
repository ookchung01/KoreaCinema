<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$food_name = $_GET['food_name'];

$ret = mysqli_query($conn, "delete from food_info where food_name = '$food_name'");
$ret2 = mysqli_query($conn, "delete from price_info where food_name = '$food_name'");

if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 삭제 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=management.php'>";
}

?>

