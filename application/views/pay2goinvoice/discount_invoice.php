<html>

    <body>

        <?php echo validation_errors(); ?>

        <div class="w3-container">

            <?php echo form_open('Pay2GoInvoice/get_data/discount_invoice'); ?>


            <label class="w3-text-green">RespondType</label>
            <input class= "w3-input" type="text" name="RespondType" value="JSON" size="50" />
            <br/>

            <label class="w3-text-green">Version</label>
            <input class= "w3-input" type="text" name="Version" value="1.3" size="50" />
            <br/>
            
            <label class="w3-text-green">InvoiceNo</label>
            <input class= "w3-input" type="text" name="InvoiceNo" value="" size="50" />
            <br/>

            <label class="w3-text-green">MerchantOrderNo</label>
            <input class= "w3-input" type="text" name="MerchantOrderNo" value="" size="50" />
            <br/>

            <label class="w3-text-green">ItemName</label>
            <input class= "w3-input" type="text" name="ItemName" value="" size="50" />
            <br/>

            <label class="w3-text-green">ItemCount</label>
            <input class= "w3-input" type="text" name="ItemCount" value="" size="50" />
            <br/>

            <label class="w3-text-green">ItemUnit</label>
            <input class= "w3-input" type="text" name="ItemUnit" value="" size="50" />
            <br/>

            <label class="w3-text-green">ItemPrice</label>
            <input class= "w3-input" type="text" name="ItemPrice" value="" size="50" />
            <br/>

            <label class="w3-text-green"ItemAmt</label>
            <input class= "w3-input" type="text" name="ItemAmt" value="" size="50" />
            <br/>

            <label class="w3-text-green">TaxTypeForMixed</label>
            <input class= "w3-input" type="text" name="TaxTypeForMixed" value="" size="50" />
            <br/>

            <label class="w3-text-green">ItemTaxAmt</label>
            <input class= "w3-input" type="text" name="ItemTaxAmt" value="" size="50" />
            <br/>

            <label class="w3-text-green">TotalAmt</label>
            <input class= "w3-input" type="text" name="TotalAmt" value="" size="50" />
            <br/>

            <label class="w3-text-green"Status</label>
            <input class= "w3-input" type="text" name="Status" value="" size="50" />
            <br/>

            <div><input type="submit" class="w3-button w3-teal" value="Submit" /></div>


        </div>
    </body>
</html>