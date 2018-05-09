<html>

    <body>

        <?php echo validation_errors(); ?>

        <?php echo form_open('Pay2GoInvoice/get_data/touch_invoice'); ?>


        <h5>RespondType</h5>
        <input type="text" name="RespondType" value="JSON" size="50" />

        <h5>Version</h5>
        <input type="text" name="Version" value="1.0" size="50" />

        <h5>InvoiceTransNo, Pay2Go's InvoiceNo</h5>
        <input type="text" name="InvoiceTransNo" value="" size="50" />

        <h5>MerchantOrderNo</h5>
        <input type="text" name="MerchantOrderNo" value="" size="50" />

        <h5>TotalAmt</h5>
        <input type="text" name="TotalAmt" value="" size="50" />



        <div><input type="submit" value="Submit" /></div>

    </form>

</body>
</html>