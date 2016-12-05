<form action="admin.php" method="post">
    <input type="text" name="title" value="<?php echo $title;?>"><br>
    <textarea name="text" id="" cols="30" rows="10"><?php echo $text; ?></textarea><br>
    <input type="submit" name="submit" value="<?php echo $submitValue; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
</form>