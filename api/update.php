<!-- 有圖 -->

<?php 

include_once "db.php";
// 先把HIDDEN隨POST傳過來的TABLE取成變數
$table=$_POST['table'];

// 資料庫取大寫
$DB=${ucfirst($table)};

// 找出資料以便覆蓋
$row=$DB->find($_POST['id']);

// 如果上傳的資料有檔案
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $row['img']=$_FILES['img']['name'];
}

$DB->save($row);
to("../back.php?do=$table");