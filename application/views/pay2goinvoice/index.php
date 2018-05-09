<html>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>

        <div class="w3-container">

            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">
                <p><?php echo anchor('pay2goinvoice/index/issue_invoice', '建立發票', '建立發票') ?></p>
                <!--<p><a href="index.php/pay2goinvoice/index/issue_invoice">建立發票</a></p>-->
            </div>
            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">
                <p><?php echo anchor('pay2goinvoice/index/touch_invoice', '觸發建立發票', '觸發建立發票') ?></p>
                <!--<p><a href="index.php/pay2goinvoice/index/touch_invoice">觸發建立發票</a></p>-->
            </div>
            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">
                <p><?php echo anchor('pay2goinvoice/index/invalid_invoice', '作廢發票', '作廢發票') ?></p>
                <!--<p><a href="index.php/pay2goinvoice/index/invalid_invoice">作廢發票</a></p>-->
            </div>
            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">
                <p><?php echo anchor('pay2goinvoice/index/discount_invoice', '發票折讓', '發票折讓') ?></p>
               <!--<p><a href="index.php/pay2goinvoice/index/discount_invoice">發票折讓</a></p>-->
            </div>
            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">
                <p><?php echo anchor('pay2goinvoice/index/query_invoice', '查詢發票', '查詢發票') ?></p>
                <!--<p><a href="index.php/pay2goinvoice/index/query_invoice">查詢發票</a></p>-->
            </div>


        </div>

    </body>
</html>
