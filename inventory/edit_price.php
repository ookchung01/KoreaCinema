<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "변경";
$food_name = $_GET["food_name"];
$action = "edit.php";


?>
    <div class="container">
        <form name="product_form" action="<?=$action?>" method="post" class="fullwidth">
            <h3>가격 <?=$mode?></h3>
            <p>
                <label for="food_name">음식명</label>
                <input readonly type="text" placeholder="음식명 입력" id="food_name" name="food_name" value="<?=$food_name?>"/>
            </p>
            <p>
                <label for="price">가격</label>
                <input type="text" placeholder="정수로 입력" id="price" name="price" value="<?=$product['price']?>"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("price").value.length < 0) {
                    	alert ("가격이 음수 일 수 없습니다"); return false;
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