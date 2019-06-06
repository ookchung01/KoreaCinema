<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>

<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from food_info natural join price_info";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query =  $query . " where product_name like '%$search_keyword%'";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>음식명</th>
            <th>가격</th>
            <th>가격 수정</th>
            <th>삭제</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['food_name']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td width='13%'>
            	 <a href='edit_price.php?food_name={$row['food_name']}'>
            	 <button class='button primary small'>가격 수정</button>
            	 </td>";
            echo "<td width='10%'>
		    	 <a href='product_delete.php?food_name={$row['food_name']}'>
		         <button onclick='javascript:deleteConfirm({$row['food_name']})' class='button danger small'>삭제</button>
		    	 </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <script>
        function deleteConfirm(food_name) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "product_delete.php?food_name=" + food_name;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>


            