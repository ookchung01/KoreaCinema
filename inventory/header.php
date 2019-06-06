<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>Korea Cinema</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="product_list.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="index.php">Korea Cinema</a>
            <ul class='pull-right'>
                <li><a href='product_list.php'>판매</a></li>
                <li><a href='stock_info.php'>재고 현황</a></li>
                <li><a href='in_stock.php'>입고 등록</a></li>
                <li><a href='product_form.php'>음식 등록</a></li>
                <li><a href='management.php'>음식 관리</a></li>
                <li><a href='site_info.php'>사이트 정보</a></li>
                <li><input type="text" name="search_keyword" placeholder="재고 통합검색"></li>
            </ul>
        </div>
    </div>
</form>