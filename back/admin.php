<!-- 純文字 -->

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%" style="text-align: center">
            <tbody>
                <tr class="yel">
                    <td width="45%">帳號</td>
                    <td width="45%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                // 先從資料庫撈資料
                // $DB=${ucfirst($do)};->已在DB設變數，因此可刪
                $rows=$DB->all();
                // $rows = $Ad->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
    
                        <input type="text" name="acc[]" style="width:90%" value="<?=$row['acc'];?>">
                        </td>
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        <td>
                            <!-- 
                                $_POST['sh'][0] => "1"
                                $_POST['sh'][1] => "3" 
                            -->

                            <!-- 生成一個checked的陣列 -->
                            
                            <input type="password" name="pw[]" value="<?=$row['pw'];?>">
                        </td>
                        <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增管理者帳號"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>