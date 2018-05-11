<html>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
        <div class="w3-container">

            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">
                <p><?php echo $status ?></p>
            </div>
            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">
                <p><?php echo $message ?></p>
            </div>
            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">
                <?php foreach ($result as $key => $value): ?>
                <div class="w3-left-align"><p><?php echo $key . " : <b>" . $value .'</b>' ?>  </p></div>
                <?php endforeach; ?>
            </div>
        </div>

    </body>
    

</html>
