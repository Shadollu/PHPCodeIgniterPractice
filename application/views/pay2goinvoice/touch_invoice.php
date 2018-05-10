<html>

    <body>

        <?php echo validation_errors(); ?>
        <div class="w3-container">

            <?php echo form_open('Pay2GoInvoice/get_data/touch_invoice'); ?>

            <label class="w3-text-green">RespondType</label>
            <input class= "w3-input" type="text" name="RespondType" value="JSON" size="50" />
            <br/>

            <label class="w3-text-green">Version</label>
            <input class= "w3-input" type="text" name="Version" value="1.0" size="50" />
            <br/>

            <label class="w3-text-green">智付寶開立序號（由智付寶平台自動開立的序號）</label>
            <input class= "w3-input" type="text" name="InvoiceTransNo" value="" size="50" />
            <br/>

            <label class="w3-text-green">商店自訂編號</label>
            <input class= "w3-input" type="text" name="MerchantOrderNo" value="" size="50" />
            <br/>

            <label class="w3-text-green">開立發票的金額</label>
            <input class= "w3-input" type="text" name="TotalAmt" value="" size="50" />

            <br/>

            <div><input type="submit" class="w3-button w3-teal" value="Submit" /></div>

        </div>

    </body>
</html>