<!-- 純文字 -->

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%" style="text-align: center">
            <tbody>
                <tr class="yel">
                    <td width="80%">最新消息資料內容</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                // 分頁
                $total = $DB->count();
                $div = 5;
                $pages = ceil($total / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;


                // 先從資料庫撈資料
                // $DB=${ucfirst($do)};->已在DB設變數，因此可刪
                $rows = $DB->all("limit $start,$div");
                // $rows = $Ad->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <!-- 
                            $_POST['text'][0] => "Some value 1"
                            $_POST['text'][1] => "Some value 2" 
                        -->
                            <!-- textarea不要斷行 -->
                            <textarea type="text" name="text[<?= $row['id']; ?>]" style="width:90%;height:60px" value=""><?= $row['text']; ?></textarea>
                        </td>
                        <td>
                            <!-- 
                                $_POST['sh'][0] => "1"
                                $_POST['sh'][1] => "3" 
                            -->

                            <!-- 生成一個checked的陣列 -->

                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="cent">
            <!--
         <a href="http://">1</a>
         <a href="http://">2</a>
          <a href="http://">3</a>
         <a href="http://">4</a> 
        -->
            <?php
            if ($now > 1) {

                // echo "<a href='do=$do&p=" . ($now - 1) . "'><</a>";

                $prev = $now - 1;
                echo "<a href='?do=$do&p=$prev'> < </a> ";
            }

            // 當前頁放大字型
            for ($i = 1; $i <= $pages; $i++) {
                $fontsize = ($now == $i) ? '24px' : '16px';

                echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'>$i&nbsp;</a>";
            }

            if ($now <$pages) {

     

                $next = $now + 1;
                echo "<a href='?do=$do&p=$next'> > </a> ";
            }
            ?>

        </div>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增最新消息資料"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>