
<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

    



<?php echo form_open('News/create') ?>
    
    <label>Title</label>
    <input type="input" name="title" /><br />

    <label>Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />    
    

