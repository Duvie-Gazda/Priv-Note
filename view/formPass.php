<form action="getFromFile.php" method="post" id="pass">
    Enter pass to see note
    <input type="password" name="pass" id="pass">
    <input  style="display:none;" type="text" name="fn" id="fn" value="<?php echo $fileName ?>">
    <input type="submit" value="sub">
</form>