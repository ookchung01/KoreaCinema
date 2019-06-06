<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from food_info natural join price_info natural join info";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query =  $query . " where food_name like '%$search_keyword%' or product_name like '%$search_keyword%' or product_id like '%$search_keyword%'";
    
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
            <th>제품명</th>
            <th>음식당 필요한 제품 수량</th>
            <th>가격</th>
            <th>판매</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['food_name']}</td>";
            echo "<td><a href='product_view.php?product_id={$row['product_id']}'>{$row['product_name']}</a></td>";
            echo "<td width='20%'>{$row['product_amount']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td width='10%'>
                <a href='product_sell.php?product_id={$row['product_id']}'>
                 <button onclick='javascript:deleteConfirm({$row['product_id']})' class='button primary small'>판매</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
</div>
<? include("footer.php") ?>
