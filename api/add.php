<?php
include_once "db.php";


// $table=$_POST['table']; 　＋　$DB=${ucfirst($table)};
$DB=${ucfirst($_POST['table'])};
$table=$_POST['table'];

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    
    $_POST['img']=$_FILES['img']['name'];
}

// 因為顯示的1有唯一性，因此新增的TITLE都是0，以便顯示可以獨立控管
$_POST['sh']=($table=='title')?0:1;

unset($_POST['table']);
$DB->save($_POST);

to("../back.php?do=$table");


?>