<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$action = "info_insert.php";
$mode = "제품 정보 변경/등록";

if (array_key_exists("product_id", $_GET)) {
    $product_id = $_GET["product_id"];
    $query = "select * from info natural join amount where product_id = '$product_id'";
    $drop = mysqli_query($conn, "drop view if exists joined");
    $query2 = mysqli_query($conn, "create view joined as select product_name from info where product_id = '$product_id'");
    $query3 = mysqli_query($conn, "select product_info from prod_info natural join joined");
    $query4 = mysqli_fetch_assoc($query3);
    $res = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($res);
    if ($product['current'] <= 0) {
        msg("재고가 없습니다. 입고를 하십시오");
    }
}
?>
    <div class="container fullwidth">
		<form name="product_form" action="<?=$action?>" method="post" class="fullwidth">
        <h3>제품 수량</h3>

        <p>
            <label for="product_name">제품명</label>
            <input readonly type="text" id="product_name" name="product_name" value="<?= $product['product_name'] ?>"/>
        </p>

        <p>
            <label for="product_id">제품 ID</label>
            <input readonly type="text" id="product_id" name="product_id" value="<?= $product['product_id'] ?>"/>
        </p>

        <p>
            <label for="current">현재 수량</label>
            <input readonly type="text" id="current" name="current" value="<?= $product['current'] ?>"/>
        </p>
        
        <p>
            <label for="product_info">제품 정보</label>
            <input type="text" id="product_info" name="product_info" value="<?= $query4['product_info'] ?>"/>
        </p>
        <p align="center"><a href='info_insert.php?product_name={$row['product_name']}'><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>
        
        <script>
                function validate() {
                    if(document.getElementById("product_info").value.length > 1024) {
                    	alert ("제품 설명 길이를 1024자 이내로 작성하시오"); return false;
                    }
                    return true; // submit 하면 action으로 간다 
                }
            </script>
    </div>
<? include("footer.php") ?>