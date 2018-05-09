<html>

    <body>

        <?php echo validation_errors(); ?>

        <?php echo form_open('Pay2GoInvoice/get_data/issue_invoice'); ?>


        <h5>RespondType</h5>
        <input type="text" name="RespondType" value="JSON" size="50" />
        
        <h5>Version</h5>
        <input type="text" name="Version" value="1.4" size="50" />

        <h5>MerchantOrderNo</h5>
        <input type="text" name="MerchantOrderNo" value="" size="50" />

        <h5>Status:if you wanna issue invoice immediately,set status = 1. 
            otherwise, this invoice data will stacking in server 
            until you send invoice touch request.</h5>
        <input type="text" name="Status" value="" size="50" />

        <h5>Category, B2B or B2C,Default B2C</h5>
        <input type="text" name="Category" value="B2C" size="50" />

        <h5>BuyerName, Name, that's it</h5>
        <input type="text" name="BuyerName" value="" size="50" />

        <h5>BuyerAddress,where you live</h5>
        <input type="text" name="BuyerAddress" value="" size="50" />

        <h5>PrintFlag</h5>
        <input type="text" name="PrintFlag" value="Y" size="50" />


        <h5>TaxType</h5>
        <input type="text" name="TaxType" value="1" size="50" />

        <h5>TaxRate</h5>
        <input type="text" name="TaxRate" value="5" size="50" />

        <h5>Amt</h5>
        <input type="text" name="Amt" value="490" size="50" />

        <h5>TaxAmt</h5>
        <input type="text" name="TaxAmt" value="10" size="50" />

        <h5>TotalAmt</h5>
        <input type="text" name="TotalAmt" value="500" size="50" />

        <h5>ItemName</h5>
        <input type="text" name="ItemName" value="" size="50" />

        <h5>ItemUnit, piece? chuck? cup? ...etc</h5>
        <input type="text" name="ItemUnit" value="" size="50" />


        <h5>ItemCount, how many?</h5>
        <input type="text" name="ItemCount" value="" size="50" />     

        <h5>ItemPrice</h5>
        <input type="text" name="ItemPrice" value="500" size="50" />

        <h5>ItemAmt</h5>
        <input type="text" name="ItemAmt" value="500" size="50" />

        <h5>ItemTaxType</h5>
        <input type="text" name="ItemTaxType" value="1" size="50" />

        <h5>Comment</h5>
        <input type="text" name="Comment" value="" size="50" />


        <div><input type="submit" value="Submit" /></div>

    </form>

</body>
</html>