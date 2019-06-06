<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "등록";
$action = "input_stock.php";

$prod = array();

$query = "select * from info";
$res = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($res)) {
    $prod[$row['product_id']] = $row['product_name'];
}

?>
    <div class="container">
        <form name="product_form" action="<?=$action?>" method="post" class="fullwidth">
            <h3>입고 <?=$mode?></h3>
            <p>
                <label for="product_id">제품명</label>
                <select name="product_id" id="product_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($prod as $id => $name) {
                            if($id == $product['product_id']){
                                echo "<option value='{$id}' selected>{$name}</option>";
                            } else {
                                echo "<option value='{$id}'>{$name}</option>";
                            }
                        }
                    ?>
                </select>
            </p>
            <p>
                <label for="in_stock">입고 수량</label>
                <input type="text" placeholder="입고된 제품의 수량을 입력" id="in_stock" name="in_stock" value="<?=$product['in_stock']?>"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("product_id").value == "-1") { //값이 바뀌지 않았다면
                        alert ("제품명을 선택해 주십시오"); return false;
                    }
                    else if(document.getElementById("in_stock").value.length < 0) {
                    	alert ("입고된 수량이 음수 일 수 없다."); return false;
                    }
                    else if(document.getElementById("in_stock").value == "") {
                        alert ("입고된 수량을 입력하시오"); return false;
                    }
                    return true; // submit 하면 action으로 간다 
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>