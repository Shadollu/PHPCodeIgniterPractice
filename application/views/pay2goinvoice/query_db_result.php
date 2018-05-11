<html>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>
        <div class="w3-container">

            <div class="w3-panel w3-border w3-border-red w3-hover-border-green">
                <?php foreach ($result as $key => $value): ?>
                    <div class="w3-left-align"><p><?php echo $key . " : <b>" . $value . '</b>' ?>  </p></div>
                <?php endforeach; ?>

                <p><?php echo $row_count ?>
            </div>
        </div>

    </body>


</html>
