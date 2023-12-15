<?php
include_once "db.php";

// 編輯
// 先檢查ID，以便確認有主選單
if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id){
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Menu->del($id);
        } else {
            $row=$Menu->find($id);
            $row['text']=$_POST['text'][$idx];
            $row['href']=$_POST['href'][$idx];
            $Menu->save($row);
        }
    }
}


if(isset($_POST['add_text'])){
    foreach($_POST['add_text'] as $idx =>$text){
        // 先告新陣列
        $data=[];
        $data['text']=$text;
        $data['href']=$_POST['add_href'][$idx];
        $data['sh']=1;
        $data['menu_id']=$_POST['menu_id'];

        $Menu->save($data);
    }
}

to("../back.php?do=menu");

