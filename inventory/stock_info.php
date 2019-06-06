<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>


<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from info natural join amount";
	$query2 = mysqli_query($conn, "update amount set difference = current - actual");
    
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>No.</th>
            <th>제품명</th>
            <th>제품 ID</th>
            <th>현재 재고</th>
            <th>실 재고</th>
            <th>재고 차이</th>
            <th>재고 개수 확인</th>
            <th>최종 마감</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['product_name']}</td>";
            echo "<td>{$row['product_id']}</td>";
            echo "<td>{$row['current']}</td>";
            echo "<td>{$row['actual']}</td>";
            echo "<td>{$row['difference']}</td>";
            echo "<td width='13%'>
                <a href='count.php?product_id={$row['product_id']}'>
                 <button onclick='javascript:deleteConfirm({$row['product_id']})' class='button primary small'>확인</button>
                </td>";
            echo "<td width='10%'>
                <a href='finalize.php?product_id={$row['product_id']}'>
                 <button class='button danger small'>마감</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
</div>
<? include("footer.php") ?>
