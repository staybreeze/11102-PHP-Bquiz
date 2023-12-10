<?php include_once "db.php";

$table=$_POST['table'];
$DB=${ucfirst($table)};
// 從HIDDEN隨POST傳值過來的TABLE要關掉，以便項目跟資料庫對得起來
unset($_POST['table']);

foreach($_POST['text'] as $id => $text){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $DB->del($id);
    }else{
        $row=$DB->find($id);
        $row['text']=$text;
        if($table=='title'){
            // 單一指定ID
            $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
        }else{
            // 可以選多個ID
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        }
        $DB->save($row);
    }
}

to("../back.php?do=$table");