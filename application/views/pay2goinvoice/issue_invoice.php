<html>

    <body>

        <?php echo validation_errors(); ?>

        <div class="w3-container">

            <?php echo form_open('Pay2GoInvoice/get_data/issue_invoice'); ?>

            <label class="w3-text-green">RespondType</label>
            <input class= "w3-input" type="text" name="RespondType" value="JSON" size="50" />
            <br/>
            
            <label class="w3-text-green">Version</label>
            <input class= "w3-input" type="text" name="Version" value="1.4" size="50" />
            <br/>
            
            <label class="w3-text-green">商店自訂編號</label>
            <input class= "w3-input" type="text" name="MerchantOrderNo" value="" size="50" />
            <br/>
            
            <label class="w3-text-green">Status,1 = 立刻開立發票, 0  等候觸發開立發票</label>
            <input class= "w3-input" type="text" name="Status" value="" size="50" />
            <br/>
            
            <label class="w3-text-green">發票種類,B2B or B2C</label>
            <input class= "w3-input" type="text" name="Category" value="B2C" size="50" />
            <br/>
            
            <label class="w3-text-green">買受人名稱</label>
            <input class= "w3-input" type="text" name="BuyerName" value="" size="50" />
            <br/>
            
            <label class="w3-text-green">買受人地址</label>
            <input class= "w3-input" type="text" name="BuyerAddress" value="" size="50" />
            <br/>
            
            <label class="w3-text-green">是否索取紙本發票</label>
            <input class= "w3-input" type="text" name="PrintFlag" value="Y" size="50" />
            <br/>

            <label class="w3-text-green">課稅別 (1=應稅,2=零稅率,3=免稅,9=混合型</label>
            <input class= "w3-input" type="text" name="TaxType" value="1" size="50" />
            <br/>
            
            <label class="w3-text-green">稅率 （預設5%）</label>
            <input class= "w3-input" type="text" name="TaxRate" value="5" size="50" />
            <br/>
            
            <label class="w3-text-green">銷售額合計</label>
            <input class= "w3-input" type="text" name="Amt" value="490" size="50" />
            <br/>
            
            <label class="w3-text-green">稅額 （公司計算後）</label>
            <input class= "w3-input" type="text" name="TaxAmt" value="10" size="50" />
            <br/>
            
            <label class="w3-text-green">發票金額</label>
            <input class= "w3-input" type="text" name="TotalAmt" value="500" size="50" />
            <br/>
            
            <label class="w3-text-green">商品名稱</label>
            <input class= "w3-input" type="text" name="ItemName" value="" size="50" />
            <br/>
            
            <label class="w3-text-green">商品單位</label>
            <input class= "w3-input" type="text" name="ItemUnit" value="" size="50" />
            <br/>

            <label class="w3-text-green">商品數量</label>
            <input class= "w3-input" type="text" name="ItemCount" value="" size="50" />     
            <br/>
            
            <label class="w3-text-green">商品單價</label>
            <input class= "w3-input" type="text" name="ItemPrice" value="500" size="50" />
            <br/>
            
            <label class="w3-text-green">小計（B2B時 此欄位未稅,B2C時 此欄位含稅）</label>
            <input class= "w3-input" type="text" name="ItemAmt" value="500" size="50" />
            <br/>
            
            <label class="w3-text-green">商品課稅別</label>
            <input class= "w3-input" type="text" name="ItemTaxType" value="1" size="50" />
            <br/>
            
            <label class="w3-text-green">備註</label>
            <input class= "w3-input" type="text" name="Comment" value="" size="50" />

            <br/>

            <div><input type="submit" class="w3-button w3-teal" value="Submit" /></div>



        </div>
    </body>
</html>