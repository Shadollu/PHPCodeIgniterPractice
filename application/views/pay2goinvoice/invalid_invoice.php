<html>

    <body>

        <?php echo validation_errors(); ?>


        <div class="w3-container">
            <?php echo form_open('Pay2GoInvoice/get_data/delete_invoice'); ?>

            <label class="w3-text-green">RespondType</label>
            <input class= "w3-input" type="text" name="RespondType" value="JSON" size="50" />
            <br/>

            <label class="w3-text-green">Version</label>
            <input class= "w3-input" type="text" name="Version" value="1.0" size="50" />
            <br/>

            <label class="w3-text-green">InvoiceNumber, Invoice Number</label>
            <input class= "w3-input" type="text" name="InvoiceNumber" value="" size="10" />
            <br/>

            <label class="w3-text-green">InvalidReason</label>
            <input class= "w3-input" type="text" name="InvalidReason" value="" size="50" />
            <br/>

            <div><input type="submit" class="w3-button w3-teal" value="Submit" /></div>

        </div>

    </body>
</html>