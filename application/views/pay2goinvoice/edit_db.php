<html>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
        <div class="w3-container">
            <?php echo form_open('Pay2GoInvoice/edit_db_save'); ?>

            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">              
                <div class="w3-left-align">
                    <br/>
                    時間：<input type='text' name="logtime" value=<?php echo $result[0]->logtime ?>><br/>
                    STATUS：<input type='text' name="result_status" value=<?php echo $result[0]->result_status ?>> <br/>
                    回傳訊息：<input type='text' name="message" value=<?php echo $result[0]->message ?>><br/>
                    Result：<input type='text' name="result" value=<?php echo $result[0]->result ?>><br/>

        <!--<p><?php echo '時間：' . $value->logtime . "<br/>STATUS：" . $value->result_status . "<br/>回傳訊息：" . $value->message . "<br/> Result：" . $value->result ?>  </p>-->
                </div>
            </div>
            
            <input type="hidden" name="id" value=<?php echo $result[0]->id ?>  />
            
            <input type="submit"  class="w3-button w3-teal" name ="submit" value='edit'/>
            <input type="submit"  class="w3-button w3-teal" name="submit"  value='delete'/>
        </div>
    </body>
</html>