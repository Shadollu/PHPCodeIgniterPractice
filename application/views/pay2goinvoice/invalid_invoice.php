<html>

    <body>

        <?php echo validation_errors(); ?>

        <?php echo form_open('Pay2GoInvoice/delete_invoice'); ?>


        <h5>RespondType</h5>
        <input type="text" name="RespondType" value="JSON" size="50" />

        <h5>Version</h5>
        <input type="text" name="Version" value="1.0" size="50" />

        <h5>InvoiceNumber, Invoice Number</h5>
        <input type="text" name="InvoiceNumber" value="" size="10" />

        <h5>InvalidReason</h5>
        <input type="text" name="InvalidReason" value="" size="50" />

        <div><input type="submit" value="Submit" /></div>

    </form>

</body>
</html>