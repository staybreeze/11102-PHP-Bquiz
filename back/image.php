<!-- 有圖片 -->

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%" style="text-align: center">
            <tbody>
                <tr class="yel">
                    <td width="70%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
             
             $total = $DB->count();
             $div = 3;
             $pages = ceil($total / $div);
             $now = $_GET['p'] ?? 1;
             $start = ($now - 1) * $div;

             // 先從資料庫撈資料
             // $DB=${ucfirst($do)};->已在DB設變數，因此可刪
             $rows = $DB->all("limit $start,$div");
                // $rows = $Image->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <!-- 在update.php，已經 $row['img']=$_FILES['img']['name']; -->
                            <img src="./img/<?= $row['img']; ?>" style="width:100px;height:68px">
                        </td>
                        <!-- 無TEXT的頁面，多加一個傳ID的按鈕，以便edit.php跑判斷式 -->
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        <td>

                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>

                        <td>
                            <!-- GET傳值 -->
                            <!-- 更新圖片是modal/upload轉update -->
                            <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更換圖片">
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

                // echo "<a href='do=image&p=" . ($now - 1) . "'><</a>";

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
                    <!-- 新增圖片是到MODAL/title轉add -->
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增校園映像圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>