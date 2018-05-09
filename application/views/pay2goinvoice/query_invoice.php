<html>

    <body>

        <?php echo validation_errors(); ?>

        <?php echo form_open('Pay2GoInvoice/get_data/query_invoice'); ?>


        <h5>RespondType</h5>
        <input type="text" name="RespondType" value="JSON" size="50" />

        <h5>Version</h5>
        <input type="text" name="Version" value="1.1" size="50" />

        <h5>SearchType</h5>
        <input type="text" name="SearchType" value="" size="10" />

        <h5>MerchantOrderNo</h5>
        <input type="text" name="MerchantOrderNo" value="" size="50" />

        <h5>TotalAmt</h5>
        <input type="text" name="TotalAmt" value="" size="50" />

        <h5>InvoiceNumber</h5>
        <input type="text" name="InvoiceNumber" value="" size="50" />

        <h5>RandomNum</h5>
        <input type="text" name="RandomNum" value="" size="50" />

        <h5>DisplayFlag</h5>
        <input type="text" name="DisplayFlag" value="" size="50" />

        <div><input type="submit" value="Submit" /></div>

    </form>

</body>
</html>

