<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "확인";
$product_id = $_GET["product_id"];
$action = "product_count.php";


?>
    <div class="container">
        <form name="product_form" action="<?=$action?>" method="post" class="fullwidth">
            <h3>제품 개수<?=$mode?></h3>
            <p>
                <label for="product_id">제품 ID</label>
                <input readonly type="text" id="product_id" name="product_id" value="<?=$product_id?>"/>
            </p>
            <p>
                <label for="actual">수량</label>
                <input type="text" placeholder="정수로 입력" id="actual" name="actual" value="<?=$product['actual']?>"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("actual").value.length < 0) {
                    	alert ("수량이 음수 일 수 없습니다"); return false;
                    }
                    else if(document.getElementById("actual").value == "") {
                        alert ("수량을 입력해 주십시오"); return false;
                    }
                    return true; // submit 하면 action으로 간다 
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>