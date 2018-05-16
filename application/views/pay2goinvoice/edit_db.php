<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#logtime").datepicker({dateFormat: 'yy-mm-dd'});
            });

        </script>
    </head>

    <body>
        <div class="w3-container">
            <?php echo form_open('Pay2GoInvoice/comfirm_edit'); ?>

            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">              
                <div class="w3-left-align">
                    <br/>
                    時間：<input class="w3-input w3-border w3-light-grey" type='text' name="logtime" id="logtime" value=<?php echo $result[0]->logtime ?>><br/>
                    STATUS：<input class="w3-input w3-border w3-light-grey" type='text' name="result_status" value=<?php echo $result[0]->result_status ?>> <br/>
                    回傳訊息：<input class="w3-input w3-border w3-light-grey" type='text' name="message" value=<?php echo $result[0]->message ?>><br/>
                    <!--Result：<input type='text' name="result" value=<?php echo $result[0]->result ?>><br/>-->
                    Result：<textarea class="w3-input w3-border w3-light-grey" id="result" name="result"><?php echo $result[0]->result ?></textarea><br/>
                </div>
            </div>

            <input type="hidden" name="id" value=<?php echo $result[0]->id ?> />          
            <input type="submit"  class="w3-button w3-teal" name ="submit" value='edit'/>
            <input type="submit"  class="w3-button w3-teal" name="submit" onclick="return confirm('確定要刪除這筆資料？')"  value='delete'/>

        </div>
    </body>
</html>