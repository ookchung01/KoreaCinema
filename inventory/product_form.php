<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "등록";
$action = "product_insert.php";


?>
    <div class="container">
        <form name="product_form" action="<?=$action?>" method="post" class="fullwidth">
            <h3>제품 <?=$mode?></h3>
            <p>
                <label for="food_name">음식명</label>
                <input type="text" placeholder="음식명 입력" id="food_name" name="food_name" value="<?=$product['food_name']?>"/>
            </p>
            <p>
                <label for="product_id">제품 ID</label>
                <input type="text" placeholder="제품 ID 입력" id="product_id" name="product_id" value="<?=$product['product_id']?>"/>
            </p>
        	<p>
                <label for="product_name">제품명</label>
                <input type="text" placeholder="제품명 입력" id="product_name" name="product_name" value="<?=$product['product_name']?>"/>
            </p>
            <p>
                <label for="product_amount">제품 수량</label>
                <input type="text" placeholder="새로 입력하는 음식당 해당 제품이 몇개가 사용되는지 입력" id="product_amount" name="product_amount" value="<?=$product['product_amount']?>"/>
            </p>
            <p>
                <label for="price">가격</label>
                <input type="text" placeholder="정수로 입력" id="price" name="price" value="<?=$product['price']?>"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("food_name").value == "") { //값이 바뀌지 않았다면
                        alert ("음식명을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("product_id").value == "") { // 입력되지 않았다면
                        alert ("제품 ID를 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("product_name").value == "") {
                        alert ("제품명을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("product_amount").value == "") {
                        alert ("제품 수량을 입력해 주십시오"); return false;
                    }
                    else if(document.getElementById("food_name").value.length > 10) {
                    	alert ("음식명 길이를 10자 이내로 작성하시오"); return false;
                    }
                    else if(document.getElementById("product_id").value.length > 10) {
                    	alert ("음식명 길이를 10자 이내로 작성하시오"); return false;
                    }
                    else if(document.getElementById("product_name").value.length > 10) {
                    	alert ("음식명 길이를 10자 이내로 작성하시오"); return false;
                    }
                    else if(document.getElementById("price").value == "") {
                        alert ("가격을 입력해 주십시오"); return false;
                    }
                    return true; // submit 하면 action으로 간다 
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>