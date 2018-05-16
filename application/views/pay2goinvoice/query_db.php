
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#logtime").datepicker({ dateFormat: 'yy-mm-dd' });
            });

        </script>
    </head>

    <body>
        <?php echo validation_errors(); ?>
        <?php echo form_open('Pay2GoInvoice/query_db/query_db_result'); ?>


        <p>日期: <input class= "w3-input" type="text" id="logtime" name='logtime' value=''></p>
<!--
        <p>status: <input class= "w3-input" type="text" name="result_status" value=''></p>       

        <p>回傳訊息: <input class= "w3-input" type="text" name="message" value=''></p>-->

        <br/>

        <div><input type="submit" class="w3-button w3-teal" value="Submit" /></div>
    </body>
</html>

