<?php
include_once "db.php";

// 編輯
// 先檢查ID，以便確認有主選單
if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        // 檢查 $id 是否存在於 $_POST['del'] 這個陣列中
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $Menu->del($id);
        } else {
            $row = $Menu->find($id);
            $row['text'] = $_POST['text'][$idx];
            $row['href'] = $_POST['href'][$idx];
            $Menu->save($row);
        }
    }
}


if (isset($_POST['add_text'])) {
    foreach ($_POST['add_text'] as $idx => $text) {
        if ($text != "") {
            // 先告新陣列
            // 如果 $text 不是空，則建立一個新的陣列 $data，其中包含了要保存到資料庫的資料。
            // $data['text'] 將是 $text 的值。
            // $data['href'] 將是對應索引位置的 add_href 陣列的值。
            // $data['sh'] 被硬編碼為 1。
            // $data['menu_id'] 將是對應索引位置的 menu_id 陣列的值。索引位置的 menu_id 陣列的值。
            $data = [];
            $data['text'] = $text;
            $data['href'] = $_POST['add_href'][$idx];
            $data['sh'] = 1;
            $data['menu_id'] = $_POST['menu_id'];

            $Menu->save($data);
        }
    }
}

to("../back.php?do=menu");
