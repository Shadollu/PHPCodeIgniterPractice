<html>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
        <div class="w3-container">
            <?php foreach ($result as $value): ?>
                <div class="w3-panel w3-border w3-border-red w3-hover-border-green">
                    <div class="w3-left-align">
                        <p><?php echo '時間：' .$value->logtime . "<br/>STATUS：" . $value->result_status . "<br/>回傳訊息：" . $value->message . "<br/> Result：" . $value->result ?>  </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>
