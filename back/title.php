<!-- 有圖片 -->

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%" style="text-align: center">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                // $DB=${ucfirst($do)};->已在DB設變數，因此可刪
                $rows = $DB->all();
                // $rows=$Title->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td width="45%">
                            <!-- 在update.php，已經 $row['img']=$_FILES['img']['name']; -->
                            <img src="./img/<?= $row['img']; ?>" style="width:300px;height:30px">
                        </td>
                        <td width="23%">
                            <input type="text" name="text[]" style="width:90%" value="<?= $row['text']; ?>">
                            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                        </td>
                        <td width="7%">
                            <!-- 這邊TITLE只能顯示一個，所以非sh[] -->
                            <input type="radio" name="sh" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td width="7%">
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <!-- GET傳值 -->
                            <!-- 更新圖片是modal/upload轉update -->
                            <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更新圖片">
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
                    <!-- 新增圖片是到MODAL/title轉add -->
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增網站標題圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>