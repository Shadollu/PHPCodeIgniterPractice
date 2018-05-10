<html>

    <body>

        <?php echo validation_errors(); ?>

        <div class="w3-container">

            <?php echo form_open('Pay2GoInvoice/get_data/query_invoice'); ?>


            <label class="w3-text-green">RespondType</label>
            <input class= "w3-input" type="text" name="RespondType" value="JSON" size="50" />
            <br/>

            <label class="w3-text-green">Version</label>
            <input class= "w3-input" type="text" name="Version" value="1.1" size="50" />
            <br/>

            <label class="w3-text-green">SearchType （0=使用發票號碼及隨機碼查詢。1=使用訂單編號及發票金額查詢。）</label>
            <input class= "w3-input" type="text" name="SearchType" value="" size="10" />
            <br/>

            <label class="w3-text-green">商店自訂編號</label>
            <input class= "w3-input" type="text" name="MerchantOrderNo" value="" size="50" />
            <br/>

            <label class="w3-text-green">開立發票的金額</label>
            <input class= "w3-input" type="text" name="TotalAmt" value="" size="50" />
            <br/>

            <label class="w3-text-green">發票號碼</label>
            <input class= "w3-input" type="text" name="InvoiceNumber" value="" size="50" />
            <br/>

            <label class="w3-text-green">訂單隨機碼（四碼）</label>
            <input class= "w3-input" type="text" name="RandomNum" value="" size="50" />
            <br/>

            <label class="w3-text-green">是否於智付寶平台顯示發票查詢結果(0 or 1)</label>
            <input class= "w3-input" type="text" name="DisplayFlag" value="" size="50" />
            <br/>

            <div><input type="submit" class="w3-button w3-teal" value="Submit" /></div>

        </div>

    </body>
</html>

