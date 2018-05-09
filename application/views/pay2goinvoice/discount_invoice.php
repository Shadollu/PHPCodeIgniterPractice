<html>

    <body>

        <?php echo validation_errors(); ?>

        <?php echo form_open('Pay2GoInvoice/discount_invoice'); ?>


        <h5>RespondType</h5>
        <input type="text" name="RespondType" value="JSON" size="50" />

        <h5>Version</h5>
        <input type="text" name="Version" value="1.3" size="50" />

        <h5>InvoiceNo</h5>
        <input type="text" name="InvoiceNo" value="" size="50" />

        <h5>MerchantOrderNo</h5>
        <input type="text" name="MerchantOrderNo" value="" size="50" />

        <h5>ItemName</h5>
        <input type="text" name="ItemName" value="" size="50" />

        <h5>ItemCount</h5>
        <input type="text" name="ItemCount" value="" size="50" />

        <h5>ItemUnit</h5>
        <input type="text" name="ItemUnit" value="" size="50" />

        <h5>ItemPrice</h5>
        <input type="text" name="ItemPrice" value="" size="50" />

        <h5>ItemAmt</h5>
        <input type="text" name="ItemAmt" value="" size="50" />

        <h5>TaxTypeForMixed</h5>
        <input type="text" name="TaxTypeForMixed" value="" size="50" />

        <h5>ItemTaxAmt</h5>
        <input type="text" name="ItemTaxAmt" value="" size="50" />

        <h5>TotalAmt</h5>
        <input type="text" name="TotalAmt" value="" size="50" />

        <h5>Status</h5>
        <input type="text" name="Status" value="" size="50" />



        <div><input type="submit" value="Submit" /></div>

    </form>

</body>
</html>